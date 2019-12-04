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
          <p class="topicPath"><a href="../index_pass.php" style="color:black;">Home</a> &gt; <a href="../data_pass.php" style="color: black;">Data</a> &gt; <a href="record_pass.php">Record</a></p>
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
              <li><a href="#write-relay-record" data-toggle="tab">レコードの登録（リレー）(準備中、まだ入力しないでね)</a></li>
            </ul>
            <!--　カプセル 内容 -->
            <div class="tab-content">
              <!-- レコード検索 -->
              <div class="tab-pane" id="check-record">
                <h4>タイムレコードの閲覧</h4>
                <p>
                  ここでは各部員のタイムレコードやランキングを閲覧できます。
                </p>
                <h3 class="subtitle">検索<small>　IDによる個別検索</small></h3>
                <form class="" action="../database/create_graph_pass.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">ID</label>
                    <div class="col-sm-10" style="margin-top: 10px;">
                      <input type="number" class="form-control" name="id" placeholder="半角数字で入力してください。">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Style</label>
                    <div class="col-sm-10" style="margin-top: 10px;">
                      <div class="radio-inline">
                        <label><input type="radio" name="style" value="Fr" checked="">Fr</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="style" value="Br">Br</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="style" value="Ba">Ba</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="style" value="Bu">Bu</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="style" value="IM">IM</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Length</label>
                    <div class="col-sm-10" style="margin-top:10px;">
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=50 checked="">50</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=100>100</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=200>200</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=400>400</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=800>800</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-info" name="button" style="margin-bottom:10px;">検索</button>
                    </div>
                  </div>
                </form>
                <h3 class="subtitle">泳法別総合順位</h3>
                <form class="" action="../database/search_timerecord_pass.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Sex</label>
                    <div class="col-sm-10" style="margin-top: 10px;">
                      <div class="radio-inline">
                        <label><input type="radio" name="sex" value="男" checked="">男</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="sex" value="女">女</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Style</label>
                    <div class="col-sm-10" style="margin-top: 10px;">
                      <div class="radio-inline">
                        <label>
                          <input type="radio" name="style" value="Fr" checked="">Fr
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label>
                          <input type="radio" name="style" value="Br">Br
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label>
                          <input type="radio" name="style" value="Ba">Ba
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label>
                          <input type="radio" name="style" value="Bu">Bu
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label>
                          <input type="radio" name="style" value="IM">IM
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Length</label>
                    <div class="col-sm-10" style="margin-top: 10px;">
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=50 checked="">50</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=100>100</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=200>200</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=400>400</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=800>800</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Class</label>
                    <div class="col-sm-10" style="margin-top: 10px;">
                      <select class="form-control" name="class" style="margin-bottom:10px;">
                        <option value=0 selected="">選択しない</option>
                        <?php $this_class = date(Y)-1946;
                        for ($i=-4; $i < 6; $i++) {
                          $class_i = $this_class + $i;
                          echo "<option value=".$class_i.">".$class_i."</option>";
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-info" name="button" style="margin-bottom:10px;">表示</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- レコード検索ここまで -->
              <!-- レコードの書き込み -->
              <div class="tab-pane" id="write-record">
                <h4>タイムレコードの登録</h4>
                <p>
                  ここでは各部員のタイムレコードを登録することができます。<br />
                  登録したデータを変更するのは大変なので、登録の際には慎重にお願いします。
                </p>
                <form class="form-horizon" action="../database/insert_time_record.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">ID</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <input type="number" name="id" placeholder="半角英数で入力してください。">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Style</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <div class="radio-inline">
                        <label><input type="radio" name="style" value="Fr" checked="">Fr</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="style" value="Br">Br</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="style" value="Ba">Ba</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="style" value="Bu">Bu</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="style" value="IM">IM</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Length</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=50 checked="">50</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=100>100</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=200>200</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=400>400</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=800>800</label>
                      </div>
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
                      <div class="col-sm-10" style="margin-bottom:5px">
                        <input type="number" class="form-control" name="scd" placeholder="半角英数字">
                      </div>
                      <label class="col-sm-2 control-label">ミリ秒</label>
                      <div class="col-sm-10" style="margin-bottom:5px;">
                        <input type="number" class="form-control" name="mscd" placeholder="上２桁を半角英数">
                      </div>
                    </div>
                  </div>
                  <label>日付</label>
                  <div class="date">
                    <label class="col-sm-2 control-label">年</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <select class="form-control input-sm" name="year">
                        <?php $this_year = date(Y); ?>
                        <?php $last_year = date(Y) - 1; ?>
                        <?php $next_year = date(Y) + 1; ?>
                        <option value=<?php echo $last_year; ?>><?php echo $last_year; ?></option>
                        <option value=<?php echo $this_year; ?> selected=""><?php echo $this_year; ?></option>
                        <option value=<?php echo $next_year; ?>><?php echo $next_year; ?></option>
                      </select>
                    </div>
                    <label class="col-sm-2 control-label">月</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <select class="form-control input-sm" name="month">
                        <?php $this_month = date(n);
                        for ($i=1; $i <13 ; $i++) {
                          if ($i != $this_month) {
                            echo "<option value=".$i.">".$i."</option>";
                          } else {
                            echo "<option value=".$i." selected=''>".$i."</option>";
                          }
                        }?>
                      </select>
                    </div>
                    <label class="col-sm-2 control-label">日</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <select class="form-control input-sm" name="day">
                        <?php $today = date(j);
                        for ($i=1; $i < 32; $i++) {
                          if ($i != $today) {
                            echo "<option value=".$i.">".$i."</option>";
                          } else {
                            echo "<option value=".$i." selected=''>".$i."</option>";
                          }
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group" style="margin-top:5px;">
                    <label class="col-sm-2 control-label">コメント</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <input type="text" name="comment" class="form-control" placeholder="必要であればコメントを入力してください。">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="button" style="margin-bottom:10px;">登録</button>
                </form>
              </div>
              <!-- レコードの書き込みここまで-->
              <!-- リレーのレコードの書き込み -->
              <div class="tab-pane" id="write-relay-record">
                <h4>タイムレコードの登録（リレー）</h4>
                <p>ここではリレーのタイムレコードを登録することができます。</p>
                <form class="form-horizon" action="#check-info" data-toggle="modal" method="post">
                  <h4 class="subtitle">共通項目</h4>
                  <div class="form-group" style="margin-bottom:10px;">
                    <label class="col-sm-2 control-label">情報</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <input type="text" class="form-control" name="tournament" placeholder="大会名等あれば入力してください。">
                    </div>
                  </div>
                  <label>日付</label>
                  <div class="date">
                    <label class="col-sm-2 control-label">年</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <select class="form-control input-sm" name="year">
                        <?php $this_year = date(Y); ?>
                        <?php $last_year = date(Y) - 1; ?>
                        <?php $next_year = date(Y) + 1; ?>
                        <option value=<?php echo $last_year; ?>><?php echo $last_year; ?></option>
                        <option value=<?php echo $this_year; ?> selected=""><?php echo $this_year; ?></option>
                        <option value=<?php echo $next_year; ?>><?php echo $next_year; ?></option>
                      </select>
                    </div>
                    <label class="col-sm-2 control-label">月</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <select class="form-control input-sm" name="month">
                        <?php $this_month = date(n);
                        for ($i=1; $i <13 ; $i++) {
                          if ($i != $this_month) {
                            echo "<option value=".$i.">".$i."</option>";
                          } else {
                            echo "<option value=".$i." selected=''>".$i."</option>";
                          }
                        }?>
                      </select>
                    </div>
                    <label class="col-sm-2 control-label">日</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <select class="form-control input-sm" name="day">
                        <?php $today = date(j);
                        for ($i=1; $i < 32; $i++) {
                          if ($i != $today) {
                            echo "<option value=".$i.">".$i."</option>";
                          } else {
                            echo "<option value=".$i." selected=''>".$i."</option>";
                          }
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Style</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <div class="radio-inline">
                        <label><input type="radio" name="style" value="free" checked="">Free-relay</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="style" value="medley">Medley-relay</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Length</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=50 checked="">200</label>
                      </div>
                      <div class="radio-inline">
                        <label><input type="radio" name="length" value=100>400</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <h4 class="subtitle">第一泳者</h4>
                    <label class="col-sm-2 control-label">ID</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <label><input type="number" class="form-control" name="id_1" placeholder="第一泳者のID"></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>レコード</label>
                    <p>累計のタイムを入力してください。</p>
                    <div class="record">
                      <label class="col-sm-2 control-label">分</label>
                      <div class="col-sm-10" style="margin-bottom:5px;">
                        <input type="number" class="form-control" name="min_1" placeholder="半角英数字">
                      </div>
                      <label class="col-sm-2 control-label">秒</label>
                      <div class="col-sm-10" style="margin-bottom:5px;">
                        <input type="number" class="form-control" name="scd_1" placeholder="半角英数字">
                      </div>
                      <label class="col-sm-2 control-label">ミリ秒</label>
                      <div class="col-sm-10" style="margin-bottom:5px;">
                        <input type="number" class="form-control" name="mscd_1" placeholder="上２桁を半角英数字">
                      </div>
                    </div>
                  </div>
                  <h4 class="subtitle">第二泳者</h4>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">ID</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <label><input type="number" name="id_2" class="form-control" placeholder="第二泳者のID"></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>レコード</label>
                    <p>累計のタイムを入力してください。</p>
                    <div class="record">
                      <label class="col-sm-2 control-label">分</label>
                      <div class="col-sm-10" style="margin-bottom:5px;">
                        <input type="number" class="form-control" name="min_2" placeholder="半角英数字">
                      </div>
                      <label class="col-sm-2 control-label">秒</label>
                      <div class="col-sm-10" style="margin-bottom:5px;">
                        <input type="number" class="form-control" name="scd_2" placeholder="半角英数字">
                      </div>
                      <label class="col-sm-2 control-label">ミリ秒</label>
                      <div class="col-sm-10" style="margin-bottom:5px;">
                        <input type="number" class="form-control" name="mscd_2" placeholder="上２桁を半角英数字">
                      </div>
                    </div>
                  </div>
                  <h4 class="subtitle">第三泳者</h4>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">ID</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <label><input type="number" name="id_3" class="form-control" placeholder="第三泳者のID"></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>レコード</label>
                    <p>累計のタイムを入力してください。</p>
                    <div class="record">
                      <label class="col-sm-2 control-label">分</label>
                      <div class="col-sm-10" style="margin-bottom:5px;">
                        <input type="number" class="form-control" name="min_3" placeholder="半角英数字">
                      </div>
                      <label class="col-sm-2 control-label">秒</label>
                      <div class="col-sm-10" style="margin-bottom:5px;">
                        <input type="number" class="form-control" name="scd_3" placeholder="半角英数字">
                      </div>
                      <label class="col-sm-2 control-label">ミリ秒</label>
                      <div class="col-sm-10" style="margin-bottom:5px;">
                        <input type="number" class="form-control" name="mscd_3" placeholder="上２桁を半角英数字">
                      </div>
                    </div>
                  </div>
                  <h4 class="subtitle">第四泳者</h4>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">ID</label>
                    <div class="col-sm-10" style="margin-bottom:10px;">
                      <label><input type="number" name="id_4" class="form-control" placeholder="第四泳者のID"></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>レコード</label>
                    <p>累計のタイムを入力してください。</p>
                    <div class="record">
                      <label class="col-sm-2 control-label">分</label>
                      <div class="col-sm-10" style="margin-bottom:5px;">
                        <input type="number" class="form-control" name="min_4" placeholder="半角英数字">
                      </div>
                      <label class="col-sm-2 control-label">秒</label>
                      <div class="col-sm-10" style="margin-bottom:5px;">
                        <input type="number" class="form-control" name="scd_4" placeholder="半角英数字">
                      </div>
                      <label class="col-sm-2 control-label">ミリ秒</label>
                      <div class="col-sm-10" style="margin-bottom:5px;">
                        <input type="number" class="form-control" name="mscd_4" placeholder="上２桁を半角英数字">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-info" name="button" style="margin-top:10px;">登録</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- カプセル 内容　ここまで -->
          </div>
        </div>
        <!-- 内容確認モーダル -->
        <div class="modal fade" id="check-info" tabindex="-1" role="dialog">
          <div class="modal-dialog" style="z-index: 1500">
            <div class="modal-content">
              <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">入力内用を確認してください。</h4>
              </div>
              <div class="modal-body">
                <?php
                $id_1 = $_POST['id_1'];
                echo $id_1;
                 ?>
              </div>
              <div class="modal-footer">
              </div>
            </div>
          </div>
        </div>
        <!-- 内容確認モーダルここまで -->
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
