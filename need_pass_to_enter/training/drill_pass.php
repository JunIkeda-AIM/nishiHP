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
          <p class="topicPath"><a href="../index_pass.html" style="color: black;">Home</a> &gt; <a href="../training_pass.php">Training</a> &gt; <a href="free_style_pass.php">Drill</a></p>
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
          <ul>
            <li><a href="#free_drill">フリーのドリル</a></li>
            <li><a href="#breast_drill">ブレのドリル</a></li>
            <li><a href="#back_drill">バックのドリル</a></li>
            <li><a href="#fly_drill">バッタのドリル</a></li>
          </ul>
          <div id="content1">
            <h3 id="free_drill" style="margin-bottom:20px;">フリーのドリル</h3>
            <h4 id="drill-1" class="subtitle">顔上げキック</h4>
            <p>
              両足が交差するときに親指が軽く触れるくらいのやわらかく幅のせまいキック。
            </p>
            <h4 id="drill-2" class="subtitle">板キック</h4>
            <p>
              ビート板の中央に手を乗せる。腹圧でボディーポジションを高く維持したい。
            </p>
            <h4 id="drill-3" class="subtitle">バタ足</h4>
            <p>
              ビート板を持たずにやる。ストリームラインを作りながらキックを打つことで手元が沈まないようにしたい。
            </p>
            <h4 id="drill-4" class="subtitle">サイドキック</h4>
            <p>
              左右に曲がらないためには、アップビートを意識せざるを得ない。
            </p>
            <h4 id="drill-5" class="subtitle">片足キック</h4>
            <p>
              ビート板を持ってやる。確実にダウンビートだけを鍛えるための練習。
            </p>
            <h4 id="drill-6" class="subtitle">アームバックキック</h4>
            <p>
              ローリングとシックスキックを同期させたい。ローリングの角度が最大になっているときにアクセントのあるキックがくるように。
            </p>
            <h4 id="drill-7" class="subtitle">ボゥドリル</h4>
            <p>
              片手は入水直前で固定。片手はキャッチの位置で固定。自由形ストロークの中で最も沈みやすい姿勢で、バタ足だけで進む。ボディーポジションを維持する練習である。
            </p>
            <h4 id="drill-8" class="subtitle">ドックパドル</h4>
            <p>
              エントリーからキャッチまでの動作とキックの援助だけで進む。リカバリーは水中で行う。
            </p>
            <h4 id="drill-9" class="subtitle">スカーリングフルストローク</h4>
            <p>
              5回の前方スカーリングで水を掴み、それをそのままフィニッシュ位置まで持っていく。
            </p>
            <h4 id="drill-10" class="subtitle">片手ストローク</h4>
            <p>
              S字ストロークになると身体が左右に蛇行するのが分かる。
            </p>
            <h4 id="drill-11" class="subtitle">スライディングサムドリル</h4>
            <p>
              腰から脇の下までの体側を親指でなぞるようにリカバリーをする。片手のリカバリーの間に12回キックをうつ極めてゆっくりのペース。
            </p>
            <h4 id="drill-12" class="subtitle">片手クロール</h4>
            <p>
              ローリングに合わせた無駄のない息継ぎが目的。ストロークは意識の対象ではない。
            </p>
            <h4 id="drill-13" class="subtitle">クロックドリル（１２時）</h4>
            <p>
              キャッチアップスイムの途中で、腕が真上にまっすぐのびた最も沈みやすい体勢で一度リカバリーを止めてすぐにまた始める。体勢の維持が目的。
            </p>

            <h3 id="breast_drill" style="margin-bottom:20px;">ブレのドリル</h3>
            <h4 class="subtitle">板キック（顔上げ）</h4>
            <p>
              ビート板を使ったキック<br />
              腰が浮いた状態のキック感覚をつかむ。腹圧を意識して蹴り終わった後の姿勢を一直線にする。
            </p>
            <h4 class="subtitle">プルブイキック</h4>
            <p>
              プルブイを挟んでキック<br />
              膝を開かないでキックする感覚をつかむ。
            </p>
            <h4 class="subtitle">サイドキック</h4>
            <p>
              体を横向きにしてキック<br />
              足が水から出ないように狭くコンパクトに蹴る。体感を意識する。
            </p>
            <h4 class="subtitle">かかとタッチ</h4>
            <p>
              気を付けの姿勢でかかとをタッチ<br />
              膝を落とさない、正しい足の引きつけを身につける。
            </p>
            <h4 class="subtitle">背面キック</h4>
            <p>
            背泳ぎのように仰向けでキック<br />
            水面から膝を出さないように蹴る。膝を落とさずに足を引きつける感覚をつかむ。
            </p>
            <h4 class="subtitle">スカーリング</h4>
            <p>
              頭の前の方（キャッチ）と、肩の辺り（フィニッシュ）を重点的に。肘の位置に注意。
            </p>
            <h4 class="subtitle">２キック１プル</h4>
            <p>
            ２回キックして１回腕をかく。<br />
            コンビネーションや呼吸のタイミングを合わせる。</p>
            <h4 class="subtitle">２プル１キック</h4>
            <p>
            ２回腕をかいて１回キックする。<br />
            腕だけでも、普通に泳いでいる時と同様に体重移動をうまく行う。</p>
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
