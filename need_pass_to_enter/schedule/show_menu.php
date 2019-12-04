<?php
$gobackURL = "../data/record_pass.php";

$dsn = 'mysql:dbname=nishi_swimming_club;charset=utf8;host=localhost';
$user = 'nishi';
$password = 'Onepiece2015';
?>

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
    <link rel="stylesheet" href="../../stylesheet.css">
  </header>
  <!-- ページ情報ここまで -->
  <!-- ページ本体 -->
  <body>
    <!-- ヘッダー -->
    <header>
      <div id="main-header">
        <h2>都立西高校水泳部</h2>
        <p>
          <h6>これはOBが作った非公式HPです。</h6>
        </p>
      </div>
      <div id="header" class="navbar navbar-default">
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
            <li><a href="../index_pass.php">Home</a></li>
            <li><a href="../report_pass.php">Report</a></li>
            <li><a href="../data_pass.php">Data</a></li>
            <li><a href="../pictures_pass.php">Picturs</a></li>
            <li><a href="../training_pass.php">Training</a></li>
            <li class="active"><a href="../schedule_pass.php">Schedule</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#login0" data-toggle="modal" style="padding-right:50px;">管理者専用ページ</a></li>
          </ul>
        </div>
        <div style="border-top: dashed 1px rgb(85, 84, 85) ; margin-left: 15px; margin-right: 15px;">
          <p class="topicPath"><a href="../index_pass.php" style="color: black;">Home</a> &gt; <a href="../schedule_pass.php">Schedule</a> &gt; menu</p>
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
            <form class="" action="../manager/index_manager.php" method="post">
              <div class="form-group">
                <label class="col-sm-2 control-label">Account</label>
                <div class="col-sm-10" style="margin-bottom:10px;">
                  <input type="text" name="account_name" class="form-control" placeholder="アカウント名">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">PassWord</label>
                <div class="col-sm-10" style="margin-bottom:10px;">
                  <input type="password" name="password" class="form-control" placeholder="パスワード">
                </div>
              </div>
              <button type="submit" class="btn btn-primary" name="button" style="margin-bottom:10px;">ログイン</button>
            </form>
          </div>
          <div class="modal-footer">
            <small>アカウントの新規作成は67th池田、または当サイトの現管理者まで連絡ください。</small>
          </div>
        </div>
      </div>
    </div>
    <!-- ログインモーダルここまで -->
    <!-- メイン -->
    <div id="main" style="margin-left:20px; margin-right:20px;">
      <div class="row">
        <!-- サイドバー左  -->
        <div class="col-sm-2 hidden-xs">
          <div class="containt1">
            <div class="panel panel-default">
              <div class="panel-heading">
		            リンクメニュー
              </div>
              <div class="panel-body">
                <?php
                $filename = "/var/www/html/nishiHP/link.txt";
                $fileobj = new SplFileObject($filename, 'r');
                $readdata = $fileobj->fread($fileobj->getSize());
                echo $readdata;
                 ?>
	            </div>
            </div>
          </div>
          <div class="containt2">
            <div class="panel panel-default">
              <div class="panel-heading">
                お知らせ
              </div>
              <div class="panel-body">
                <ul id="sub-information">
                  <?php
                  $filename = "/var/www/html/nishiHP/information.txt";
                  $fileobj = new SplFileObject($filename, 'r');
                  $readdata = $fileobj->fread($fileobj->getSize());
                  echo $readdata;
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- サイドバー左ここまで -->
        <!-- メインコンテンツ -->
        <div class="col-sm-7 col-xs-12">
          <?php
          try {
            $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $e) {
            echo 'データベース接続失敗。';
            exit();
          }
          try{
            $day = $_GET['day'];
            $now = $_GET['now'];
            $sql = "SELECT * FROM menu WHERE day = :day";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':day', $day, PDO::PARAM_STR);
            $stm->execute();
            $pdo=null;
          } catch (Exception $e) {
            echo 'データ受信失敗。';
            exit();
          } ?>

          <label class="hidden-xs">印刷用ページ</label>
            <?php
            echo "<div class='hidden-xs'>";
            $url_1 = "print_menu_1.php?day=".$day."&now=".$now;
            $url_2 = "print_menu_2.php?day=".$day."&now=".$now;
            $url_3 = "print_menu_3.php?day=".$day."&now=".$now;
            $url_4 = "print_menu_4.php?day=".$day."&now=".$now;
            $url_5 = "print_menu_5.php?day=".$day."&now=".$now;
            $url_6 = "print_menu_6.php?day=".$day."&now=".$now;
            $url_7 = "print_menu_7.php?day=".$day."&now=".$now;
            $url_8 = "print_menu_8.php?day=".$day."&now=".$now;
            echo "<a href=".$url_1." class='btn btn-primary' style='margin-right:2px'>１</a>";
            echo "<a href=".$url_2." class='btn btn-primary' style='margin-right:2px'>２</a>";
            echo "<a href=".$url_3." class='btn btn-primary' style='margin-right:2px'>３</a>";
            echo "<a href=".$url_4." class='btn btn-primary' style='margin-right:2px'>４</a>";
            echo "<a href=".$url_5." class='btn btn-primary' style='margin-right:2px'>５</a>";
            echo "<a href=".$url_6." class='btn btn-primary' style='margin-right:2px'>６</a>";
            echo "<a href=".$url_7." class='btn btn-primary' style='margin-right:2px'>７</a>";
            echo "<a href=".$url_8." class='btn btn-primary' style='margin-right:2px'>８</a>";
            echo "</div>";
            ?>



            <?php
            $day = $_GET['day'];
            $dir = "/var/www/html/nishiHP/need_pass_to_enter/schedule/pdf/";
            $fileName = $dir.$day.".pdf";
            $fileNameAm = $dir.$day."_am.pdf";
            $fileNamePm = $dir.$day."_pm.pdf";
            ?>
            <?php if (file_exists($fileName)===True) : ?>
             <h4 class="subtitle">PDF形式のメニュー</h4>
             <a href="pdf/<?php echo $day; ?>.pdf" target="_blank"><?php echo $day; ?>のメニュー</a>
            <?php endif; ?>
            <?php if (file_exists($fileNameAm)===True) : ?>
             <h4 class="subtitle">PDF形式のメニュー</h4>
             <a href="pdf/<?php echo $day; ?>_am.pdf" target="_blank"><?php echo $day; ?> 午前のメニュー</a>
            <?php endif; ?>
            <?php if (file_exists($fileNamePm)===True) : ?>
             <h4 class="subtitle">PDF形式のメニュー</h4>
             <a href="pdf/<?php echo $day; ?>_pm.pdf" target="_blank"><?php echo $day; ?> 午後のメニュー</a>
            <?php endif; ?>

          <h2 class="subtitle">メニュー <?php echo $day; ?></h2>
          <label>コース選択↓</label>
          <ul class="nav nav-pills">
            <li><a href="#menu_all" data-toggle="tab">全コース</a></li>
            <li><a href="#menu_1" data-toggle="tab">1</a></li>
            <li><a href="#menu_2" data-toggle="tab">2</a></li>
            <li><a href="#menu_3" data-toggle="tab">3</a></li>
            <li><a href="#menu_4" data-toggle="tab">4</a></li>
            <li><a href="#menu_5" data-toggle="tab">5</a></li>
            <li><a href="#menu_6" data-toggle="tab">6</a></li>
            <li><a href="#menu_7" data-toggle="tab">7</a></li>
            <li><a href="#menu_8" data-toggle="tab">8</a></li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane" id="menu_all">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try{
                $day = $_GET['day'];
                $now = $_GET['now'];
                $sql = "SELECT * FROM menu WHERE day = :day";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(':day', $day, PDO::PARAM_STR);
                $stm->execute();
                $pdo=null;
              } catch (Exception $e) {
                echo 'データ受信失敗。';
                exit();
              } ?>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Menu</th>
                      <th>Style</th>
                      <th>コース</th>
                      <th>距離</th>
                      <th>本数</th>
                      <th>セット数</th>
                      <th>サークル</th>
                      <th>セット間</th>
                      <th>レスト</th>
                      <th>備考</th>
                      <th>時間</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    $sum_length = 0;
                    $sum_time = 0;
                    foreach ($stm as $row) {
                      echo "<tr>";
                      if ($i%8 == 1) {
                        $No = ($i-1)/8 + 1;
                      } else {
                        $No = null;
                      }
                      echo "<th>", $No, "</th>";
                      echo "<th>", $row['menu'], "</th>";
                      echo "<th>", $row['style'], "</th>";
                      echo "<th>", $row['course'], "</th>";
                      $length = $row['length'];
                      echo "<th>", $length, "</th>";
                      $number = $row['number'];
                      echo "<th>", $number, "</th>";
                      $set_number = $row['set_number'];
                      echo "<th>", $set_number, "</th>";
                      $circle = $row['circle'];
                      $circle_sec = $circle % 60;
                      $circle_min = ($circle-$circle_sec)/60;

                      echo "<th>", $circle_min,"'",$circle_sec,'"', "</th>";
                      echo "<th>", $row['set_interval'], "</th>";
                      echo "<th>", $row['rest'], "</th>";
                      echo "<th>", $row['comment'], "</th>";
                      $time = $row['time'] / 60.0;
                      echo "<th>", $time, "</th>";
                      echo "</tr>";
                      if ($set_number > 0){$number *= $set_number;}
                      $sum_length += $length * $number;
                      $sum_time += $time;
                      if ($i === 1) {
                        $creater = $row['creater'];
                        $aim = $row['aim'];
                      }
                      $i++;
                    }
                    echo "<h4>作成者：".$creater."</h4>";
                    //echo "<p>総距離:".$sum_length."m  総時間:".$sum_time."分</p>";
                    echo "<h5>メニューの意図：".$aim."</h5>";
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane" id="menu_1">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try{
                $day = $_GET['day'];
                $now = $_GET['now'];
                $sql = "SELECT * FROM menu WHERE day = :day AND course = 1";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(':day', $day, PDO::PARAM_STR);
                $stm->execute();
                $pdo=null;
              } catch (Exception $e) {
                echo 'データ受信失敗。';
                exit();
              } ?>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Menu</th>
                      <th>Style</th>
                      <th>コース</th>
                      <th>距離</th>
                      <th>本数</th>
                      <th>セット数</th>
                      <th>サークル</th>
                      <th>セット間</th>
                      <th>レスト</th>
                      <th>備考</th>
                      <th>時間</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    $sum_length = 0;
                    $sum_time = 0;
                    foreach ($stm as $row) {
                      echo "<tr>";
                      echo "<th>", $i, "</th>";
                      echo "<th>", $row['menu'], "</th>";
                      echo "<th>", $row['style'], "</th>";
                      echo "<th>", $row['course'], "</th>";
                      $length = $row['length'];
                      echo "<th>", $length, "</th>";
                      $number = $row['number'];
                      echo "<th>", $number, "</th>";
                      $set_number = $row['set_number'];
                      echo "<th>", $set_number, "</th>";
                      $circle = $row['circle'];
                      $circle_sec = $circle % 60;
                      $circle_min = ($circle-$circle_sec)/60;

                      echo "<th>", $circle_min,"'",$circle_sec,'"', "</th>";
                      echo "<th>", $row['set_interval'], "</th>";
                      echo "<th>", $row['rest'], "</th>";
                      echo "<th>", $row['comment'], "</th>";
                      $time = $row['time'] / 60.0;
                      echo "<th>", $time, "</th>";
                      echo "</tr>";
                      if ($set_number > 0){$number *= $set_number;}
                      $sum_length += $length * $number;
                      $sum_time += $time;
                      if ($i === 1) {$creater = $row['creater'];}
                      if ($i === 1) {$aim = $row['aim'];}
                      $i++;
                    }

                    echo "<h4>作成者：".$creater."</h4>";
                    echo "<p>総距離:".$sum_length."m  総時間:".$sum_time."分</p>";
                    echo "<h5>メニューの意図：".$aim."</h5>";
                   ?>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane" id="menu_2">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try{
                $day = $_GET['day'];
                $now = $_GET['now'];
                $sql = "SELECT * FROM menu WHERE day = :day AND course = 2";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(':day', $day, PDO::PARAM_STR);
                $stm->execute();
                $pdo=null;
              } catch (Exception $e) {
                echo 'データ受信失敗。';
                exit();
              } ?>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Menu</th>
                      <th>Style</th>
                      <th>コース</th>
                      <th>距離</th>
                      <th>本数</th>
                      <th>セット数</th>
                      <th>サークル</th>
                      <th>セット間</th>
                      <th>レスト</th>
                      <th>備考</th>
                      <th>時間</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    $sum_length = 0;
                    $sum_time = 0;
                    foreach ($stm as $row) {
                      echo "<tr>";
                      echo "<th>", $i, "</th>";
                      echo "<th>", $row['menu'], "</th>";
                      echo "<th>", $row['style'], "</th>";
                      echo "<th>", $row['course'], "</th>";
                      $length = $row['length'];
                      echo "<th>", $length, "</th>";
                      $number = $row['number'];
                      echo "<th>", $number, "</th>";
                      $set_number = $row['set_number'];
                      echo "<th>", $set_number, "</th>";
                      $circle = $row['circle'];
                      $circle_sec = $circle % 60;
                      $circle_min = ($circle-$circle_sec)/60;

                      echo "<th>", $circle_min,"'",$circle_sec,'"', "</th>";
                      echo "<th>", $row['set_interval'], "</th>";
                      echo "<th>", $row['rest'], "</th>";
                      echo "<th>", $row['comment'], "</th>";
                      $time = $row['time'] / 60.0;
                      echo "<th>", $time, "</th>";
                      echo "</tr>";
                      if ($set_number > 0){$number *= $set_number;}
                      $sum_length += $length * $number;
                      $sum_time += $time;
                      if ($i === 1) {$creater = $row['creater'];}
                      if ($i === 1) {$aim = $row['aim'];}
                      $i++;
                    }

                    echo "<h4>作成者：".$creater."</h4>";
                    echo "<p>総距離:".$sum_length."m  総時間:".$sum_time."分</p>";
                    echo "<h5>メニューの意図：".$aim."</h5>";
                   ?>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane" id="menu_3">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try{
                $day = $_GET['day'];
                $now = $_GET['now'];
                $sql = "SELECT * FROM menu WHERE day = :day AND course = 3";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(':day', $day, PDO::PARAM_STR);
                $stm->execute();
                $pdo=null;
              } catch (Exception $e) {
                echo 'データ受信失敗。';
                exit();
              } ?>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Menu</th>
                      <th>Style</th>
                      <th>コース</th>
                      <th>距離</th>
                      <th>本数</th>
                      <th>セット数</th>
                      <th>サークル</th>
                      <th>セット間</th>
                      <th>レスト</th>
                      <th>備考</th>
                      <th>時間</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    $sum_length = 0;
                    $sum_time = 0;
                    foreach ($stm as $row) {
                      echo "<tr>";
                      echo "<th>", $i, "</th>";
                      echo "<th>", $row['menu'], "</th>";
                      echo "<th>", $row['style'], "</th>";
                      echo "<th>", $row['course'], "</th>";
                      $length = $row['length'];
                      echo "<th>", $length, "</th>";
                      $number = $row['number'];
                      echo "<th>", $number, "</th>";
                      $set_number = $row['set_number'];
                      echo "<th>", $set_number, "</th>";
                      $circle = $row['circle'];
                      $circle_sec = $circle % 60;
                      $circle_min = ($circle-$circle_sec)/60;

                      echo "<th>", $circle_min,"'",$circle_sec,'"', "</th>";
                      echo "<th>", $row['set_interval'], "</th>";
                      echo "<th>", $row['rest'], "</th>";
                      echo "<th>", $row['comment'], "</th>";
                      $time = $row['time'] / 60.0;
                      echo "<th>", $time, "</th>";
                      echo "</tr>";
                      if ($set_number > 0){$number *= $set_number;}
                      $sum_length += $length * $number;
                      $sum_time += $time;
                      if ($i === 1) {$creater = $row['creater'];}
                      if ($i === 1) {$aim = $row['aim'];}
                      $i++;
                    }

                    echo "<h4>作成者：".$creater."</h4>";
                    echo "<p>総距離:".$sum_length."m  総時間:".$sum_time."分</p>";
                    echo "<h5>メニューの意図：".$aim."</h5>";
                   ?>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane" id="menu_4">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try{
                $day = $_GET['day'];
                $now = $_GET['now'];
                $sql = "SELECT * FROM menu WHERE day = :day AND course = 4";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(':day', $day, PDO::PARAM_STR);
                $stm->execute();
                $pdo=null;
              } catch (Exception $e) {
                echo 'データ受信失敗。';
                exit();
              } ?>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Menu</th>
                      <th>Style</th>
                      <th>コース</th>
                      <th>距離</th>
                      <th>本数</th>
                      <th>セット数</th>
                      <th>サークル</th>
                      <th>セット間</th>
                      <th>レスト</th>
                      <th>備考</th>
                      <th>時間</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    $sum_length = 0;
                    $sum_time = 0;
                    foreach ($stm as $row) {
                      echo "<tr>";
                      echo "<th>", $i, "</th>";
                      echo "<th>", $row['menu'], "</th>";
                      echo "<th>", $row['style'], "</th>";
                      echo "<th>", $row['course'], "</th>";
                      $length = $row['length'];
                      echo "<th>", $length, "</th>";
                      $number = $row['number'];
                      echo "<th>", $number, "</th>";
                      $set_number = $row['set_number'];
                      echo "<th>", $set_number, "</th>";
                      $circle = $row['circle'];
                      $circle_sec = $circle % 60;
                      $circle_min = ($circle-$circle_sec)/60;

                      echo "<th>", $circle_min,"'",$circle_sec,'"', "</th>";
                      echo "<th>", $row['set_interval'], "</th>";
                      echo "<th>", $row['rest'], "</th>";
                      echo "<th>", $row['comment'], "</th>";
                      $time = $row['time'] / 60.0;
                      echo "<th>", $time, "</th>";
                      echo "</tr>";
                      if ($set_number > 0){$number *= $set_number;}
                      $sum_length += $length * $number;
                      $sum_time += $time;
                      if ($i === 1) {$creater = $row['creater'];}
                      if ($i === 1) {$aim = $row['aim'];}
                      $i++;
                    }

                    echo "<h4>作成者：".$creater."</h4>";
                    echo "<p>総距離:".$sum_length."m  総時間:".$sum_time."分</p>";
                    echo "<h5>メニューの意図：".$aim."</h5>";
                   ?>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane" id="menu_5">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try{
                $day = $_GET['day'];
                $now = $_GET['now'];
                $sql = "SELECT * FROM menu WHERE day = :day AND course = 5";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(':day', $day, PDO::PARAM_STR);
                $stm->execute();
                $pdo=null;
              } catch (Exception $e) {
                echo 'データ受信失敗。';
                exit();
              } ?>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Menu</th>
                      <th>Style</th>
                      <th>コース</th>
                      <th>距離</th>
                      <th>本数</th>
                      <th>セット数</th>
                      <th>サークル</th>
                      <th>セット間</th>
                      <th>レスト</th>
                      <th>備考</th>
                      <th>時間</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    $sum_length = 0;
                    $sum_time = 0;
                    foreach ($stm as $row) {
                      echo "<tr>";
                      echo "<th>", $i, "</th>";
                      echo "<th>", $row['menu'], "</th>";
                      echo "<th>", $row['style'], "</th>";
                      echo "<th>", $row['course'], "</th>";
                      $length = $row['length'];
                      echo "<th>", $length, "</th>";
                      $number = $row['number'];
                      echo "<th>", $number, "</th>";
                      $set_number = $row['set_number'];
                      echo "<th>", $set_number, "</th>";
                      $circle = $row['circle'];
                      $circle_sec = $circle % 60;
                      $circle_min = ($circle-$circle_sec)/60;

                      echo "<th>", $circle_min,"'",$circle_sec,'"', "</th>";
                      echo "<th>", $row['set_interval'], "</th>";
                      echo "<th>", $row['rest'], "</th>";
                      echo "<th>", $row['comment'], "</th>";
                      $time = $row['time'] / 60.0;
                      echo "<th>", $time, "</th>";
                      echo "</tr>";
                      if ($set_number > 0){$number *= $set_number;}
                      $sum_length += $length * $number;
                      $sum_time += $time;
                      if ($i === 1) {$creater = $row['creater'];}
                      if ($i === 1) {$aim = $row['aim'];}
                      $i++;
                    }

                    echo "<h4>作成者：".$creater."</h4>";
                    echo "<p>総距離:".$sum_length."m  総時間:".$sum_time."分</p>";
                    echo "<h5>メニューの意図：".$aim."</h5>";
                   ?>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane" id="menu_6">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try{
                $day = $_GET['day'];
                $now = $_GET['now'];
                $sql = "SELECT * FROM menu WHERE day = :day AND course = 6";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(':day', $day, PDO::PARAM_STR);
                $stm->execute();
                $pdo=null;
              } catch (Exception $e) {
                echo 'データ受信失敗。';
                exit();
              } ?>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Menu</th>
                      <th>Style</th>
                      <th>コース</th>
                      <th>距離</th>
                      <th>本数</th>
                      <th>セット数</th>
                      <th>サークル</th>
                      <th>セット間</th>
                      <th>レスト</th>
                      <th>備考</th>
                      <th>時間</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    $sum_length = 0;
                    $sum_time = 0;
                    foreach ($stm as $row) {
                      echo "<tr>";
                      echo "<th>", $i, "</th>";
                      echo "<th>", $row['menu'], "</th>";
                      echo "<th>", $row['style'], "</th>";
                      echo "<th>", $row['course'], "</th>";
                      $length = $row['length'];
                      echo "<th>", $length, "</th>";
                      $number = $row['number'];
                      echo "<th>", $number, "</th>";
                      $set_number = $row['set_number'];
                      echo "<th>", $set_number, "</th>";
                      $circle = $row['circle'];
                      $circle_sec = $circle % 60;
                      $circle_min = ($circle-$circle_sec)/60;

                      echo "<th>", $circle_min,"'",$circle_sec,'"', "</th>";
                      echo "<th>", $row['set_interval'], "</th>";
                      echo "<th>", $row['rest'], "</th>";
                      echo "<th>", $row['comment'], "</th>";
                      $time = $row['time'] / 60.0;
                      echo "<th>", $time, "</th>";
                      echo "</tr>";
                      if ($set_number > 0){$number *= $set_number;}
                      $sum_length += $length * $number;
                      $sum_time += $time;
                      if ($i === 1) {$creater = $row['creater'];}
                      if ($i === 1) {$aim = $row['aim'];}
                      $i++;
                    }

                    echo "<h4>作成者：".$creater."</h4>";
                    echo "<p>総距離:".$sum_length."m  総時間:".$sum_time."分</p>";
                    echo "<h5>メニューの意図：".$aim."</h5>";
                   ?>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane" id="menu_7">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try{
                $day = $_GET['day'];
                $now = $_GET['now'];
                $sql = "SELECT * FROM menu WHERE day = :day AND course = 7";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(':day', $day, PDO::PARAM_STR);
                $stm->execute();
                $pdo=null;
              } catch (Exception $e) {
                echo 'データ受信失敗。';
                exit();
              } ?>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Menu</th>
                      <th>Style</th>
                      <th>コース</th>
                      <th>距離</th>
                      <th>本数</th>
                      <th>セット数</th>
                      <th>サークル</th>
                      <th>セット間</th>
                      <th>レスト</th>
                      <th>備考</th>
                      <th>時間</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    $sum_length = 0;
                    $sum_time = 0;
                    foreach ($stm as $row) {
                      echo "<tr>";
                      echo "<th>", $i, "</th>";
                      echo "<th>", $row['menu'], "</th>";
                      echo "<th>", $row['style'], "</th>";
                      echo "<th>", $row['course'], "</th>";
                      $length = $row['length'];
                      echo "<th>", $length, "</th>";
                      $number = $row['number'];
                      echo "<th>", $number, "</th>";
                      $set_number = $row['set_number'];
                      echo "<th>", $set_number, "</th>";
                      $circle = $row['circle'];
                      $circle_sec = $circle % 60;
                      $circle_min = ($circle-$circle_sec)/60;

                      echo "<th>", $circle_min,"'",$circle_sec,'"', "</th>";
                      echo "<th>", $row['set_interval'], "</th>";
                      echo "<th>", $row['rest'], "</th>";
                      echo "<th>", $row['comment'], "</th>";
                      $time = $row['time'] / 60.0;
                      echo "<th>", $time, "</th>";
                      echo "</tr>";
                      if ($set_number > 0){$number *= $set_number;}
                      $sum_length += $length * $number;
                      $sum_time += $time;
                      if ($i === 1) {$creater = $row['creater'];}
                      if ($i === 1) {$aim = $row['aim'];}
                      $i++;
                    }

                    echo "<h4>作成者：".$creater."</h4>";
                    echo "<p>総距離:".$sum_length."m  総時間:".$sum_time."分</p>";
                    echo "<h5>メニューの意図：".$aim."</h5>";
                   ?>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane" id="menu_8">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try{
                $day = $_GET['day'];
                $now = $_GET['now'];
                $sql = "SELECT * FROM menu WHERE day = :day AND course = 8";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(':day', $day, PDO::PARAM_STR);
                $stm->execute();
                $pdo=null;
              } catch (Exception $e) {
                echo 'データ受信失敗。';
                exit();
              } ?>

              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Menu</th>
                      <th>Style</th>
                      <th>コース</th>
                      <th>距離</th>
                      <th>本数</th>
                      <th>セット数</th>
                      <th>サークル</th>
                      <th>セット間</th>
                      <th>レスト</th>
                      <th>備考</th>
                      <th>時間</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    $sum_length = 0;
                    $sum_time = 0;
                    foreach ($stm as $row) {
                      echo "<tr>";
                      echo "<th>", $i, "</th>";
                      echo "<th>", $row['menu'], "</th>";
                      echo "<th>", $row['style'], "</th>";
                      echo "<th>", $row['course'], "</th>";
                      $length = $row['length'];
                      echo "<th>", $length, "</th>";
                      $number = $row['number'];
                      echo "<th>", $number, "</th>";
                      $set_number = $row['set_number'];
                      echo "<th>", $set_number, "</th>";
                      $circle = $row['circle'];
                      $circle_sec = $circle % 60;
                      $circle_min = ($circle-$circle_sec)/60;

                      echo "<th>", $circle_min,"'",$circle_sec,'"', "</th>";
                      echo "<th>", $row['set_interval'], "</th>";
                      echo "<th>", $row['rest'], "</th>";
                      echo "<th>", $row['comment'], "</th>";
                      $time = $row['time'] / 60.0;
                      echo "<th>", $time, "</th>";
                      echo "</tr>";
                      if ($set_number > 0){$number *= $set_number;}
                      $sum_length += $length * $number;
                      $sum_time += $time;
                      if ($i === 1) {$creater = $row['creater'];}
                      if ($i === 1) {$aim = $row['aim'];}
                      $i++;
                    }

                    echo "<h4>作成者：".$creater."</h4>";
                    echo "<p>総距離:".$sum_length."m  総時間:".$sum_time."分</p>";
                    echo "<h5>メニューの意図：".$aim."</h5>";
                   ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- メインコンテンツここまで -->
        <!-- サイドバー右 -->
        <div class="col-sm-3 hidden-xs">
          <div class="containt1">
            <div>
              <a class="twitter-timeline" data-tweet-limit="5" href="https://twitter.com/ZERO_RRON">Tweets by ZERO_RRON</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
          </div>
        </div>
        <!-- サイドバー右ここまで -->
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
