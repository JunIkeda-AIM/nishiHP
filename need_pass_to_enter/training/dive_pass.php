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
          <p class="topicPath"><a href="../index_pass.html" style="color: black;">Home</a> &gt; <a href="../training_pass.php">Training</a> &gt; <a href="free_style_pass.php">Dive</a></p>
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
              飛び込みにはグラブスタートとクラウンチングスタートの2種類があります。自分にあった飛び込み方は15mを頭が通過するまでのタイムを比べることで容易に判定できます。<br />しかし、トップスイマーはこの2つの飛び込み方でほとんどタイムに差はでません。ただし、なぜかクラウンチングスタートを選択する人が多いです。2つの飛び込み方の絶対の共通点は空中で腕を前方に振り上げストリームラインを作ることです。いずれの飛び込み方をするにせよ、ここは守る必要があります。入水断面積を限りなく最小に近づけるのはもちろんですが、入水後は少し指先を逸らして深くならないようにしましょう。これは、深く潜るとそのぶんの水圧で抵抗が高くなるからです。<br />ドルフィンキックのコツは左右同時のダウンビートキックにあると思われがちですが、実は、ダウンビートキックのあとに体幹を使っておしりを高く持ち上げる動作の方がずっと大切です。なぜなら、いくらキックに使う脚力が強くても足を加速させるぶんの「遊び」がないと何の意味もないからです。<br />こういうところで、水泳は「外骨格を覆ういかめしい筋肉のスポーツ」ではなく、「しなやかなコアと深い思考のスポーツ」であることが分かります。
            </p>
          </div>
          <div class="content2">
            <h3 id="grab-start" class="subtitle">グラブスタート</h3>
            <p>
              メリットは3カ所(腰、ひざ、足首)の関節のバネをフルに使えることです。また、空中で腕を前に伸ばしやすいのでクラウンチングするより飛距離も伸びます。しかし、「ヨーイ」の時に少しでも押されたらプールに転落するくらいまで足の裏の母指球に重心を移しておかないとリアクションタイムがとても遅くなってしまうというデメリットがあります。なぜなら、スタートの合図が鳴ってから3カ所にタメをつくっていたら遅すぎるからです。<br />
              飛び出すときには両手を前に振り出す動作とバネの解放を同期させることで大きなパワーを発生させられます。足の指先がスタート台から離れる瞬間に「指先から腰まで」が美しい直線になるようにしてください。この直線は水平から30度傾いていると飛距離が最大になります。くれぐれも「ひざ落ち」と呼ばれる状態にならないようにしてください。指先が離れる瞬間に「指先から腰まで」が直線になっておらず、「ひざ関節だけが陥没している」とこうなります。
            </p>
            <h3 id="crouching-start" class="subtitle">クラウチングスタート</h3>
            <p>
              メリットは反応速度が速いことです。反射神経が良い人に向いています。それと、スターティングブロックのついたプールのアドバンテージを活かせることです。片足で踏み切るため、グラブスタートよりは飛距離はでません。グラブスタートとは全く逆にスタートの合図前は後ろ足の母指球に、60パーセントの体重をかけてください。前かがみになっている人がいますが、それは端的に間違っています。左右の足の内側のラインが直線軌道を描くように足をスタート台上に配置してください。<br />
              飛び込みの角度は前の足が飛び込み台を離れる瞬間に30度になっているのがベストです。入水時は、「前足のかかと」と「後ろ足の甲」を軽く接するようにするスイマーが多いです。なぜこうするのかは私は全く知りませんが、足が大きく開くよりは絶対にいいはずです。かっこよく見えてモテる可能性があるので真似してみましょう。
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
