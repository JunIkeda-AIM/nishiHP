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
          <p class="topicPath"><a href="../index_pass.html" style="color: black;">Home</a> &gt; <a href="../training_pass.php">Training</a> &gt; <a href="breaststroke_style_pass.php">BreaststrokeSytle</a></p>
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
          <label>この記事は67th押野彩香に書いていただきました。</label>
          <div id="content1">
            <h2 class="subtitle">イントロダクション</h2>
            <p>
              平泳ぎは英語でbreast strokeということから、「ブレスト」または「ブレ」とも呼ばれています。毎回呼吸ができて楽な泳法というわけではなく、むしろエネルギー効率が悪いので全泳法の中で最も遅い泳法です。つまり、同じ距離でも他の泳法よりも長い時間泳ぐので、スタミナを必要とします。水の抵抗を最も受ける泳法のため、いかに抵抗を減らして泳げるかが重要になってきます。難しい泳法だからこそ、速く泳げたとき超気持ちいいです。
            </p>
          </div>
          <div id="content2">
            <h3 id="kick" class="subtitle">キック</h3>
            <p>
               平泳ぎのキックは他の３泳法と違い、足首を曲げ伸ばしながら足の裏のみで蹴るのが特徴です。他の泳ぎにはない動きですが、平泳ぎはキックでたくさんの推進力を得ていると言っても過言ではないくらい、キックが大切です。正しいキックができなければ速く泳ぐことはできません。<br />
               平泳ぎのキックは他の３泳法と違い、足首を曲げ伸ばしながら足の裏のみで蹴るのが特徴です。他の泳ぎにはない動きですが、平泳ぎはキックでたくさんの推進力を得ていると言っても過言ではないくらい、キックが大切です。正しいキックができなければ速く泳ぐことはできません。<br />
               これらの２つのうち速く泳げるのはウイップキックです。平泳ぎの選手ならぜひともウイップキックをマスターしてほしいです。ウイップキックはざっくり言うと、抵抗の少ないコンパクトなキックです。ウイップキックは足首と股関節の柔軟性が必要です。（かかとをつけた状態でしゃがめる、正座を左右横に足をくずしたお姉さん座り（？）ができる程度の柔軟性があるといいです。）<br />
               ここから詳しく書いていきます。まず、膝をあまり開かず、かかとを膝より外側にして、足を引きます。後ろから見ると「Ｗ」の形になります。できるだけ膝を落とさずに、抵抗が少ないフラットな姿勢で足を引き付けるのが理想です。足を引き付けたら、足の裏でまっすぐ後ろに押します。水中ではまっすぐに蹴ることは難しいのですが、後ろに向かって「押す」というイメージを持って泳ぐことが大切です。
            </p>
            <h3 id="glide" class="subtitle">グライド</h3>
            <p>
              ストロークを始める状態のことです。手・頭・腰・お尻・足先のラインを一直線に伸ばします。腹圧を意識してください。十分にリラックスして、力をためます。
            </p>
            <h3 id="catch" class="subtitle">キャッチ</h3>
            <p>
              手を前に伸ばしている状態から、手の平を外側に向け、外側の斜め上に肩幅よりやや広めに両腕を開いてきます。
            </p>
            <h3 id="pull" class="subtitle">プル（アウトスイープ）</h3>
            <p>
              脇を開くように腕を曲げ、肘を高く構えて（ハイエルボ―）、手の平を後ろにむけて水をかきます。ハイエルボ―でないと腕全体で水をかくことができません
            </p>
            <h3 id="finish" class="subtitle">フィニッシュ</h3>
            <p>
              腕が胸の横より少し前にきたあたりから、手の平を内側に向け水を抱え込み、顔の前でそろえます。このとき、無理に肘をくっつけなくて大丈夫です。肘を肩より後ろに引かないようにしてください。
            </p>
            <h3 id="recovery" class="subtitle">リカバリー</h3>
            <p>
              両手を前方につきだすように伸ばし、グライドに戻ります。下にもぐってしまうのはダメです。
            </p>
            <h3 id="breath" class="subtitle">呼吸</h3>
            <p>
              手を開いてから顔の前で合わせる時に顔を上げます。プルでかいてきた水をフィニッシュで抱え込むときに身体も一緒に上がるので、その浮力を生かして呼吸をしてください。無理に顔を上げなくても呼吸できます。むしろ、無理に顔を上げることで首をしめてしまうので、息苦しくなってしまいます。また、頭が高い位置にあると上半身が立ってしまうので、下半身が沈み、おおきな抵抗を受けてしまします。呼吸するときは水面の１メートル先を見るくらいで十分呼吸できます。
            </p>
            <h3 id="combination" class="subtitle">コンビネーション</h3>
            <p>
              平泳ぎのキックとストロークのタイミングはものすごく重要です。腰の位置を常に、なるべく高い位置で保つように意識しましょう。そうすることで、抵抗の少ない泳ぎになります。<br />
              さて、合わせるべきタイミングは「手を伸びきった時に蹴る」です。キックで進むときに、ストリームラインができているのが理想的です。そのためには、手をかき始めて両手を顔の前に戻した時に足を引き付け始めます。手と足のタイミングを少しずらすことが大切です。ただ、タイミングは感覚的なところもあるので、自分にあったタイミングを見つけてください。

            </p>
            <h3 id="one_strole_one_kick" class="subtitle">ひとかきひとけり</h3>
            <p>
              平泳ぎの特徴の１つです。飛び込んだ後、ターンの後、つまり最もスピードが出ている時に「ひとかきひとけり」をします。壁を蹴った時の一番速いスピードを、効果的に速めることができるのが、ひとかきひとけりです。ひとかきひとけりが上手な選手はターンのたびにリードできるので、とても有利です。ひとかきひとけりのため、自由形やバタフライよりも水中にいる時間が長いので、少し深めに飛び込みする、壁を蹴るといいでしょう。<br />
              詳しく書いていきます。まず、壁を蹴ったら「ひとかき」をする前にストリームラインで抵抗を小さくして進みましょう。その推進力を継続させるように、肘を曲げて身体の近くを通って、太ももまでかきます（ひとかき）。この状態で少し待って速度が落ち始めたら、リカバリーを開始します。正面から見た時に、手の平が見えないように、また抵抗をへらして水をきるようにリカバリーします。手が伸びきると同時にけります（ひとけり）。このあとにストロークから泳ぎ始めます。
            </p>
            <h3 id="turn" class="subtitle">ターン</h3>
            <p>
              バタフライと同じです。一応書いておきます。<br />
              壁に両手をタッチします。この時、両手の高さが同じでないと失格になってしまいます。タッチした後、肘を曲げて壁に身体をしっかり引き寄せます。左手を水中で進行方向にもっていきながら、右手で壁を押して左手と手を組みながら、一気に蹴りだします。人によって、ターンの向きが違うとき（右手と左手が逆）があります。自分に合う方でやってください。大切なことは「抵抗を小さくコンパクトに！」です。頭を極力上げないようにしてください。
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
