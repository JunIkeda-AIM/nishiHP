<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<h2>ファイルアップロードのてすと</h2>
<?php
// ファイルの保存先
$uploadfile = '/var/www/html/nishiHP/test.txt';

// アップロードされたファイルに、パスとファイル名を設定して保存
var_dump($_FILES['upfile']);
if (move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile)) {
  // 完了メッセージを表示
  echo 'アップロード完了！';
};
?>

<title>morrisのてすと</title>
</head>
<body>
  <div id="myfirstchart" style="height: 250px;">
    <script>
      new Morris.Line({
      // ID of the element in which to draw the chart.
      element: 'myfirstchart',
      // Chart data records -- each entry in this array corresponds to a point on
      // the chart.
      data: [
        { date: '2016-12-27', record: '20' },
        { date: '2017-01-27', record: '15' },
        { date: '2017-01-28', record: '14' },
        { date: '2017-01-29', record: '13' },
        { date: '2017-01-30', record: '12' },
        { date: '2017-01-31', record: '11' },
        { date: '2017-02-01', record: '10' },
        { date: '2017-02-02', record: '9' },
        { date: '2017-02-03', record: '8' },
        { date: '2017-02-04', record: '7' },
        { date: '2017-02-05', record: '6' },
        { date: '2017-02-06', record: '5' },
        { date: '2017-02-07', record: '4' },
        { date: '2017-02-08', record: '3' },
        { date: '2017-02-09', record: '2' },
        { date: '2017-02-10', record: '1' },
        { date: '2017-02-11', record: '0' },
      ],
      // The name of the data record attribute that contains x-values.
      xkey: 'date',
      // A list of names of data record attributes that contain y-values.
      ykeys: ['record'],
      // Labels for the ykeys -- will be displayed when you hover over the
      // chart.
      labels: ['record']
      });
    </script>
  </div>
  <?php $today = date("Y-m-d", strtotime('+1 day'));
  echo $today; ?>

</body>
</html>


<th>Fr　男子50m</th>
<th>Fr　女子50m</th>
<th>Fr　男子100m</th>
<th>Fr　女子100m</th>
<th>Br　男子50m</th>
<th>Br　女子50m</th>
<th>Br　男子100m</th>
<th>Br　女子100m</th>
<th>Ba　男子50m</th>
<th>Ba　女子50m</th>
<th>Ba　男子100m</th>
<th>Ba　女子100m</th>
<th>Bu　男子50m</th>
<th>Bu　女子50m</th>
<th>Bu　男子100m</th>
<th>Bu　女子100m</th>


<?php
$dsn = 'mysql:dbname=nishi_swimming_club;charset=utf8;host=localhost';
$user = 'nishi';
$password = 'Onepiece2015';

