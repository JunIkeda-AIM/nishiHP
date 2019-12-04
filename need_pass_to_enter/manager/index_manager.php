<?php
$dsn = 'mysql:dbname=nishi_swimming_club;charset=utf8;host=localhost';
$user = 'nishi';
$password_0 = 'Onepiece2015';

$account_name = $_POST['account_name'];
$password = $_POST['password'];
if ($account_name === NULL) {
  echo "Error : Please fill in your account name.";
  exit();
} elseif ($password === NULL) {
  echo "Error : Please fill in your password.";
  exit();
} else {
  try {
    $pdo = new PDO($dsn, $user, $password_0, array(PDO::ATTR_EMULATE_PREPARES => false));
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo "データベース接続失敗。";
    exit();
  }
  try{
    $flag_sql = "SELECT * FROM account";
    $stm = $pdo->prepare($flag_sql);
    $stm->execute();
    $pdo=null;
  } catch (Exception $e) {
    echo "エラーが発生しました。";
  }
  $flag = FALSE;
  foreach ($stm as $row) {
    if ($row['account_name']===$account_name and $row['password']===$password) {
      $flag = TRUE;
      break;
    }
  }
  if ($flag===FALSE) {
    echo "ログイン失敗";
  }
}
 ?>
<?php if ($flag===TRUE) { ?>
<!DOCTYPE html>
<html>
  <!-- ページ情報 -->
  <header>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootstrapのCSS読み込み -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="../../js/bootstrap.min.js"></script>
    <title>都立西高校水泳部HP</title>
    <link rel="stylesheet" href="stylesheet.css">
  </header>
  <!-- ページ情報ここまで -->
  <!-- ページ本体 -->
  <body style="background-color:rgb(57, 57, 57);">
    <!-- ヘッダー -->
    <header>
      <div id="main-header">
        <h2>都立西高校水泳部</h2>
        <p>
          <h4>管理者専用ページ</h4>
        </p>
      </div>
      <div id="header" class="navbar navbar-inverse">
        <div class="navbar-header">
          <button class="navbar-toggle" data-toggle="collapse" data-target=".target">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index_pass.php">都立西高校水泳部</a>
        </div>
        <div class="collapse navbar-collapse target">
          <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="../index_pass.php">Back</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
<!--            <li><a href="#login0" data-toggle="modal" style="padding-right:50px;"></a></li>  -->
          </ul>
        </div>
        <div style="border-top: dashed 1px rgb(85, 84, 85) ; margin-left: 15px; margin-right: 15px;">
          <p class="topicPath"><a href="../index_pass.php" style="color: black;">Home</a></p>
        </div>
      </div>
    </header>
    <!-- ヘッダーここまで -->
    <!-- ログインモーダル -->
    <div class="modal fade" id="login0" tabindex="-1" role="dialog">
      <div class="modal-dialog" style="z-index: 1500">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">管理者はここからログインしてください</h4>
          </div>
          <div class="modal-body">
            <form class="" action="manager/index_manager.php" method="post">
              <div class="form-group">
                <label class="col-sm-2 control-label">アカウント名</label>
                <div class="col-sm-10" style="margin-bottom:10px;">
                  <input type="text" name="account_name" class="form-control" placeholder="アカウント名">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">パスワード</label>
                <div class="cl-sm-10" style="margin-bottom:10px;">
                  <input type="password" name="password" class="form-control" placeholder="パスワード">
                </div>
              </div>
              <button type="submit" class="btn btn-primary" name="button" style="margin-bottom:10px;">ログイン</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- ログインモーダルここまで -->
    <!-- メイン -->
    <div id="main" style="margin-left:20px; margin-right:20px;">
      <!--
      <h4 class="subtitle">部員の出席状況の確認</h4>
      <form class="" action="../database/create_calendar.php" method="post">
        <input type="hidden" name="flag" value="check">
        <div class="form-group">
          <label class="col-sm-2 control-label">ID</label>
          <div class="col-sm-10" style="margin-top:10px;">
            <input type="text" name="id" class="form-control" placeholder="半角数字で入力してください。">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" name="button">確認</button>
          </div>
        </div>
      </form>
      -->
      <h4 class="subtitle">部員の活動報告</h4>
      <!-- カプセルメニュー -->
      <ul class="nav nav-pills">
        <li><a href="#today" data-toggle="tab" class="active" style="color: white;">本日</a></li>
        <li><a href="#1day" data-toggle="tab" class="active" style="color: white;">昨日</a></li>
        <li><a href="#2day" data-toggle="tab" class="active" style="color: white;">一昨日</a></li>
        <li><a href="#3day" data-toggle="tab" class="active" style="color: white;">三日前</a></li>
        <li><a href="#4day" data-toggle="tab" class="active" style="color: white;">四日前</a></li>
        <li><a href="#5day" data-toggle="tab" class="active" style="color: white;">五日前</a></li>
      </ul>
      <!-- 内容 -->
      <div class="tab-content">
        <div class="tab-pane" id="today">
          <h4>本日の活動報告</h4>
          <div style="margin:10px;">
            <?php
            $today = date('Y-m-d');
            try {
              $pdo = new PDO($dsn, $user, $password_0, array(PDO::ATTR_EMULATE_PREPARES => false));
              $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
              echo "データベース接続失敗。";
              exit();
            }
            try{
              $sql = "SELECT * FROM report, team_member where report.id = team_member.id and date = :today order by date";
              $stm = $pdo->prepare($sql);
              $stm->bindValue(':today', $today, PDO::PARAM_STR);
              $stm->execute();
              $pdo=null;
            } catch (Exception $e) {
              echo "エラーが発生しました。";
            }
            foreach ($stm as $row) {
              echo "<div class='report_name' style='border-bottom: dashed 1px rgb(134, 134, 134); display: inline-block;'>".$row['date'].' '.$row['name'].' ID:'."<a href='../database/create_calendar.php?id=".$row['id']."'>".$row['id']."</a>"."</div>";
              echo "<div class='report_text' style='margin-bottom:10px;'>".$row['report']."</div>";
            }
             ?>
          </div>
        </div>
        <div class="tab-pane" id="1day">
          <h4>昨日の活動報告</h4>
          <div style="margin:10px;">
            <?php
            $yesterday = date('Y-m-d', strtotime('-1 day'));
            try {
              $pdo = new PDO($dsn, $user, $password_0, array(PDO::ATTR_EMULATE_PREPARES => false));
              $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
              echo "データベース接続失敗。";
              exit();
            }
            try{
              $sql = "SELECT * FROM report, team_member where report.id = team_member.id and date = :yesterday order by date";
              $stm = $pdo->prepare($sql);
              $stm->bindValue(':yesterday', $yesterday, PDO::PARAM_STR);
              $stm->execute();
              $pdo=null;
            } catch (Exception $e) {
              echo "エラーが発生しました。";
            }
            foreach ($stm as $row) {
              echo "<div class='report_name' style='border-bottom: dashed 1px rgb(134, 134, 134); display: inline-block;'>".$row['date'].' '.$row['name'].' ID:'."<a href='../database/create_calendar.php?id=".$row['id']."'>".$row['id']."</a>"."</div>";
              echo "<div class='report_text' style='margin-bottom:10px;'>".$row['report']."</div>";
            }
             ?>
          </div>
        </div>
        <div class="tab-pane" id="2day">
          <h4>一昨日の活動報告</h4>
          <div style="margin:10px;">
            <?php
            $d_b_yesterday = date('Y-m-d', strtotime('-2 day'));
            try {
              $pdo = new PDO($dsn, $user, $password_0, array(PDO::ATTR_EMULATE_PREPARES => false));
              $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
              echo "データベース接続失敗。";
              exit();
            }
            try{
              $sql = "SELECT * FROM report, team_member where report.id = team_member.id and date = :d_b_yesterday order by date";
              $stm = $pdo->prepare($sql);
              $stm->bindValue(':d_b_yesterday', $d_b_yesterday, PDO::PARAM_STR);
              $stm->execute();
              $pdo=null;
            } catch (Exception $e) {
              echo "エラーが発生しました。";
            }
            foreach ($stm as $row) {
              echo "<div class='report_name' style='border-bottom: dashed 1px rgb(134, 134, 134); display: inline-block;'>".$row['date'].' '.$row['name'].' ID:'."<a href='../database/create_calendar.php?id=".$row['id']."'>".$row['id']."</a>"."</div>";
              echo "<div class='report_text' style='margin-bottom:10px;'>".$row['report']."</div>";
            }
             ?>
          </div>
        </div>
        <div class="tab-pane" id="3day">
          <h4>三日前の活動報告</h4>
          <div style="margin:10px;">
            <?php
            $d_b_b_yesterday = date('Y-m-d', strtotime('-3 day'));
            try {
              $pdo = new PDO($dsn, $user, $password_0, array(PDO::ATTR_EMULATE_PREPARES => false));
              $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
              echo "データベース接続失敗。";
              exit();
            }
            try{
              $sql = "SELECT * FROM report, team_member where report.id = team_member.id and  date = :d_b_b_yesterday order by date";
              $stm = $pdo->prepare($sql);
              $stm->bindValue(':d_b_b_yesterday', $d_b_b_yesterday, PDO::PARAM_STR);
              $stm->execute();
              $pdo=null;
            } catch (Exception $e) {
              echo "エラーが発生しました。";
            }
            foreach ($stm as $row) {
              echo "<div class='report_name' style='border-bottom: dashed 1px rgb(134, 134, 134); display: inline-block;'>".$row['date'].' '.$row['name'].' ID:'."<a href='../database/create_calendar.php?id=".$row['id']."'>".$row['id']."</a>"."</div>";
              echo "<div class='report_text' style='margin-bottom:10px;'>".$row['report']."</div>";
            }
             ?>
          </div>
        </div>
        <div class="tab-pane" id="4day">
          <h4>四日目の活動報告</h4>
          <div style="margin:10px;">
            <?php
            $d4 = date('Y-m-d', strtotime('-4 day'));
            try {
              $pdo = new PDO($dsn, $user, $password_0, array(PDO::ATTR_EMULATE_PREPARES => false));
              $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
              echo "データベース接続失敗。";
            }
            try{
              $sql = "SELECT * FROM report, team_member where report.id = team_member.id and  date = :d4 order by date";
              $stm = $pdo->prepare($sql);
              $stm->bindValue(':d4', $d4, PDO::PARAM_STR);
              $stm->execute();
              $pdo=null;
            } catch (Exception $e) {
              echo "エラーが発生しました。";
            }
            foreach ($stm as $row) {
              echo "<div class='report_name' style='border-bottom: dashed 1px rgb(134, 134, 134); display: inline-block;'>".$row['date'].' '.$row['name'].' ID:'."<a href='../database/create_calendar.php?id=".$row['id']."'>".$row['id']."</a>"."</div>";
              echo "<div class='report_text' style='margin-bottom:10px;'>".$row['report']."</div>";
            }
             ?>
          </div>
        </div>
        <div class="tab-pane" id="5day">
          <h4>五日目の活動報告</h4>
          <div style="margin:10px;">
            <?php
            $d5 = date('Y-m-d', strtotime('-5 day'));
            try {
              $pdo = new PDO($dsn, $user, $password_0, array(PDO::ATTR_EMULATE_PREPARES => false));
              $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
              echo "データベース接続失敗。";
            }
            try{
              $sql = "SELECT * FROM report, team_member where report.id = team_member.id and  date = :d5 order by date";
              $stm = $pdo->prepare($sql);
              $stm->bindValue(':d5', $d5, PDO::PARAM_STR);
              $stm->execute();
              $pdo=null;
            } catch (Exception $e) {
              echo "エラーが発生しました。";
            }
            foreach ($stm as $row) {
              echo "<div class='report_name' style='border-bottom: dashed 1px rgb(134, 134, 134); display: inline-block;'>".$row['date'].' '.$row['name'].' ID:'."<a href='../database/create_calendar.php?id=".$row['id']."'>".$row['id']."</a>"."</div>";
              echo "<div class='report_text' style='margin-bottom:10px;'>".$row['report']."</div>";
            }
             ?>
          </div>
        </div>
      </div>
    </div>
    <!-- メインここまで -->
    <!-- フッター -->
    <footer>
      <p class="copyright">
        <small style="padding-left: 20px;">Copyright&copy; 2016 @Nishi_swimming_club All Rights Reserved.</small>
      </p>
    </footer>
    <!-- フッターここまで -->
  </body>
  <!-- ページ本体ここまで -->
</html>

<?php } ?>
