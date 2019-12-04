<!DOCTYPE html>
<html>
  <!-- ページ情報 -->
  <header>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="js/bootstrap.min.js"></script>
    <title>都立西高校水泳部HP</title>
    <link rel="stylesheet" href="stylesheet.css">
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
          <a class="navbar-brand" href="index.php">都立西高校水泳部</a>
        </div>
        <div class="collapse navbar-collapse target">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="need_pass_to_enter/index_pass.php">ログイン</a></li>
          </ul>
        </div>
        <div style="border-top: dashed 1px rgb(85, 84, 85) ; margin-left: 15px; margin-right: 15px;">
          <p class="topicPath"><a href="index_pass.html" style="color: black;">Home</a></p>
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
          <h3 class="subtitle">都立西高校水泳部HPへようこそ</h3>
          <p>
            当サイトは西高水泳部のOBにより設立され、個人的に運営されています。<br />
            当サイトを利用したことにより被る不利益に関する責任は、当方一切負いかねますのでご了承ください。<br />
          </p>
          <p>
            水泳部員の方は右上のログインボタンからログインしてください。<br />
            ログインすることにより、各種データベース、練習メニュー、写真等の閲覧等が可能になります。<br />
            <br />
          </p>
          <p>
            現役三世代もしくはOB三世代以外の方など、当サイトにログインを希望される方は下記メールアドレスに名前と利用目的を明記してメールを送ってください。<br />
            メールアドレス：nishi.swimmingclub@gmail.com
          </p>
          <h3 class="subtitle">部活紹介</h3>
          <div class="about-img">
            <img src="img/h6BqWlCV.jpg" alt="プール" width="60%">
          </div>
          <div class="about-text2" style="margin-left:10px; ">
            <h4>活動日</h4>
            <p>
              ・夏期<br />
              基本的に平日は毎日授業後から下校時間の18時まで水中トレーニングをしています。<br />
              <br />
              ・冬期<br />
              火・水・金曜日に授業後から下校時間の17時まで陸上トレーニングをしています。<br />
              <br />
            </p>
          </div>
          <div class="about-text1" style="float:left;">
            <p>
              都立西高校水泳部は、初心者から経験者まで部員全員がチーム一丸となって練習に励み、<br />
              夏の終わりに開催される六校戦優勝を目指しています。<br />
              <br />
              水泳部に興味があるという方は是非見学・体験にいつでもお越しください。
              <br />
            </p>
          </div>
        </div>
        <!-- メインコンテンツここまで -->
        <!-- サイドバー右 -->
        <div class="col-sm-3 hidden-xs">
          <div class="containt1">
            <div>
              <a class="twitter-timeline" data-tweet-limit="5" href="https://twitter.com/ここにIDの＠以下を入力">Tweets by 名前などをここに入力</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
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
</head>