try {
  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'データベース接続失敗。';
  exit();
}
try {
  $sql_fr50man = 'SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = "Fr" AND length = 50 AND sex = "男" order by record';
  $stm_fr50man = $pdo->query($sql_fr50man);

  $sql_fr50woman = "SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = 'Fr' AND length = 50 AND sex = '女' order by record";
  $stm_fr50woman = $pdo->query($sql_fr50woman);

  $sql_fr100man = 'SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = "Fr" AND length = 100 AND sex = "男" order by record';
  $stm_fr100man = $pdo->query($sql_fr100man);

  $sql_fr100woman = "SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = 'Fr' AND length = 100 AND sex = '女' order by record";
  $stm_fr100woman = $pdo->query($sql_fr100woman);

  $sql_br50man = 'SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = "Br" AND length = 50 AND sex = "男" order by record';
  $stm_br50man = $pdo->query($sql_br50man);

  $sql_br50woman = "SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = 'Br' AND length = 50 AND sex = '女' order by record";
  $stm_br50woman = $pdo->query($sql_br50woman);

  $sql_br100man = 'SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = "Br" AND length = 100 AND sex = "男" order by record';
  $stm_br100man = $pdo->query($sql_br100man);

  $sql_br100woman = "SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = 'Br' AND length = 100 AND sex = '女' order by record";
  $stm_br100woman = $pdo->query($sql_br100woman);

  $sql_ba50man = 'SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = "Ba" AND length = 50 AND sex = "男" order by record';
  $stm_ba50man = $pdo->query($sql_ba50man);

  $sql_ba50woman = "SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = 'Ba' AND length = 50 AND sex = '女' order by record";
  $stm_ba50woman = $pdo->query($sql_ba50woman);

  $sql_ba100man = 'SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = "Ba" AND length = 100 AND sex = "男" order by record';
  $stm_ba100man = $pdo->query($sql_ba100man);

  $sql_ba100woman = "SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = 'Ba' AND length = 100 AND sex = '女' order by record";
  $stm_ba100woman = $pdo->query($sql_ba100woman);

  $sql_bu50man = 'SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = "Bu" AND length = 50 AND sex = "男" order by record';
  $stm_bu50man = $pdo->query($sql_bu50man);

  $sql_bu50woman = "SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = 'Bu' AND length = 50 AND sex = '女' order by record";
  $stm_bu50woman = $pdo->query($sql_bu50woman);

  $sql_bu100man = 'SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = "Bu" AND length = 100 AND sex = "男" order by record';
  $stm_bu100man = $pdo->query($sql_bu100man);

  $sql_bu100woman = "SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND style = 'Bu' AND length = 100 AND sex = '女' order by record";
  $stm_bu100woman = $pdo->query($sql_bu100woman);
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
        <h2>タイトル</h2>
        <p>
          要約
        </p>
      </div>
      <div id="header" class="navbar navbar-default">
        <div class="navbar-header">
          <button class="navbar-toggle" data-toggle="collapse" data-target=".target">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index_pass.php">タイトルorロゴ</a>
        </div>
        <div class="collapse navbar-collapse target">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index_pass.php">Home</a></li>
            <li><a href="about_pass.php">about</a></li>
            <li><a href="data_pass.php">Data</a></li>
            <li><a href="pictures_pass.php">Picturs</a></li>
            <li><a href="training_pass.php">Training</a></li>
            <li><a href="schedule_pass.php">Schedule</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#login0" data-toggle="modal" style="padding-right:50px;">裏世界への入り口</a></li>
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
            <h4 class="modal-title">ゲスサミットへの入り口</h4>
          </div>
          <div class="modal-body">
            ようこそ。。
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary">Login</button>
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
	              <li><a href="http://www.nishi-h.metro.tokyo.jp/">西高校公式HP</a></li>
                <li><a href="http://www.otchy.com/cab/top.html">旧西高校水泳部HP</a></li>
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
          <h3 class="subtitle">サブタイトル</h3>
          <p>
            内容<br />
            内容<br />
            内容<br />
          </p>
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
                  <th>Fr 男子50m</th>
                  <?php $i = 0;
                  foreach ($stm_fr50man as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".$row['date']."</td>";
                      echo "<td>".$row['record']."</td>";
                    }
                    $i++;
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
                      echo "<td>".$row['date']."</td>";
                      echo "<td>".$row['record']."</td>";
                    }
                    $i++;
                  } ?>
                </tr>
                <tr>
                  <th>Fr　男子100m</th>
                  <?php $i = 0;
                  foreach ($stm_fr100man as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".$row['date']."</td>";
                      echo "<td>".$row['record']."</td>";
                    }
                    $i++;
                  } ?>
                </tr>
                <tr>
                  <th>Fr　女子100m</th>
                  <?php $i = 0;
                  foreach ($stm_fr100woman as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".$row['date']."</td>";
                      echo "<td>".$row['record']."</td>";
                    }
                    $i++;
                  } ?>
                </tr>
                <tr>
                  <th>Br　男子50m</th>
                  <?php $i = 0;
                  foreach ($stm_br50man as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".$row['date']."</td>";
                      echo "<td>".$row['record']."</td>";
                    }
                    $i++;
                  } ?>
                </tr>
                <tr>
                  <th>Br　女子50m</th>
                  <?php $i = 0;
                  foreach ($stm_br50woman as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".$row['date']."</td>";
                      echo "<td>".$row['record']."</td>";
                    }
                    $i++;
                  } ?>
                </tr>
                <tr>
                  <th>Br　男子100m</th>
                  <?php $i = 0;
                  foreach ($stm_br100man as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".$row['date']."</td>";
                      echo "<td>".$row['record']."</td>";
                    }
                    $i++;
                  } ?>
                </tr>
                <tr>
                  <th>Br　女子100m</th>
                  <?php $i = 0;
                  foreach ($stm_br100woman as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".$row['date']."</td>";
                      echo "<td>".$row['record']."</td>";
                    }
                    $i++;
                  } ?>
                </tr>
                <tr>
                  <th>Ba　男子50m</th>
                  <?php $i = 0;
                  foreach ($stm_ba50man as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".$row['date']."</td>";
                      echo "<td>".$row['record']."</td>";
                    }
                    $i++;
                  } ?>
                </tr>
                <tr>
                  <th>Ba　女子50m</th>
                  <?php $i = 0;
                  foreach ($stm_ba50woman as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".$row['date']."</td>";
                      echo "<td>".$row['record']."</td>";
                    }
                    $i++;
                  } ?>
                </tr>
                <tr>
                  <th>Ba　男子100m</th>
                  <?php $i = 0;
                  foreach ($stm_ba100man as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".$row['date']."</td>";
                      echo "<td>".$row['record']."</td>";
                    }
                    $i++;
                  } ?>
                </tr>
                <tr>
                  <th>Ba　女子100m</th>
                  <?php $i = 0;
                  foreach ($stm_ba100woman as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".$row['date']."</td>";
                      echo "<td>".$row['record']."</td>";
                    }
                    $i++;
                  } ?>
                </tr>
                <tr>
                  <th>Bu　男子50m</th>
                  <?php $i = 0;
                  foreach ($stm_bu50man as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".$row['date']."</td>";
                      echo "<td>".$row['record']."</td>";
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
                      echo "<td>".$row['date']."</td>";
                      echo "<td>".$row['record']."</td>";
                    }
                    $i++;
                  } ?>
                </tr>
                <tr>
                  <th>Bu　男子100m</th>
                  <?php $i = 0;
                  foreach ($stm_bu100man as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".$row['date']."</td>";
                      echo "<td>".$row['record']."</td>";
                    }
                    $i++;
                  } ?>
                </tr>
                <tr>
                  <th>Bu　女子100m</th>
                  <?php $i = 0;
                  foreach ($stm_bu100woman as $row) {
                    if ($i === 0) {
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['class']."</td>";
                      echo "<td>".$row['date']."</td>";
                      echo "<td>".$row['record']."</td>";
                    }
                    $i++;
                  } ?>
                </tr>
              </tbody>
            </table>
          </div>
          <p>
            内容<br />
            内容<br />
            内容<br />
          </p>
          <form class="form-horizon" action="test.php" method="post">
            <div class="modal fade" id="report" tabindex="-1">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" ><span>×</span></button>
                  </div>
                  <div class="modal-body">
                    <?php echo "hello world!"; ?>
                    <?php $text = $_POSt['text']; ?>
                    <?php echo $text; ?>
                  </div>
                </div>
              </div>
            </div>
            <input type="text" name="text" value="aaa">
            <button type="button" name="button"><a href="#report" data-toggle="modal">レポート表示</a></button>
          </form>
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
