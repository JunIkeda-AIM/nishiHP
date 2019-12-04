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
            <li class="active"><a href="../training_pass.php">Training</a></li>
            <li><a href="../schedule_pass.php">Schedule</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#login0" data-toggle="modal" style="padding-right:50px;">管理者専用ページ</a></li>
          </ul>
        </div>
        <div style="border-top: dashed 1px rgb(85, 84, 85) ; margin-left: 15px; margin-right: 15px;">
          <p class="topicPath"><a href="../index_pass.html" style="color: black;">Home</a> &gt; <a href="../training_pass.php">Training</a> &gt; <a href="free_style_pass.php">Turn</a></p>
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
          <label>この記事は67th田中恭平に書いていただきました。</label>
          <div id="content1">
            <h2 class="subtitle">イントロダクション</h2>
            <p>
              クイックターンは、「ターンイン」と「ターンアウト」の2つで構成されます。クイックターンは水深30cmから50cmの範囲に足の裏を置いて壁を蹴り出してください。なぜかというと、それより浅いところからスタートすると、自分が泳いできてそこまで連れてきた水が作り出した水流と真正面からぶつかることで抵抗になるからです。こうして推進力の相殺が起きてしまいます。<br />
              逆に、30cmから50cmの水深では、そこまで連れてきた水が跳ね返りその付近を逆流して進行方向と同じ水流を作っているので、その流れに乗って加速できます。では、なぜそれより深くてはいけないかというと、水の抵抗は水深が深くなればなるほど自分の上に乗っている水の量が多くなるので大きくなるからです。また、深くスタートすると浮き上がりに時間がかかってしまうからという極めて実際的な理由もあります。<br />
              ちなみに、自分の水流と逆行しない程度には深く、かといって水圧が高まらない程度には浅いところで壁を蹴ることが出来ると、壁際での速さは理論上、プール中央付近の最大で3倍くらいまで速くなると言われています。長距離を泳ぐ人や、ショートレストなどの練習では特に気をつけてください。なぜなら、ターンをする回数が多いからです。
            </p>
          </div>
          <div class="content2">
            <h3 id="turn-in" class="subtitle">ターンイン</h3>
            <p>
              自分にとってベストな位置でターンするためには壁に向かって腕を伸ばして壁に手がギリギリ届かない位置でターンするのがベストだと言われています。<br />
              頭を勢いよく水中に入れる時に同時に強くドルフィンキックを打つことで回転速度を上げることができます。太ももを身体に近付け、足を水面上で折りたたむことでコンパクトなターンをしましょう。壁には右が上になるように足の裏を横向きにして水深30cmから50cmのところに足をつけてください。それより高いとターンアウトのときに深く沈み過ぎてしまうでしょう。回転中に手を頭の上に準備しておくことが大切です。壁に足がついたときのひざの角度は90度が理想です。日本のプールは右側通行が多いので、左に身体を反転させるのに慣れておきましょう。ということは、右足が上になるように足を揃えるということです。<br />
              すべての動作には合理的な理由があります。それを本能的に、もしくは、理論的に理解することは大切です。なぜなら、イメージトレーニングができるからです。
            </p>
            <h3 id="turn-out" class="subtitle">ターンアウト</h3>
            <p>
              カベを蹴ったらスピードが落ちる前にドルフィンキックを3回か4回うってください。水面に出る直前にバタ足を開始するとスイムへの移行がスムーズになります。自由形の場合は水面に出る直前に、水中でひとかき分だけかいてください。<br />
            </p>
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
