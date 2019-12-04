<?php
$dsn = 'mysql:dbname=nishi_swimming_club;charset=utf8;host=localhost';
$user = 'nishi';
$password = 'Onepiece2015';

$the_day = date('Y-m-d', strtotime('-7 day'));

try {
  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'データベース接続失敗。';
  exit();
}
try {
  $sql_fr50man = 'SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = "Fr" AND length = 50 AND sex = "男" AND date > :date order by record';
  $stm_fr50man = $pdo->prepare($sql_fr50man);
  $stm_fr50man->bindValue(':date', $the_day, PDO::PARAM_STR);
  $stm_fr50man->execute();

  $sql_fr50woman = 'SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = "Fr" AND length = 50 AND sex = "女" AND date > :date order by record';
  $stm_fr50woman = $pdo->prepare($sql_fr50woman);
  $stm_fr50woman->bindValue(':date', $the_day, PDO::PARAM_STR);
  $stm_fr50woman->execute();

  $sql_br50man = 'SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = "Br" AND length = 50 AND sex = "男" AND date > :date order by record';
  $stm_br50man = $pdo->prepare($sql_br50man);
  $stm_br50man->bindValue(':date', $the_day, PDO::PARAM_STR);
  $stm_br50man->execute();

  $sql_br50woman = 'SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = "Br" AND length = 50 AND sex = "女" AND date > :date order by record';
  $stm_br50woman = $pdo->prepare($sql_br50woman);
  $stm_br50woman->bindValue(':date', $the_day, PDO::PARAM_STR);
  $stm_br50woman->execute();

  $sql_ba50man = 'SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = "Ba" AND length = 50 AND sex = "男" AND date > :date order by record';
  $stm_ba50man = $pdo->prepare($sql_ba50man);
  $stm_ba50man->bindValue(':date', $the_day, PDO::PARAM_STR);
  $stm_ba50man->execute();

  $sql_ba50woman = 'SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = "Ba" AND length = 50 AND sex = "女" AND date > :date order by record';
  $stm_ba50woman = $pdo->prepare($sql_ba50woman);
  $stm_ba50woman->bindValue(':date', $the_day, PDO::PARAM_STR);
  $stm_ba50woman->execute();

  $sql_bu50man = 'SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = "Bu" AND length = 50 AND sex = "男" AND date > :date order by record';
  $stm_bu50man = $pdo->prepare($sql_bu50man);
  $stm_bu50man->bindValue(':date', $the_day, PDO::PARAM_STR);
  $stm_bu50man->execute();

  $sql_bu50woman = 'SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = "Bu" AND length = 50 AND sex = "女" AND date > :date order by record';
  $stm_bu50woman = $pdo->prepare($sql_bu50woman);
  $stm_bu50woman->bindValue(':date', $the_day, PDO::PARAM_STR);
  $stm_bu50woman->execute();

} catch (PDOException $e) {
  echo 'データ受信失敗。';
  exit();
}
 ?>

