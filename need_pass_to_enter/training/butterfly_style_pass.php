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
          <p class="topicPath"><a href="../index_pass.html" style="color: black;">Home</a> &gt; <a href="../training_pass.php">Training</a> &gt; <a href="butterfly_style_pass.php">Butterfly</a></p>
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
              バタフライは力任せに泳ごうとしても進まないです。体力を消費するばかり。(腕の力だけで上半身が水上に出ているわけではないからです。)しかも、リカバリーは豪快に見えるけど実際にはそこでスイマーはリラックスしています。バタフライには力が極大になる点があり、それによって部分が全体と連動するようなリズムがあります。<br />クロールに続いて2番目に速く泳げる泳法であり、初心者が敬遠するため競技人口が少ないです。ゆえにコツさえ掴めばすぐに速くなり、相対的地位が向上し、大会で点が取れる種目です。<br />
              <br />

              (クロールやバックのように軸旋回やクイックターンがなく、左右対称なので軸がぶれる要因がなく、ブレストのようなトリッキーさがないので、実は身体の動かし方が分かっていて、リズム感がある人なら、むしろ水泳初心者に向いているのではないだろうか。もちろんいきなりやるのは難しいけども。)
            </p>
            <h3 class="subtitle">うねり</h3>
            <p>
              大きくうねれば、それだけ抵抗になる。上下運動が増えれば進行方向に対して抵抗が増えるからだ。よって、うねりは少なければ少ないほどいい。ところで、うねらないと体重移動ができない。左右対称の泳法だから、クロールのようにローリング旋回するわけにもいかないので、呼吸もできない。だから、うねるしかない。では、どの程度うねらざるをえないのか。それは自分の身体のバランスと距離に応じて変わる。まずはうねり方を覚えて、無駄な部分をその後で削っていくとよいだろう。では、そもそもうねりとはどういう動きなのか。<br />
              <br />
              膝から下を軽く持ち上げる→振り下ろして叩く→同時に腰を浮かせる→戻す→膝から下を軽く持ち上げる<br />
              <br />
              というこの周期がうねりの基本である。<br />
              <br />
              力が最後に伝わる部位はつま先である。力が発生するのが腹筋で、腰から膝を経由して最後につま先に力が到達するのだ。<br />
              <br />
              (膝から力が発生して、腰を経由して腹筋に最後に力が到達している人がいるが、これはまったく逆である。)<br />
            </p>
            <h3 class="subtitle">キック</h3>
            <p>
              バタフライのキックは単なる脚の上下運動ではない。むしろ、蹴りおろすときに腰を水面に上げる運動と思っておいた方がいい。なぜなら、その方が腰から下の力を抜けるからだ。腰から下はムチのように、腰が生み出すエネルギーに従って、しなる。ダウンキックの最後につま先が蹴り下ろしているとき(このとき腰の位置一番高くなる)に、膝の裏がもうアップキックを始めているような、ムチのようなキックを打とう。<br />
            </p>
            <h3 class="subtitle">プル</h3>
            <p>
              クロールのプルと決定的に異なるのは、フィニッシュで最後まで水を押し切るのではなく途中で腕を小指から横に抜くことだ。最後まで押し切るとリカバリーで腕の位置が高くなってしまう。女性はI字プルが多く、男性にはS字プルが多い。(とはいえ、どちらも入水直後に比べてキャッチの段階で腕が少し外側に膨らむことには変わりない。よってS字かI字かはあまり問題ではない。)腰のあたりまで腕が来てからが重要で、ここで腕を外側に抜くのである。よって、手のひらは小指から抜くことになる。横から見ると楕円軌道になるように腕を動かすこと。キャッチのときはできるだけ肘を水面近く、つまり高い位置に保つようにしよう。手のひらで捉えた水を前腕で<丸め込む>ようなイメージ。<br />
              <br />
              (リカバリーのときに"腕全体を大きく回す"と言うと、腕を身体のうしろから回すというイメージを持つ人がいるが、そんなことは、肩甲骨がロックするので人体には不可能である。上体が水上に出ているのだから、腕は真横に回せばよいのである。)
            </p>
            <h3 class="subtitle">タイミング</h3>
            <p>
              リラックスしながらリカバリーしてなるべく遠くの肩の延長線上に静かに入れよう。手のひらを下に向けて親指から入水。肩甲骨自体を旋回させるのだ。このときファーストキックが同期する。(うまくなってきたら、エントリーのときに前腕で水を抑えて、身体が沈もうとする運動を、前に進もうとする運動にズラそう。手より速く頭を戻してしまうと、頭が沈もうとする運動を殺せずに、うねりが大きくなり過ぎてしまうのだ。だから、手を戻すタイミングと頭を戻すタイミングは同時が理想的である。)<br />
              <br />
              キャッチのときは肘をたてること。キャッチからフィニッシュにかけてと、セカンドキックが同期する。そしてセカンドキックのタイミングで、一気に息を吐いて、水面に飛び出し、呼吸する。後半で息を一気に吐くのは、反動を利用してたくさん吸うためであり、肺に浮力を貯めておくためである。
            </p>
            <h3 class="subtitle">特に注意すべき10箇条</h3>
            <label>チェックしながら、さぁ泳いでみよう！</label>
            <p>
              ①膝からじゃなくて腹筋からドルフィンキックを打っているか。<br />
              <br />
              ②ファーストキックでもセカンドキックでも腰が水上に少し出ているか。(速さ重視のときは、特にセカンドキックのときに腰を水上にあげることを意識していることが重要。これ難しい！)<br />
              <br />
              ③速く泳ぎたいときに、ファーストキックで身体が沈み過ぎないように前腕で抵抗を作って身体が前のめりになり過ぎるのを抑えているか<br />
              <br />
              ④アップキックの最後、つま先が振り上がる瞬間に太ももがダウンキックを打ち始めているか。ダウンキックの最後、つま先が振り切られる瞬間に太ももがアップキックを打ち始めているか。(キック中には足の親指がくっつくように。)<br />
              <br />
              ⑤リカバリー中に肘が曲がっていないか。<br />
              <br />
              ⑥ストレートプルなら軌道が身体の体側線に沿ったプルになっているかどうか。(少しだけ外側に起動が膨らむのは問題ない。)<br />
              <br />
              ⑦フィニッシュは小指から出して横から前へ回す。最後まで押し切るとリカバリーの腕が高くなってしまうのでその必要はない。途中で抜いてよい。肩は肩甲骨から大きく楕円形に回すこと。<br />
              <br />
              ⑧キャッチからフィニッシュの動作とセカンドキックが最大強度になるタイミングを同期させる。<br />
              <br />
              ⑨呼吸のとき、目は上目遣い。顎を引いて頭の動きを減らすこと。(速く泳ぎたいときは、頭を水面近くに維持できるようになること。つまりファーストキックで沈み過ぎない。息継ぎの直前で一気に肺の空気を押し出す。)<br />
              <br />
              ⑩ターンは上から下へは短距離とき。下から上へは長距離で。ラストスパートをするなら下から上へターンした方が効率がいい。回転する方の手を下にして両手タッチ。<br />
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
