<!DOCTYPE html>
<html>
  <!-- ページ情報 -->
  <header>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootstrapのCSS読み込み -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="../../../js/bootstrap.min.js"></script>
    <title>都立西高校水泳部HP</title>
    <link rel="stylesheet" href="../../../stylesheet.css">
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
          <a class="navbar-brand" href="../../index_pass.php">都立西高校水泳部</a>
        </div>
        <div class="collapse navbar-collapse target">
          <ul class="nav navbar-nav">
            <li><a href="../../index_pass.php">Home</a></li>
            <li><a href="../../report_pass.php">Report</a></li>
            <li><a href="../../data_pass.php">Data</a></li>
            <li><a href="../../pictures_pass.php">Picturs</a></li>
            <li><a href="../../training_pass.php">Training</a></li>
            <li><a href="../../schedule_pass.php">Schedule</a></li>
            <li class="active"><a href="../../profile_pass.php">Profile</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#login0" data-toggle="modal" style="padding-right:50px;">管理者専用ページ</a></li>
          </ul>
        </div>
        <div style="border-top: dashed 1px rgb(85, 84, 85) ; margin-left: 15px; margin-right: 15px;">
          <p class="topicPath"><a href="../../../index_pass.php" style="color: black;">Home</a> &gt; <a href="../../../profile_pass.php">Profile</a> &gt; <a href="profile-top.php">main_member</a></p>
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
            <form class="" action="../../manager/index_manager.php" method="post">
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
          <h3 class="subtitle">部員紹介 68期</h3>
          <!--
          <ul>
            <?php /* $dsn = 'mysql:dbname=nishi_swimming_club;charset=utf8;host=localhost';
            $user = 'nishi';
            $password = 'Onepiece2015';
            try {
              $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
              $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
              echo 'データベース接続失敗。';
              exit();
            }
            $this_year = date('Y');
            if ($date('m') < 4) {
              $this_year -= 1;
            }
            $main_OB = $this_year - 1950;
            $main_me = $this_year - 1946;
            try {
              $sql = 'SELECT * FROM team_member WHERE class = :class order by name';
              $stm = $pdo->prepare($sql);
              $stm->bindValue(':class', $main_me, PDO::PARAM_STR);
              $stm->execute();
            } catch (Exception $e) {
              echo "データ受信失敗";
              exit();
            }
             */?>
            <?php// foreach ($stm as $row): ?>
              <li><a <?php echo "href='".$row['id'].".php'"; ?>><?php echo $row['name'];?></a></li>
            <?php// endforeach ; ?>
          </ul>
          -->
          <ul>
            <li><a href="40.php">田中 瑛介</a></li>
            <li><a href="25.php">加藤 翔</a></li>
            <li><a href="42.php">打矢 悠</a></li>
            <li><a href="47.php">河原 明日香</a></li>
            <li><a href="48.php">和田 浩幸</a></li>
            <li><a href="49.php">高橋 周太郎</a></li>
            <li><a href="50.php">塘 安奈</a></li>
          </ul>
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