<!DOCTYPE html>
<html>
  <!-- ページ情報 -->
  <header>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootstrapのCSS読み込み -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="../js/bootstrap.min.js"></script>
    <title>都立西高校水泳部HP</title>
    <link rel="stylesheet" href="../stylesheet.css">
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
          <a class="navbar-brand" href="index_pass.php">都立西高校水泳部</a>
        </div>
        <div class="collapse navbar-collapse target">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index_pass.php">Home</a></li>
            <li><a href="report_pass.php">Report</a></li>
            <li><a href="data_pass.php">Data</a></li>
            <li><a href="pictures_pass.php">Picturs</a></li>
            <li><a href="training_pass.php">Training</a></li>
            <li><a href="schedule_pass.php">Schedule</a></li>
            <li><a href="profile_pass.php">Profile</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#login0" data-toggle="modal" style="padding-right:50px;">管理者専用ページ</a></li>
          </ul>
        </div>
        <div style="border-top: dashed 1px rgb(85, 84, 85) ; margin-left: 15px; margin-right: 15px;">
          <p class="topicPath"><a href="index_pass.php" style="color: black;">Home</a></p>
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
          <!--
          <div class="top-image">
            <p class="top-image">
              <img src="img/Image_6588796.jpg" alt="Main_img" width="100%"/>
            </p>
          </div>
          -->
          <h3 class="subtitle">利用方法</h3>
          <p>
            部員登録を済ませていない部員は、Dataの部員データから、情報を登録してださい。<br />
            <h4><a href="report_pass.php">Report</a></h4>
            OBに対する活動報告、部員の出欠状況の確認。<br />
            <h4><a href="data_pass.php">Data</a></h4>
            部員情報や各種記録の登録、閲覧。<br />
            <h4><a href="picture_pass">Picture</a></h4>
            活動中に撮影された写真等の閲覧。<br />
            <h4><a href="training_pass.php">Training</a></h4>
            水泳に関するトレーニング方法の閲覧。<br />
            <h4><a href="schedule_pass.php">Schedule</a></h4>
            活動予定、練習メニューの閲覧。<br />
            <h4><a href="profile_pass.php">Profile</a></h4>
            部員紹介<br />
          </p>
          <!--
          <h3 class="subtitle">昨日のタイム</h3>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>種目</th>
                  <th>選手</th>
                  <th>期</th>
                  <th>記録</th>
                </tr>
              </thead>
              <tbody>
                <?php
                try {
                  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                  echo 'データベース接続失敗。';
                  exit();
                }
                $yesterday = date('Y-m-d', strtotime('-1 day'));
                try {
                  $sql = "SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND date = :yesterday order by record";
                  $stm = $pdo->prepare($sql);
                  $stm->bindValue(':yesterday', $yesterday, PDO::PARAM_STR);
                  $stm->execute();
                  $pdo=null;
                } catch (Exception $e) {
                  echo "エラー発生";
                }
                foreach ($stm as $row) {
                  echo "<tr>";
                  echo "<td>".$row['style']."</td>";
                  echo "<td>".$row['name']."</td>";
                  echo "<td>".$row['class']."</td>";
                  $record_0 = $row['record'];
                  if ($record_0 >= 10000) {
                    $mscd = $record_0 % 100;
                    $scd = ($record_0 % 10000 - $mscd)/100;
                    $min = ($record_0 - $scd - $mscd)/10000;
                    if ($mscd < 10) {$mscd = "0".$mscd;}
                    if ($scd < 10) {$scd = "0".$scd;}
                    $record = $min.":".$scd.".".$mscd;
                  } else {
                    $mscd = $record_0 % 100;
                    $scd = ($record_0 - $mscd) / 100;
                    if ($mscd < 10) {$mscd = "0".$mscd;}
                    if ($scd < 10) {$scd = "0".$scd;}
                    $record = $scd.".".$mscd;
                  }
                  echo "<td>".$record."</td>";
                  echo "</tr>";
                }
                 ?>
              </tbody>
            </table>
          </div>
          -->
          <!--
          <h3 class="subtitle">今週の成績優秀者</h3>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>種目</th>
                  <th>選手</th>
                  <th>期</th>
                  <th>Date</th>
                  <th>記録</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>Fr　男子50m</th>
                  <?php $i = 0;
                  foreach ($stm_fr50man as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".date('m-d',strtotime($row['date']))."</td>";
                      $record_0 = $row['record'];
                      if ($record_0 >= 10000) {
                        $mscd = $record_0 % 100;
                        $scd = ($record_0 % 10000 - $mscd)/100;
                        $min = ($record_0 - $scd - $mscd)/10000;
                        if ($mscd < 10) {$mscd = "0".$mscd;}
                        if ($scd < 10) {$scd = "0".$scd;}
                        $record = $min.":".$scd.".".$mscd;
                      } else {
                        $mscd = $record_0 % 100;
                        $scd = ($record_0 - $mscd) / 100;
                        if ($mscd < 10) {$mscd = "0".$mscd;}
                        if ($scd < 10) {$scd = "0".$scd;}
                        $record = $scd.".".$mscd;
                      }
                        echo "<td>".$record."</td>";
                      $i++;
                    }
                  }
                   ?>
                </tr>
                <tr>
                  <th>Fr　女子50m</th>
                  <?php $i = 0;
                  foreach ($stm_fr50woman as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".date('m-d',strtotime($row['date']))."</td>";
                      $record_0 = $row['record'];
                      if ($record_0 >= 10000) {
                        $mscd = $record_0 % 100;
                        $scd = ($record_0 % 10000 - $mscd)/100;
                        $min = ($record_0 - $scd - $mscd)/10000;
                        if ($mscd < 10) {$mscd = "0".$mscd;}
                        if ($scd < 10) {$scd = "0".$scd;}
                        $record = $min.":".$scd.".".$mscd;
                      } else {
                          $mscd = $record_0 % 100;
                          $scd = ($record_0 - $mscd) / 100;
                          if ($mscd < 10) {$mscd = "0".$mscd;}
                          if ($scd < 10) {$scd = "0".$scd;}
                          $record = $scd.".".$mscd;
                        }
                        echo "<td>".$record."</td>";
                      $i++;
                    }
                  } ?>
                </tr>
                <tr>
                  <th>Br　男子50m</th>
                  <?php $i = 0;
                  foreach ($stm_br50man as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".date('m-d',strtotime($row['date']))."</td>";
                      $record_0 = $row['record'];
                      if ($record_0 >= 10000) {
                        $mscd = $record_0 % 100;
                        $scd = ($record_0 % 10000 - $mscd)/100;
                        $min = ($record_0 - $scd - $mscd)/10000;
                        if ($mscd < 10) {$mscd = "0".$mscd;}
                        if ($scd < 10) {$scd = "0".$scd;}
                        $record = $min.":".$scd.".".$mscd;
                      } else {
                          $mscd = $record_0 % 100;
                          $scd = ($record_0 - $mscd) / 100;
                          if ($mscd < 10) {$mscd = "0".$mscd;}
                          if ($scd < 10) {$scd = "0".$scd;}
                          $record = $scd.".".$mscd;
                        }
                        echo "<td>".$record."</td>";
                      $i++;
                    }
                  } ?>
                </tr>
                <tr>
                  <th>Br　女子50m</th>
                  <?php $i = 0;
                  foreach ($stm_br50woman as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".date('m-d',strtotime($row['date']))."</td>";
                      $record_0 = $row['record'];
                      if ($record_0 >= 10000) {
                        $mscd = $record_0 % 100;
                        $scd = ($record_0 % 10000 - $mscd)/100;
                        $min = ($record_0 - $scd - $mscd)/10000;
                        if ($mscd < 10) {$mscd = "0".$mscd;}
                        if ($scd < 10) {$scd = "0".$scd;}
                        $record = $min.":".$scd.".".$mscd;
                      } else {
                        $mscd = $record_0 % 100;
                        $scd = ($record_0 - $mscd) / 100;
                        if ($mscd < 10) {$mscd = "0".$mscd;}
                        if ($scd < 10) {$scd = "0".$scd;}
                        $record = $scd.".".$mscd;
                      }
                        echo "<td>".$record."</td>";
                      $i++;
                    }
                  } ?>
                </tr>
                <tr>
                  <th>Ba　男子50m</th>
                  <?php $i = 0;
                  foreach ($stm_ba50man as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".date('m-d',strtotime($row['date']))."</td>";
                      $record_0 = $row['record'];
                      if ($record_0 > 10000) {
                        $mscd = $record_0 % 100;
                        $scd = ($record_0 % 10000 - $mscd)/100;
                        $min = ($record_0 - $scd - $mscd)/10000;
                        if ($mscd < 10) {$mscd = "0".$mscd;}
                        if ($scd < 10) {$scd = "0".$scd;}
                        $record = $min.":".$scd.".".$mscd;
                      } else {
                        $mscd = $record_0 % 100;
                        $scd = ($record_0 - $mscd) / 100;
                        if ($mscd < 10) {$mscd = "0".$mscd;}
                        if ($scd < 10) {$scd = "0".$scd;}
                        $record = $scd.".".$mscd;
                      }
                        echo "<td>".$record."</td>";
                      $i++;
                    }
                  } ?>
                </tr>
                <tr>
                  <th>Ba　女子50m</th>
                  <?php $i = 0;
                  foreach ($stm_ba50woman as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".date('m-d',strtotime($row['date']))."</td>";
                      $record_0 = $row['record'];
                      if ($record_0 >= 10000) {
                        $mscd = $record_0 % 100;
                        $scd = ($record_0 % 10000 - $mscd)/100;
                        $min = ($record_0 - $scd - $mscd)/10000;
                        if ($mscd < 10) {$mscd = "0".$mscd;}
                        if ($scd < 10) {$scd = "0".$scd;}
                        $record = $min.":".$scd.".".$mscd;
                      } else {
                        $mscd = $record_0 % 100;
                        $scd = ($record_0 - $mscd) / 100;
                        if ($mscd < 10) {$mscd = "0".$mscd;}
                        if ($scd < 10) {$scd = "0".$scd;}
                        $record = $scd.".".$mscd;
                      }
                        echo "<td>".$record."</td>";
                      $i++;
                    }
                  } ?>
                </tr>
                <tr>
                  <th>Bu　男子50m</th>
                  <?php $i = 0;
                  foreach ($stm_bu50man as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".date('m-d',strtotime($row['date']))."</td>";
                      $record_0 = $row['record'];
                      if ($record_0 >= 10000) {
                        $mscd = $record_0 % 100;
                        $scd = ($record_0 % 10000 - $mscd)/100;
                        $min = ($record_0 - $scd - $mscd)/10000;
                        if ($mscd < 10) {$mscd = "0".$mscd;}
                        if ($scd < 10) {$scd = "0".$scd;}
                        $record = $min.":".$scd.".".$mscd;
                      } else {
                        $mscd = $record_0 % 100;
                        $scd = ($record_0 - $mscd) / 100;
                        if ($mscd < 10) {$mscd = "0".$mscd;}
                        if ($scd < 10) {$scd = "0".$scd;}
                        $record = $scd.".".$mscd;
                      }
                      echo "<td>".$record."</td>";
                    }
                    $i++;
                  } ?>
                </tr>
                <tr>
                  <th>Bu　女子50m</th>
                  <?php $i = 0;
                  foreach ($stm_bu50woman as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".date('m-d',strtotime($row['date']))."</td>";
                      $record_0 = $row['record'];
                      if ($record_0 >= 10000) {
                        $mscd = $record_0 % 100;
                        $scd = ($record_0 % 10000 - $mscd)/100;
                        $min = ($record_0 - $scd - $mscd)/10000;
                        if ($mscd < 10) {$mscd = "0".$mscd;}
                        if ($scd < 10) {$scd = "0".$scd;}
                        $record = $min.":".$scd.".".$mscd;
                      } else {
                        $mscd = $record_0 % 100;
                        $scd = ($record_0 - $mscd) / 100;
                        if ($mscd < 10) {$mscd = "0".$mscd;}
                        if ($scd < 10) {$scd = "0".$scd;}
                        $record = $scd.".".$mscd;
                      }
                      echo "<td>".$record."</td>";
                      $i++;
                    }
                  } ?>
                </tr>
              </tbody>
            </table>
          </div>
          -->
          <h3 class="subtitle">SRのサークル</h3>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>期</th>
                  <th>選手</th>
                  <th>サークル</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $filename = "/var/www/html/nishiHP/need_pass_to_enter/SR_circle.txt";
                $fileobj = new SplFileObject($filename, 'r');
                $readdata = $fileobj->fread($fileobj->getSize());
                echo $readdata;
                 ?>
              </tbody>
            </table>
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
</html>
