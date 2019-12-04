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
          <p class="topicPath"><a href="../index_pass.php" style="color: black;">Home</a> &gt; <a href="../data_pass.php" style="color:black;">Data</a> &gt; <a href="inoran_pass.php">Inoran</a></p>
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
            <h3 class="subtitle">レコード</h3>
            <p>
              このページでは各種タイムの登録、確認をすることができます。<br />
              ↓選択してください↓
            </p>
          </div>
          <div class="containt2">
            <!-- カプセルメニュー -->
            <ul class="nav nav-pills">
              <li><a href="#check-record" data-toggle="tab" class="active">レコードの閲覧</a></li>
              <li><a href="#write-record" data-toggle="tab">レコードの登録</a></li>
            </ul>
            <!--　カプセル 内容 -->
            <div class="tab-content">
              <!-- タイムレコードの検索 -->
              <div class="tab-pane" id="check-record">
                <h4>タイムレコードの閲覧</h4>
                <p>
                  ここでは各部員のタイムレコードやランキングを閲覧できます。
                </p>
                <h3 class="subtitle">検索<small>  IDによる個別検索</small></h3>
                <form class="form-horizontal" action="../database/create_graph2_pass.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">ID</label>
                    <div class="col-sm-10" style="margin-top:10px;">
                      <input type="number" class="form-control" name="id" placeholder="半角英数字で入力してください">
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="button" style="margin-bottom:10px;">検索</button>
                  </div>
                </form>
              </div>
              <!-- レコードの検索ここまで -->
              <!-- タイムレコードの登録 -->
              <div class="tab-pane" id="write-record">
                <h4>タイムレコードの登録</h4>
                <p>
                  ここでは各部員のタイムレコードを登録することができます。<br />
                  登楼したデータを変更するのは大変なので、登録の歳には慎重にお願いします。
                </p>
                <form class="" action="../database/insert_inorun_record.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">ID</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <input type="number" class="form-control" name="id" placeholder="半角英数字で入力してください。">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>日付</label>
                    <div class="date">
                      <label class="col-sm-2 control-label">年</label>
                      <div class="col-sm-10" style="margin-bottom:10px;">
                        <select class="form-control" name="year">
                          <?php
                          $this_year = date('Y');
                          $last_year = $this_year - 1;
                          $next_year = $this_year + 1;
                          echo "<option value='".$last_year."'>".$last_year."</option>";
                          echo "<option value='".$this_year."' selected=''>".$this_year."</option>";
                          echo "<option value='".$next_year."'>".$next_year."</option>";
                           ?>
                        </select>
                      </div>
                      <label class="col-sm-2 control-label">月</label>
                      <div class="col-sm-10" style="margin-bottom:10px;">
                        <select class="form-control" name="month">
                          <?php
                          $this_month = date('n');
                          for ($i=1; $i < 13; $i++) {
                            if ($i == $this_month) {
                              echo "<option value='".$i."' selected=''>".$i." </option>";
                            } else {
                              echo "<option value='".$i."'>".$i."</option>";
                            }
                          } ?>
                        </select>
                      </div>
                    </div>
                    <label class="col-sm-2 control-label">日</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <select class="form-control" name="day">
                        <?php
                        $today = date('j');
                        for ($i=1; $i < 32; $i++) {
                          if ($i == $today) {
                            echo "<option value='".$i."' selected=''>".$i."</option>";
                          } else {
                            echo "<option value='".$i."'>".$i."</option>";
                          }
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>レコード</label>
                    <div class="record">
                      <label class="col-sm-2 control-label">分</label>
                      <div class="col-sm-10" style="margin-bottom:5px;">
                        <input type="number" class="form-control" name="min" placeholder="半角英数字">
                      </div>
                      <label class="col-sm-2 control-label">秒</label>
                      <div class="col-sm-10" style="margin-bottom:5px;">
                        <input type="number" class="form-control" name="scd" placeholder="半角英数字">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="button" style="margin-bottom:10px;">登録</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- タイムレコードの登録ここまで -->
            <!-- カプセル 内容　ここまで -->
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
