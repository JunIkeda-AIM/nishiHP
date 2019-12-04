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
          <p class="topicPath"><a href="../index_pass.html" style="color: black;">Home</a> &gt; <a href="../training_pass.php">Training</a> &gt; <a href="free_style_pass.php">FreeSytle</a></p>
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
              自由形という泳法はストローク型の泳法に分類され、その利点かつ特徴は、身体のローリングによっても推進力を得ていること、全泳法中最も早いことにあります。また、日本における自由形の発達は、他泳法に比べて日本では褒められやすいということです。もちろん競技人口も他泳法に比べて多いのでまったく逆のことも言えるわけですが。<br />
              てか、ごちゃごちゃうるせぇよ。フリー単純にそのものが面白いっすよ。
            </p>
            <h2 class="subtitle">各論</h2>
            <p>
              以下は自由形を構成するエレメントを12項目に分けて解説したものです。<br />
              なぜ分けるのかというと、複雑な運動なので同時に観察することが難しいからです。ただし、分けることによって各要素を「点」として認識することには問題があります。なぜなら、自由形の進行中に身体の動作が停止する時間は全くないので、すべての要素は「点」としてではなく「幅(純粋持続)」としてとらえられるべきだからです。その意味で、本来、分けるべきではありません。だから、１つの動作を練習するときには、必ず前後の動作と関連付けて、その連続の中で習得してください。<br />
              また、人間が同時に12項目のことに注意を払うことなどそもそも不可能だからという実際的な根拠もあります。分割はあくまでも便宜上の選択であって、この選択によってすくい取ることができずこぼれ落ちてしまった要素があることを忘れないでください。あくまでも「水泳」は「水」が我々水泳部員に教えてくれるものです。
            </p>
          </div>
          <div id="content2">
            <h3 id="body-position" class="subtitle">ボディポジション</h3>
            <p>
              水中でお腹を凹ませるための腹圧が大切です。①「下腹部がうすっぺらくなるようにする」②「ヘソのななめ下に力をいれる」③「みぞおちをあげる」など注意すべきいくつかのポイントがあります。腹圧を鍛えるドライランドトレーニングについては後述します。冬練の参考にしてください。<br />
              泳ぎが進行中、ベースとなる身体の位置は常に横向きです。ボディを下に向けて泳いでいる人が多いですが、それは、ビート板キックの練習をやりすぎた弊害とすら言えるのかもしれません。基本の姿勢はストリームラインです。進行方向に対する断面積が最も小さくなるようにしてください。<br />
              具体的には、両手を挙げて、手のひらを重ねて、両腕を耳の横か、すぐ後ろにあててください。アゴを引きすぎると下に向いてしまうので、顔は真下に向けてください。ただし、目線はななめ前を見るというのが難しいテクニックです。
            </p>
            <h3 id="kick" class="subtitle">キック</h3>
            <p>
              一般に、下に向かって打ち付けるキックをダウンビート、蹴り上げるキックをアップビートと呼びます。ダウンビートの完成とアップビートの開始が同時になるように足首のスナップを効かせることも重要です。膝を曲げ過ぎることや、足が水面に出ることはダメです。水面ギリギリで横幅の狭いキックが最も速いです。<br />
              西高校水泳部では、シックスキックを採用したいと思います。シックスキックとは音楽でいうワルツのことです。つまり、6回の拍があるという意味では全くなく、一拍目と四拍目に強いアクセントがつくという意味です。アクセントというのは、ダウンビートの時に「ボゴッ！ボゴッ！」と泡の音がするイメージです。「タン！(右足)タンタン、タン！(左足)タンタン」というワルツのリズムで泳いでください。このアクセントがつくキック部分だけを取り出すとツーキックになります。この点で、自由形のキックにはワルツとの奇妙なアナロジーがあります。<br />
              足全体をムチのように使ってください。強いキックを打とうとして、力を入れてしまうことで脚が下がり、大きな抵抗を受けている人がいます。かかとの位置が最下点に到達してから足首から下がプールの底に向かってしなり始め、そこで脚の動きが止まることなくかかとが上がることで、足首のスナップをつかったキックになります。つまさきを内向きにして親指が擦れる程度でバタ足をしましょう。アップビートが強いスイマーは少ないので、鍛えると大きな差をつけられます。盲点だった人は、サイドキックで鍛えましょう。
            </p>
            <h3 id="entry" class="subtitle">エントリー</h3>
            <p>
              そもそもエントリーというのは、入水とその直後の動きを指します。入水は親指からです。肩の延長線上に入れて水しぶきを立てないように入水してください。<br />
              手のひらの角度は40度外向きが理想です。なぜかというと、ローリングによってその後40度回転すると、キャッチのときにはすべての指が真下を向くようになるからです。入水を遠くに入れすぎると軸がぶれるので腕を伸ばしすぎないでください。入水していく順番は、指先→手首→肘→肩です。入水後は指先をプールの底に向けるようにしましょう。早く入れすぎることで反ったりしないようにしましょう。<br />
              伸ばした腕の対角線上にある足が強い推進力を生み出すタイミングで、伸ばした腕に体重をかけましょう。この時間を、「グライド」といいます。
            </p>
            <h3 id="catch" class="subtitle">キャッチ</h3>
            <p>
              ハイエルボーポジションが入水してから水中で早めに作れるようにしてください。ハイエルボーの「ハイ」とは「高い」という意味ではなく、「肩より前」という意味です(もちろんそうするためには肘の位置を高くする必要があるわけですが)。<br />
              90度から110度の肘の開きを肩の前で保ちましょう。ハイエルボーポジションをつくる意義は、身体部位の順番(指先→手首→肘→肩)を守ることにあります。
            </p>
            <h3 id="stroke" class="subtitle">ストローク</h3>
            <p>
              クロールの推進力のうち70?80パーセントは上肢から生じています。ストロークの前半から後半にかけて、だんだん強くかつ速く掻いていきましょう。加速的なストロークが理想です。<br />
              前腕の軌道がS字になるのは問題ありませんが、手のひらの軌道がS字になるのは問題があります。なぜなら、I字ストロークが一番速いからです。むしろ、軌道に注意するよりも、横から見たときに楕円形(U字型)の綺麗な円弧を描くことに注意しましょう。<br />
              難しく考えれば考えるほどストロークの効率は落ちていきます。
            </p>
            <h3 id="finish" class="subtitle">フィニッシュ</h3>
            <p>
              腰骨を超える位置でフィニッシュです。<br />
              手のひらが上に向くのをやめましょう。あくまでも進行方向と逆の方向に強く水を押し出してください。<br />
              この瞬間に、一番速く腕が動くようになると、加速的ストロークになっています。
            </p>
            <h3 id="recovery" class="subtitle">リカバリー</h3>
            <p>
              ローリングをあまりしない人は肘を高くしないほうがいいです。身体のひねりと同時に体重が前にのるように意識しつつ、エントリーにつなげましょう。肘が最も高い位置に来たときに、もう一方の手は水中でキャッチに入っていなければなりません。リカバリーの前半では、もう片方の手はグライドをしているべきであり、リカバリーの後半ではもう片方の手はキャッチから加速してフィニッシュへと向かっているべきです。リカバリーをするときは、かならず肘から水面上に出すことが大切です。肘が水面上に出たとき、まだ水中ではその前腕がフィニッシュ動作の最中であることが理想的です。<br />
              また、自由形の強い推進力の主な発生要因は3つあります。①つめが、腕と反対側の足のダウンビート。②つめが、水中の腕のキャッチ。そして、しばしば忘れられる③つめの推進力こそが、リカバリー後半の腕の移動です。これは、ローリングと合わせて行われることで、体重を前方へ乗せていく役割があります。<br />
              また、呼吸時は、リカバリーハンドが視界に入る前に、顔を戻してください。
            </p>
            <h3 id="breath" class="subtitle">ブレス</h3>
            <p>
              呼吸のタイミングは、呼吸サイドの手がフィニッシュを迎えて、呼吸と逆サイドの手がエントリーしている瞬間がベストです。ゴーグルの半分だけを水面に出すだけで充分呼吸できるので、ローリング以上の傾きをつけないでください。頭を上げなくても口さえ出ていれば呼吸は可能だからです。<br />
              水中では鼻から息をハミングするように出し、水面に出る直前で口から息を一気に吐き出してください。なぜ直前で一気に吐き出すかというと、反動で一気に吸えるからです。首をひねらなければひねらないほど、抵抗が少ないです。<br />
              疲れて心拍数が上がると息つぎが長くなっていきます。ディスタンス泳法の人は、疲れたときほど短く息をすることを意識する必要があります。息つぎをしたときにリカバリーに向かう自分の腕(リカバリーハンド)がみえるのは息つぎが長すぎるという合図です。疲れているときは自分の腕が見えたら呼吸時間を減らすようにしましょう。
            </p>
            <h3 id="rotation" class="subtitle">ローテーション</h3>
            <p>
              先ほども述べましたが、リカバリーの前半では片方は水中前方でグライド、リカバリーの後半では片方の手はキャッチからフィニッシュに向けて加速的に移動しているのが最も正しいローテーションです。
            </p>
            <h3 id="timing" class="subtitle">タイミング</h3>
            <p>クロール泳法にタイミングは2種類しかありません。対角線軸キックか、同側キックです。どちらも選手によって向き不向きがあり、選択は好みの問題です。</p>
            <h4>・対角線軸キック</h4>
            <p>
              対角線軸キックの場合は、右足のダウンビートが終わったときに左手のキャッチに入るのが対角線軸キックです。別の言い方をすると、右足のダウンビートと左手のエントリーからキャッチまでの動作(グライド)が同期するようにしてください。そしてこの瞬間のキックはそれ以外の2拍よりも強く打つのでアクセントがつきます。このキックでうまれた推進力がエントリー中の対角線上の腕に乗るというわけです。
            </p>
            <h4>・同側キック</h4>
            <p>
              同側キックとは、右足のダウンビートと右手のフィニッシュ、左足のダウンビートと左手のフィニッシュが同期する泳ぎ方です。これは、手と足のパワーポイントが同期する泳ぎ方です。脚の疲労が少なくなるので、ディスタンス泳法かつツーキックの人が利用するのがいいかもしれません。
            </p>
            <h3 id="rolling" class="subtitle">ローリング</h3>
            <p>下→右→下→左→下→右というローリングは完全に間違っています。下で止まる瞬間など０秒なのだから、横向きから横向きへとひねってください。スタート時は底に対して平行ですが、クロールが始まったら一度たりとも下向きで身体が固定することはありません。
            </p>
            <h3 id="distance-style-of-swimming" class="subtitle">ディスタンス泳法</h3>
            <p>
            スプリント泳法とディスタンス泳法の差異はグライド継続時間とキックのアクセントだけです。ディスタンスのほうが、キャッチまでの時間は長くなります。<br />
            キャッチからフィニッシュまではディスタンスといえども加速的に動かしてください。なぜなら、そのほうが効率がいいのでディスタンスといえども疲れないからです。  エネルギーをあまり使わないで高いスピードを維持するのがディスタンスにとって最も大切なスキルですから、酸素消費量の大きな筋肉が集中している下肢は軽めに動かしてください。「軽め」というのは、強いキックを打ち続けるのではなく、「アクセントを強めにつけてメリハリをつける」という意味です。シックスキックが最も効率がいいことはスプリントと同じですが、アクセントだけを取り出したツーキックを選択することもいいでしょう。酸素消費量を抑えることができます。
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
