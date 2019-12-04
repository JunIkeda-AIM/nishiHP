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
          <a class="navbar-brand" href="index_pass.php">都立西高校水泳部</a>
        </div>
        <div class="collapse navbar-collapse target">
          <ul class="nav navbar-nav">
            <li><a href="../index_pass.php">Home</a></li>
            <li><a href="../report_pass.php">Report</a></li>
            <li><a href="../data_pass.php">Data</a></li>
            <li class="active"><a href="../pictures_pass.php">Picturs</a></li>
            <li><a href="../training_pass.php">Training</a></li>
            <li><a href="../schedule_pass.php">Schedule</a></li>
            <li><a href="../profile_pass.php">Profile</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#login0" data-toggle="modal" style="padding-right:50px;">管理者専用ページ</a></li>
          </ul>
        </div>
        <div style="border-top: dashed 1px rgb(85, 84, 85) ; margin-left: 15px; margin-right: 15px;">
          <p class="topicPath"><a href="../index_pass.php" style="color:black;">Home</a> &gt; <a href="../pictures_pass.php" style="color: black;">Pictures</a> &gt; <a href="select_scene.php">Scene</a></p>
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
          <h3 class="subtitle">写真一覧</h3>
          <div class="list-group">
            <?php $year = $_GET['year']; ?>
            <a href="../pictures/show_pictures.php?year=<?php echo $year; ?>&scene=rokkou" class="list-group-item">六校戦</a>
            <a href="../pictures/show_pictures.php?year=<?php echo $year; ?>&scene=shinkan" class="list-group-item">新歓</a>
          </div>
        </div>
        <!-- メインコンテンツここまで -->
        <!-- サイドバー右 -->
        <div class="col-sm-3 hidden-xs">
          <div class="containt1">
            <div>
              <a class="twitter-timeline" data-tweet-limit="5" href="https://twitter.com/koniken_cab">Tweets by koniken_cab</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
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
