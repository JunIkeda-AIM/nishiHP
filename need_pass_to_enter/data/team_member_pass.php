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
            <li class="active"><a href="../data_pass.php">Data</a></li>
            <li><a href="../pictures_pass.php">Picturs</a></li>
            <li><a href="../training_pass.php">Training</a></li>
            <li><a href="../schedule_pass.php">Schedule</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#login0" data-toggle="modal" style="padding-right:50px;">管理者専用ページ</a></li>
          </ul>
        </div>
        <div style="border-top: dashed 1px rgb(85, 84, 85) ; margin-left: 15px; margin-right: 15px;">
          <p class="topicPath"><a href="../index_pass.php" style="color:black;">Home</a> &gt; <a href="../data_pass.php" style="color: black;">Data</a> &gt; <a href="team_member_pass.php">Team_member</a></p>
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
          <div class="containt1">
            <h3 class="subtitle">部員情報</h3>
            <p>
              このページでは、部員情報の新規登録と、情報の確認を行えます。<br />
              ↓選択してください↓
            </p>
          </div>
          <div class="containt2">
            <!-- カプセルメニュー -->
            <ul class="nav nav-pills">
              <li><a href="#new-data" data-toggle="tab" class="active">新規登録</a></li>
              <li><a href="#check-data" data-toggle="tab">情報確認</a></li>
              <li><a href="#rewrite-data" data-toggle="tab">情報更新</a></li>
            </ul>
            <!-- 内容 -->
            <div class="tab-content">
              <div class="tab-pane" id="new-data">
                <h4>部員情報の新規登録</h4>
                <p>
                  ここではデータベースに部員の情報を追加することができます。<br />
                  登録したデータを変更するのは大変なので、登録の際にはミスの無いよう慎重にお願いします。</br/>
                </p>
                <form class="" action="../database/insert_team_member.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">姓</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <input type="text" class="form-control" name="family_name" placeholder="正式な姓を入力してください">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">名</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <input type="text" class="form-control" name="first_name" placeholder="正式な名を入力してください">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">性別</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <div class="radio-inline">
                        <label>
                          <input type="radio" name="sex" value="男" checked="">男
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label>
                          <input type="radio" name="sex"  value="女">女
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">期</label>
                    <div class="sol-sm-10 form-inline" style="margin-bottom:10px;">
                      <select class="form-control" style="padding-left:20px;" name="class">
                        <?php $this_class = date(Y)-1946;
                        for ($i=-4; $i < 2; $i++) {
                          $class_i = $this_class + $i;
                          if ($i == 1) {
                            echo "<option value=".$class_i." selected=''>".$class_i."</option>";
                          } else {
                          echo "<option value=".$class_i.">".$class_i."</option>";
                          }
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">S1</label>
                    <div class="col-sm-10" style="marigin-bottom:10px;">
                      <div class="radio-inline">
                        <label>
                          <input type="radio" name="S1" value="Fr" checked="">Fr
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label>
                          <input type="radio" name="S1" value="Br">Br
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label>
                          <input type="radio" name="S1" value="Ba">Ba
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label>
                          <input type="radio" name="S1" value="Bu">Bu
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label>
                          <input type="radio" name="S1" value="IM">IM
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label>
                          <input type="radio" name="S1" value="nothing">新入生なので未定
                        </label>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="button" style="margin-bottom:10px;">登録</button>
                </form>
              </div>
              <div class="tab-pane" id="check-data">
                <h4>部員情報の確認</h4>
                <p>
                  ここでは登録された部員の情報を確認できます。
                </p>
                <h3 class="subtitle">名前による検索</h3>
                <p>
                  　
                </p>
                <form class="" action="../database/search_db_pass.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">名前</label>
                    <div class="col-sm-10" style="margin-top: 20px;">
                      <input type="text"  class="form-control" name="name" placeholder="部分一致可。半角全角を区別してください。">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-info" name="button" style="margin-bottom:10px;">検索</button>
                </form>
                <h3 class="subtitle">絞り込み検索</h3>
                <p>
                  すべて「選択しない」とすると全検索になります。
                </p>
                <form class="" action="../database/search_db_pass.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">期</label>
                    <div class="col-sm-10" style="margin-top: 20px;">
                      <select class="form-control" style="padding-left:20px;" name="class">
                        <option value=0 selected="">選択しない</option>
                        <?php $this_class = date(Y)-1946;
                        for ($i=67; $i < $this_class + 2; $i++) {
                          echo "<option value=".$i.">".$i."</option>";
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">性別</label>
                    <div class="col-sm-10" style="margin-top: 20px;">
                      <div class="radio-inline">
                        <label><input type="radio" name="sex" value="0" checked="">選択しない</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="sex" value="男">男</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="sex" value="女">女</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">S1</label>
                    <div class="col-sm-10" style="margin-top: 20px">
                      <div class="radio-inline">
                        <label><input type="radio" name="s1" value="0" checked="">選択しない</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="s1" value="Fr">Fr</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="s1" value="Br">Br</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="s1" value="Ba">Ba</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="s1" value="Bu">Bu</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="s1" value="IM">IM</label>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-info" name="button" style="margin-bottom:10px;">絞り込み検索</button>
                </form>
              </div>
              <div class="tab-pane" id="rewrite-data">
                <h4>部員情報の更新</h4>
                <h5>S1の変更</h5>
                <form class="" action="../database/rewrite_team_member.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">ID</label>
                    <div class="col-sm-10" style="margin-top:10px;">
                      <input type="number" class="form-control" name="id" placeholder="対象者のIDを入力してください。">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">変更後のS1</label>
                    <div class="col-sm-10" style="margin-top:10px;">
                      <div class="radio-inline">
                        <label><input type="radio" name="s1" value="Fr" checked="">Fr</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="s1" value="Br">Br</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="s1" value="Ba">Ba</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="s1" value="Bu">Bu</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="s1" value="IM">IM</label>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-info" name="button" style="">更新</button>
                </form>
              </div>
            </div>
            <!-- カプセルメニューここまで -->
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
