<?php
$gobackURL = "../data/record_pass.php";

$dsn = 'mysql:dbname=nishi_swimming_club;charset=utf8;host=localhost';
$user = 'nishi';
$password = 'Onepiece2015';
?>



<?php
$flag = $_POST['flag'];
if ($flag === True) {
  try {
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  } catch (PDOException $e) {
    echo 'データベース接続失敗。';
    exit();
  }

  $day = $_POST["day"];
  $menu = $_POST["menu"];
  $style = $_POST["style"];
  $course = $_POST["course"];
  $length = $_POST["length"];
  $number = $_POST["number"];
  $set_number = $_POST["set_number"];
  $circle = $_POST["circle"];
  $set_interval = $_POST["set_interval"];
  $rest = $_POST["rest"];
  $comment = $_POST["comment"];
  $time = $_POST["time"];
  $creater = $_POST["creater"];

  try {
    $sql = "INSERT INTO menu VALUES(:day, :menu, :style, :course, :length, :number, :set_number, :set_number, :circle, :set_interval, :rest, :comment, :time, :creater)";
    $stm -> bindValue(':day', $day, PDO::PARAM_STR);
    $stm = $pdo->prepare($sql);
    $stm -> bindValue(':menu', $menu, PDO::PARAM_STR);
    $stm -> bindValue(':style', $style, PDO::PARAM_STR);
    $stm -> bindValue(':course', $course, PDO::PARAM_STR);
    $stm -> bindValue(':length', $length, PDO::PARAM_INT);
    $stm -> bindValue(':number', $number, PDO::PARAM_INT);
    $stm -> bindValue(':set_number', $set_number, PDO::PARAM_INT);
    $stm -> bindValue(':circle', $circle, PDO::PARAM_INT);
    $stm -> bindValue(':set_interval', $set_interval, PDO::PARAM_INT);
    $stm -> bindValue(':rest', $rest, PDO::PARAM_INT);
    $stm -> bindValue(':comment', $comment, PDO::PARAM_STR);
    $stm -> bindValue(':time', $time, PDO::PARAM_INT);
    $stm -> bindValue(':creater', $creater, PDO::PARAM_STR);
    $stm -> execute();
    $pdo=null;
  } catch (PDOException $e) {
    echo '<h3>データ送信失敗。</h3>';
    exit();
  }
}
?>


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
            <li><a href="../training_pass.php">Training</a></li>
            <li class="active"><a href="../schedule_pass.php">Schedule</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#login0" data-toggle="modal" style="padding-right:50px;">管理者専用ページ</a></li>
          </ul>
        </div>
        <div style="border-top: dashed 1px rgb(85, 84, 85) ; margin-left: 15px; margin-right: 15px;">
          <p class="topicPath"><a href="../index_pass.php">Home</a> &gt; <a href="../schedule_pass.php" style="color: black;">Schedule</a> &gt; <a href="insert_menu_pass">Upload menu</a></p>
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
    <div class="container">
      <?php $the_day = $_GET['day']; ?>
      <?php $the_creater = $_GET['creater']; ?>

      <h4 class="subtitle">PDFファイルのアップロード</h4>
      <form style="margin-bottom:10px;" action="upload_pdf_menu.php" enctype="multipart/form-data" method="post">
        <?php echo "<input type='hidden' name='day' value='".$day."' />"; ?>
        <input type="file" name="upfile[]" multiple>
        <input type="submit" value="アップロード" style="margin-top:5px;">
      </form>

      <h4 class="subtitle">メニューの選択肢の追加と削除</h4>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target='#addition'>各項目に選択肢を追加する</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target='#delete'>各項目の選択肢を削除する(準備中)</button>
        <!-- モーダル -->
        <div class="modal fade" id="addition" tabindex="-1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                <h4 class="modal-title">各項目の選択肢の追加</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizon" action="../database/insert_option.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">追加する項目</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="item">
                        <option value="menu">メニュー</option>
                        <option value="style">style</option>
                        <option value="course">コース</option>
                        <option value="length">距離</option>
                        <option value="number">本数</option>
                        <option value="set_number">セット数</option>
                        <option value="set_interval">セット間</option>
                        <option value="rest">レスト</option>
                        <option value="creater">作成者</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">追加する選択肢</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="追加する選択肢を入力してください" name="option">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="change" value=1>
                  </div>
                  <div class="form-group">
                    <div>
                      <button type="submit" class="btn btn-primary" style="margin-top:10px; margin-left:10px;">追加</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">閉じる</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="addition" tabindex="-1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                <h4 class="modal-title">各項目の選択肢の削除(準備中)</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizon" action="../database/insert_option.php" method="post">
                  <div class="form-group">
  <!--                  <label class="col-sm-2 control-label">削除する項目</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="item">
                        <option value="menu">メニュー</option>
                        <option value="style">style</option>
                        <option value="course">コース</option>
                        <option value="length">距離</option>
                        <option value="number">本数</option>
                        <option value="set_number">セット数</option>
                        <option value="circle">サークル</option>
                        <option value="set_interval">セット間</option>
                        <option value="rest">レスト</option>
                        <option value="creater">作成者</option>
                      </select>
                    </div>
                  </div>
                -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">削除する選択肢</label>
                    <div class="col-sm-10">

                    </div>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="change" value=1>
                  </div>
                  <div class="form-group">
                    <div>
                      <button type="submit" class="btn btn-primary" style="margin-top:10px; margin-left:10px;">追加</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">閉じる</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <h3 class="subtitle">メニューの登録</h3>
      <form id="insert_menu" name="insert_menu" class="fomr-horizontal" action="../database/insert_menu.php" method="post">
        <div class="form-group">
          <label class="col-sm-2 control-label">日付</label>
          <div class="col-sm-10">
            <select class="form-control" name="day">
              <?php
              for ($i=0; $i < 14; $i++) {
                $n = '+'.$i.' day';
                $day = date('Y-m-d', strtotime($n));
                if ($day == $the_day) {
                  echo "<option value=".$day." selected=''>".$day."</option>";
                } else {
                  echo "<option value=".$day.">".$day."</option>";
                }
              }
               ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">作成者</label>
          <div class="col-sm-10">
            <select class="form-control" name="creater">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try {
                $sql = "SELECT creater FROM creater";
                $stm0 = $pdo->prepare($sql);
                $stm0 -> execute();
                $pdo=null;
              } catch (PDOException $e) {
                echo '<h3>データ送信失敗。</h3>';
                exit();
              }
              foreach ($stm0 as $row) {
                $creater_0 = $row['creater'];
                if ($creater_0 == $the_creater) {
                  echo "<option value='".$creater_0."' selected=''>".$creater_0."</option>";
                } else {
                  echo "<option value='".$creater_0."'>".$creater_0."</option>";
                }
              }
               ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2">メニューの意図</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="aim" placeholder="">
          </div>
        </div>
        <h4 class="subtitle">全コースに反映</h4>
        <div class="form-group" style="margin-top:10px;">
          <label class="col-sm-2 control-label">menu</label>
          <div class="col-sm-10">
            <select id="input_menu" class="form-control" name="menu">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try {
                $sql = "SELECT menu FROM each_menu order by menu";
                $stm1 = $pdo->prepare($sql);
                $stm1 -> execute();
                $pdo=null;
              } catch (PDOException $e) {
                echo '<h3>データ送信失敗。</h3>';
                exit();
              }
              foreach ($stm1 as $row) {
                echo "<option value='".$row['menu']."'>".$row['menu']."</option>";
              }
               ?>
            </select>
          </div>
        </div>
        <div class="form-group" style="margin-top:10px;">
          <label class="col-sm-2 control-label">Style</label>
          <div class="col-sm-10" style="margin-top:10px;">
            <select id="input_style" class="form-control" name="style">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try {
                $sql = "SELECT style FROM style";
                $stm2 = $pdo->prepare($sql);
                $stm2 -> execute();
                $pdo=null;
              } catch (PDOException $e) {
                echo '<h3>データ送信失敗。</h3>';
                exit();
              }
              foreach ($stm2 as $row) {
                echo "<option value='".$row['style']."'>".$row['style']."</option>";
              }
               ?>
            </select>
          </div>
        </div>
        <div class="form-group" style="margin-top:10px;">
          <label class="col-sm-2 control-label">距離</label>
          <div class="col-sm-10">
            <select id="input_length" class="form-control" name="length">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try {
                $sql = "SELECT length FROM length order by length";
                $stm9 = $pdo->prepare($sql);
                $stm9 -> execute();
                $pdo=null;
              } catch (PDOException $e) {
                echo '<h3>データ送信失敗。</h3>';
                exit();
              }
              foreach ($stm9 as $row) {
                echo "<option value=".$row['length'].">".$row['length']."</option>";
              }
               ?>
            </select>
          </div>
        </div>
        <div class="form-group" style="margin-top:10px;">
          <label class="col-sm-2 control-label">本数</label>
          <div class="col-sm-10">
            <select id="input_number" class="form-control" name="number_1">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try {
                $sql = "SELECT number FROM number order by number";
                $stm3 = $pdo->prepare($sql);
                $stm3 -> execute();
                $pdo=null;
              } catch (PDOException $e) {
                echo '<h3>データ送信失敗。</h3>';
                exit();
              }
              foreach ($stm3 as $row) {
                echo "<option value=".$row['number'].">".$row['number']."</option>";
              }
               ?>
            </select>
          </div>
        </div>
        <div class="form-group" style="margin-top:10px;">
          <label class="col-sm-2 control-label">セット数</label>
          <div class="col-sm-10">
            <select id="input_set_number" class="form-control" name="set_number_1">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try {
                $sql = "SELECT set_number FROM set_number order by set_number";
                $stm4 = $pdo->prepare($sql);
                $stm4 -> execute();
                $pdo=null;
              } catch (PDOException $e) {
                echo '<h3>データ送信失敗。</h3>';
                exit();
              }
              foreach ($stm4 as $row) {
                echo "<option value=".$row['set_number'].">".$row['set_number']."</option>";
              }
               ?>
            </select>
          </div>
        </div>
        <label>サークル</label>
        <div class="form-group" style="margin-top:10px; margin-bottom:2px;">
          <label class="col-sm-2">分</label>
          <div class="col-sm-4">
            <input id="input_circle_min" type="number" class="form-control" name="circle_min_1" placeholder="半角数字">
          </div>
          <label class="col-sm-2">秒</label>
          <div class="col-sm-4">
            <input id="input_circle_sec" type="number" class="form-control" name="circle_sec_1" placeholder="半角数字">
          </div>
        </div>
        <div class="form-group" style="margin-top:10px;">
          <label class="col-sm-2 control-label">セット間</label>
          <div class="col-sm-10">
            <select id="input_set_interval" class="form-control" name="set_interval_1">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try {
                $sql = "SELECT set_interval FROM set_interval order by set_interval";
                $stm6 = $pdo->prepare($sql);
                $stm6 -> execute();
                $pdo=null;
              } catch (PDOException $e) {
                echo '<h3>データ送信失敗。</h3>';
                exit();
              }
              foreach ($stm6 as $row) {
                echo '<option value="'.$row['set_interval'].'">'.$row['set_interval'].'</option>';
              }
               ?>
            </select>
          </div>
        </div>
        <div class="form-group" style="margin-top:10px;">
          <label class="col-sm-2 control-label">レスト</label>
          <div class="col-sm-10">
            <select id="input_rest" class="form-control" name="rest_1">
              <?php
              try {
                $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              } catch (PDOException $e) {
                echo 'データベース接続失敗。';
                exit();
              }
              try {
                $sql = "SELECT rest FROM rest order by rest";
                $stm7 = $pdo->prepare($sql);
                $stm7 -> execute();
                $pdo=null;
              } catch (PDOException $e) {
                echo '<h3>データ送信失敗。</h3>';
                exit();
              }
              foreach ($stm7 as $row) {
                echo '<option value="'.$row['rest'].'">'.$row['rest'].'</option>';
              }
               ?>
            </select>
          </div>
        </div>
        <div class="form-group" style="margin-top:10px;">
          <label class="col-sm-2 control-label">備考</label>
          <div class="col-sm-10">
            <textarea id="input_comment" name="comment_1" class="form-control" rows="4" cols="80"></textarea>
          </div>
        </div>

        <script type="text/javascript">
            $(function () {
                $("#input_comment").on("keyup change", function () {
                    $("#comment_1,#comment_2,#comment_3,#comment_4,#comment_5,#comment_6,#comment_7,#comment_8").val($(this).val());
                });
            });
            $(function () {
                $("#input_circle_min").on("keyup change", function () {
                    $("#circle_min_1,#circle_min_2,#circle_min_3,#circle_min_4,#circle_min_5,#circle_min_6,#circle_min_7,#circle_min_8").val($(this).val());
                });
            });
            $(function () {
                $("#input_circle_sec").on("keyup change", function () {
                    $("#circle_sec_1,#circle_sec_2,#circle_sec_3,#circle_sec_4,#circle_sec_5,#circle_sec_6,#circle_sec_7,#circle_sec_8").val($(this).val());
                });
            });
            $(function () {
                $("#input_number").on("keyup change", function () {
                    $("#number_1,#number_2,#number_3,#number_4,#number_5,#number_6,#number_7,#number_8").val($(this).val());
                });
            });
            $(function () {
                $("#input_set_number").on("keyup change", function () {
                    $("#set_number_1,#set_number_2,#set_number_3,#set_number_4,#set_number_5,#set_number_6,#set_number_7,#set_number_8").val($(this).val());
                });
            });
            $(function () {
                $("#input_set_interval").on("keyup change", function () {
                    $("#set_interval_1,#set_interval_2,#set_interval_3,#set_interval_4,#set_interval_5,#set_interval_6,#set_interval_7,#set_interval_8").val($(this).val());
                });
            });
            $(function () {
                $("#input_rest").on("keyup change", function () {
                    $("#rest_1,#rest_2,#rest_3,#rest_4,#rest_5,#rest_6,#rest_7,#rest_8").val($(this).val());
                });
            });
            $(function () {
                $("#input_menu").on("keyup change", function () {
                    $("#menu_1,#menu_2,#menu_3,#menu_4,#menu_5,#menu_6,#menu_7,#menu_8").val($(this).val());
                });
            });
            $(function () {
                $("#input_style").on("keyup change", function () {
                    $("#style_1,#style_2,#style_3,#style_4,#style_5,#style_6,#style_7,#style_8").val($(this).val());
                });
            });
            $(function () {
                $("#input_length").on("keyup change", function () {
                    $("#length_1,#length_2,#length_3,#length_4,#length_5,#length_6,#length_7,#length_8").val($(this).val());
                });
            });
        </script>

        <h4 class="subtitle">コース毎に変更</h4>
        <ul class="nav nav-pills">
          <li><a href="#hide_menu" data-toggle="tab">非表示</a></li>
          <li><a href="#menu_1" data-toggle="tab">1コース</a></li>
          <li><a href="#menu_2" data-toggle="tab">2コース</a></li>
          <li><a href="#menu_3" data-toggle="tab">3コース</a></li>
          <li><a href="#menu_4" data-toggle="tab">4コース</a></li>
          <li><a href="#menu_5" data-toggle="tab">5コース</a></li>
          <li><a href="#menu_6" data-toggle="tab">6コース</a></li>
          <li><a href="#menu_7" data-toggle="tab">7コース</a></li>
          <li><a href="#menu_8" data-toggle="tab">8コース</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane" id="hide_menu">

          </div>
          <div class="tab-pane" id="menu_1">
            <h4 class="subtitle">１コース</h4>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">menu</label>
              <div class="col-sm-10">
                <select id="menu_1" class="form-control" name="menu_1">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT menu FROM each_menu order by menu";
                    $stm1 = $pdo->prepare($sql);
                    $stm1 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm1 as $row) {
                    echo "<option value='".$row['menu']."'>".$row['menu']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">Style</label>
              <div class="col-sm-10" style="margin-top:10px;">
                <select id="style_1" class="form-control" name="style_1">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT style FROM style";
                    $stm2 = $pdo->prepare($sql);
                    $stm2 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm2 as $row) {
                    echo "<option value='".$row['style']."'>".$row['style']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">距離</label>
              <div class="col-sm-10">
                <select id="length_1" class="form-control" name="length_1">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT length FROM length order by length";
                    $stm9 = $pdo->prepare($sql);
                    $stm9 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm9 as $row) {
                    echo "<option value=".$row['length'].">".$row['length']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">本数</label>
              <div class="col-sm-10">
                <select id="number_1" class="form-control" name="number_1">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT number FROM number order by number";
                    $stm3 = $pdo->prepare($sql);
                    $stm3 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm3 as $row) {
                    echo "<option value=".$row['number'].">".$row['number']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">セット数</label>
              <div class="col-sm-10">
                <select id="set_number_1" class="form-control" name="set_number_1">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT set_number FROM set_number order by set_number";
                    $stm4 = $pdo->prepare($sql);
                    $stm4 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm4 as $row) {
                    echo "<option value=".$row['set_number'].">".$row['set_number']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <label>サークル</label>
            <div class="form-group" style="margin-top:10px; margin-bottom:2px;">
              <label class="col-sm-2">分</label>
              <div class="col-sm-4">
                <input id="circle_min_1" type="number" class="form-control" name="circle_min_1" placeholder="半角数字">
              </div>
              <label class="col-sm-2">秒</label>
              <div class="col-sm-4">
                <input id="circle_sec_1" type="number" class="form-control" name="circle_sec_1" placeholder="半角数字">
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">セット間</label>
              <div class="col-sm-10">
                <select id="set_interval_1" class="form-control" name="set_interval_1">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT set_interval FROM set_interval order by set_interval";
                    $stm6 = $pdo->prepare($sql);
                    $stm6 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm6 as $row) {
                    echo '<option value="'.$row['set_interval'].'">'.$row['set_interval'].'</option>';
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">レスト</label>
              <div class="col-sm-10">
                <select id="rest_1" class="form-control" name="rest_1">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT rest FROM rest order by rest";
                    $stm7 = $pdo->prepare($sql);
                    $stm7 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm7 as $row) {
                    echo '<option value="'.$row['rest'].'">'.$row['rest'].'</option>';
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">備考</label>
              <div class="col-sm-10">
                <textarea id="comment_1" name="comment_1" class="form-control" rows="4" cols="80"></textarea>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="menu_2">
            <h4 class="subtitle">２コース</h4>
            <!--
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">他のコースと同じ</label>
              <div class="col-sm-10">
                <select class="form-control" name="same_course_7">
                    <option value=null>選択しない</option>
                  <?php for ($i=1; $i < 2; $i++) :?>
                    <option value=<?php echo $i; ?>><?php echo $i; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
            </div>
            -->
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">menu</label>
              <div class="col-sm-10">
                <select id="menu_2" class="form-control" name="menu_2">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT menu FROM each_menu order by menu";
                    $stm1 = $pdo->prepare($sql);
                    $stm1 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm1 as $row) {
                    echo "<option value='".$row['menu']."'>".$row['menu']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">Style</label>
              <div class="col-sm-10" style="margin-top:10px;">
                <select id="style_2" class="form-control" name="style_2">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT style FROM style";
                    $stm2 = $pdo->prepare($sql);
                    $stm2 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm2 as $row) {
                    echo "<option value='".$row['style']."'>".$row['style']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">距離</label>
              <div class="col-sm-10">
                <select id="length_2" class="form-control" name="length_2">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT length FROM length order by length";
                    $stm9 = $pdo->prepare($sql);
                    $stm9 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm9 as $row) {
                    echo "<option value=".$row['length'].">".$row['length']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">本数</label>
              <div class="col-sm-10">
                <select id="number_2" class="form-control" name="number_2">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT number FROM number order by number";
                    $stm3 = $pdo->prepare($sql);
                    $stm3 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm3 as $row) {
                    echo "<option value=".$row['number'].">".$row['number']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">セット数</label>
              <div class="col-sm-10">
                <select id="set_number_2" class="form-control" name="set_number_2">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT set_number FROM set_number order by set_number";
                    $stm4 = $pdo->prepare($sql);
                    $stm4 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm4 as $row) {
                    echo "<option value=".$row['set_number'].">".$row['set_number']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <label>サークル</label>
            <div class="form-group" style="margin-top:10px; margin-bottom:2px;">
              <label class="col-sm-2">分</label>
              <div class="col-sm-4">
                <input id="circle_min_2" type="number" class="form-control" name="circle_min_2" placeholder="半角数字">
              </div>
              <label class="col-sm-2">秒</label>
              <div class="col-sm-4">
                <input id="circle_sec_2" type="number" class="form-control" name="circle_sec_2" placeholder="半角数字">
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">セット間</label>
              <div class="col-sm-10">
                <select id="set_interval_2" class="form-control" name="set_interval_2">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT set_interval FROM set_interval order by set_interval";
                    $stm6 = $pdo->prepare($sql);
                    $stm6 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm6 as $row) {
                    echo '<option value="'.$row['set_interval'].'">'.$row['set_interval'].'</option>';
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">レスト</label>
              <div class="col-sm-10">
                <select id="rest_2" class="form-control" name="rest_2">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT rest FROM rest order by rest";
                    $stm7 = $pdo->prepare($sql);
                    $stm7 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm7 as $row) {
                    echo '<option value="'.$row['rest'].'">'.$row['rest'].'</option>';
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">備考</label>
              <div class="col-sm-10">
                <textarea id="comment_2" name="comment_2" class="form-control" rows="4" cols="80"></textarea>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="menu_3">
            <h4 class="subtitle">３コース</h4>
            <!--        <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">他のコースと同じ</label>
              <div class="col-sm-10">
                <select class="form-control" name="same_course_7">
                    <option value=null>選択しない</option>
                  <?php for ($i=1; $i < 3; $i++) :?>
                    <option value=<?php echo $i; ?>><?php echo $i; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
            </div>
            -->
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">menu</label>
              <div class="col-sm-10">
                <select id="menu_3" class="form-control" name="menu_3">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT menu FROM each_menu order by menu";
                    $stm1 = $pdo->prepare($sql);
                    $stm1 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm1 as $row) {
                    echo "<option value='".$row['menu']."'>".$row['menu']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">Style</label>
              <div class="col-sm-10" style="margin-top:10px;">
                <select id="style_3" class="form-control" name="style_3">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT style FROM style";
                    $stm2 = $pdo->prepare($sql);
                    $stm2 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm2 as $row) {
                    echo "<option value='".$row['style']."'>".$row['style']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">距離</label>
              <div class="col-sm-10">
                <select id="length_3" class="form-control" name="length_3">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT length FROM length order by length";
                    $stm9 = $pdo->prepare($sql);
                    $stm9 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm9 as $row) {
                    echo "<option value=".$row['length'].">".$row['length']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">本数</label>
              <div class="col-sm-10">
                <select id="number_3" class="form-control" name="number_3">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT number FROM number order by number";
                    $stm3 = $pdo->prepare($sql);
                    $stm3 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm3 as $row) {
                    echo "<option value=".$row['number'].">".$row['number']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">セット数</label>
              <div class="col-sm-10">
                <select id="set_number_3" class="form-control" name="set_number_3">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT set_number FROM set_number order by set_number";
                    $stm4 = $pdo->prepare($sql);
                    $stm4 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm4 as $row) {
                    echo "<option value=".$row['set_number'].">".$row['set_number']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <label>サークル</label>
            <div class="form-group" style="margin-top:10px; margin-bottom:2px;">
              <label class="col-sm-2">分</label>
              <div class="col-sm-4">
                <input id="circle_min_3" type="number" class="form-control" name="circle_min_3" placeholder="半角数字">
              </div>
              <label class="col-sm-2">秒</label>
              <div class="col-sm-4">
                <input id="circle_sec_3" type="number" class="form-control" name="circle_sec_3" placeholder="半角数字">
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">セット間</label>
              <div class="col-sm-10">
                <select id="set_interval_3" class="form-control" name="set_interval_3">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT set_interval FROM set_interval order by set_interval";
                    $stm6 = $pdo->prepare($sql);
                    $stm6 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm6 as $row) {
                    echo '<option value="'.$row['set_interval'].'">'.$row['set_interval'].'</option>';
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">レスト</label>
              <div class="col-sm-10">
                <select id="rest_3" class="form-control" name="rest_3">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT rest FROM rest order by rest";
                    $stm7 = $pdo->prepare($sql);
                    $stm7 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm7 as $row) {
                    echo '<option value="'.$row['rest'].'">'.$row['rest'].'</option>';
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">備考</label>
              <div class="col-sm-10">
                <textarea id="comment_3" name="comment_3" class="form-control" rows="4" cols="80"></textarea>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="menu_4">
            <h4 class="subtitle">４コース</h4>
            <!--        <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">他のコースと同じ</label>
              <div class="col-sm-10">
                <select class="form-control" name="same_course_7">
                    <option value=null>選択しない</option>
                  <?php for ($i=1; $i < 4; $i++) :?>
                    <option value=<?php echo $i; ?>><?php echo $i; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
            </div>
            -->
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">menu</label>
              <div class="col-sm-10">
                <select id="menu_4" class="form-control" name="menu_4">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT menu FROM each_menu order by menu";
                    $stm1 = $pdo->prepare($sql);
                    $stm1 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm1 as $row) {
                    echo "<option value='".$row['menu']."'>".$row['menu']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">Style</label>
              <div class="col-sm-10" style="margin-top:10px;">
                <select id="style_4" class="form-control" name="style_4">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT style FROM style";
                    $stm2 = $pdo->prepare($sql);
                    $stm2 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm2 as $row) {
                    echo "<option value='".$row['style']."'>".$row['style']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">距離</label>
              <div class="col-sm-10">
                <select id="length_4" class="form-control" name="length_4">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT length FROM length order by length";
                    $stm9 = $pdo->prepare($sql);
                    $stm9 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm9 as $row) {
                    echo "<option value=".$row['length'].">".$row['length']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">本数</label>
              <div class="col-sm-10">
                <select id="number_4" class="form-control" name="number_4">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT number FROM number order by number";
                    $stm3 = $pdo->prepare($sql);
                    $stm3 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm3 as $row) {
                    echo "<option value=".$row['number'].">".$row['number']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">セット数</label>
              <div class="col-sm-10">
                <select id="set_number_4" class="form-control" name="set_number_4">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT set_number FROM set_number order by set_number";
                    $stm4 = $pdo->prepare($sql);
                    $stm4 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm4 as $row) {
                    echo "<option value=".$row['set_number'].">".$row['set_number']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <label>サークル</label>
            <div class="form-group" style="margin-top:10px; margin-bottom:2px;">
              <label class="col-sm-2">分</label>
              <div class="col-sm-4">
                <input id="circle_min_4" type="number" class="form-control" name="circle_min_4" placeholder="半角数字">
              </div>
              <label class="col-sm-2">秒</label>
              <div class="col-sm-4">
                <input id="circle_sec_4" type="number" class="form-control" name="circle_sec_4" placeholder="半角数字">
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">セット間</label>
              <div class="col-sm-10">
                <select id="set_interval_4" class="form-control" name="set_interval_4">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT set_interval FROM set_interval order by set_interval";
                    $stm6 = $pdo->prepare($sql);
                    $stm6 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm6 as $row) {
                    echo '<option value="'.$row['set_interval'].'">'.$row['set_interval'].'</option>';
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">レスト</label>
              <div class="col-sm-10">
                <select id="rest_4" class="form-control" name="rest_4">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT rest FROM rest order by rest";
                    $stm7 = $pdo->prepare($sql);
                    $stm7 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm7 as $row) {
                    echo '<option value="'.$row['rest'].'">'.$row['rest'].'</option>';
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">備考</label>
              <div class="col-sm-10">
                <textarea id="comment_4" name="comment_4" class="form-control" rows="4" cols="80"></textarea>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="menu_5">
            <h4 class="subtitle">５コース</h4>
            <!--
            <div class="form-group" style="margin-top:10px;">
                        <label class="col-sm-2 control-label">他のコースと同じ</label>
              <div class="col-sm-10">
                <select class="form-control" name="same_course_7">
                    <option value=null>選択しない</option>
                  <?php for ($i=1; $i < 5; $i++) :?>
                    <option value=<?php echo $i; ?>><?php echo $i; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
            </div>
            -->
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">menu</label>
              <div class="col-sm-10">
                <select id="menu_5" class="form-control" name="menu_5">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT menu FROM each_menu order by menu";
                    $stm1 = $pdo->prepare($sql);
                    $stm1 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm1 as $row) {
                    echo "<option value='".$row['menu']."'>".$row['menu']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">Style</label>
              <div class="col-sm-10" style="margin-top:10px;">
                <select id="style_5" class="form-control" name="style_5">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT style FROM style";
                    $stm2 = $pdo->prepare($sql);
                    $stm2 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm2 as $row) {
                    echo "<option value='".$row['style']."'>".$row['style']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">距離</label>
              <div class="col-sm-10">
                <select id="length_5" class="form-control" name="length_5">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT length FROM length order by length";
                    $stm9 = $pdo->prepare($sql);
                    $stm9 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm9 as $row) {
                    echo "<option value=".$row['length'].">".$row['length']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">本数</label>
              <div class="col-sm-10">
                <select id="number_5" class="form-control" name="number_5">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT number FROM number order by number";
                    $stm3 = $pdo->prepare($sql);
                    $stm3 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm3 as $row) {
                    echo "<option value=".$row['number'].">".$row['number']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">セット数</label>
              <div class="col-sm-10">
                <select id="set_number_5" class="form-control" name="set_number_5">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT set_number FROM set_number order by set_number";
                    $stm4 = $pdo->prepare($sql);
                    $stm4 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm4 as $row) {
                    echo "<option value=".$row['set_number'].">".$row['set_number']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <label>サークル</label>
            <div class="form-group" style="margin-top:10px; margin-bottom:2px;">
              <label class="col-sm-2">分</label>
              <div class="col-sm-4">
                <input id="circle_min_5" type="number" class="form-control" name="circle_min_5" placeholder="半角数字">
              </div>
              <label class="col-sm-2">秒</label>
              <div class="col-sm-4">
                <input id="circle_sec_5" type="number" class="form-control" name="circle_sec_5" placeholder="半角数字">
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">セット間</label>
              <div class="col-sm-10">
                <select id=set_interval_5 class="form-control" name="set_interval_5">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT set_interval FROM set_interval order by set_interval";
                    $stm6 = $pdo->prepare($sql);
                    $stm6 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm6 as $row) {
                    echo '<option value="'.$row['set_interval'].'">'.$row['set_interval'].'</option>';
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">レスト</label>
              <div class="col-sm-10">
                <select id="rest_5" class="form-control" name="rest_5">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT rest FROM rest order by rest";
                    $stm7 = $pdo->prepare($sql);
                    $stm7 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm7 as $row) {
                    echo '<option value="'.$row['rest'].'">'.$row['rest'].'</option>';
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">備考</label>
              <div class="col-sm-10">
                <textarea id="comment_5" name="comment_5" class="form-control" rows="4" cols="80"></textarea>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="menu_6">
            <h4 class="subtitle">６コース</h4>
            <!--
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">他のコースと同じ</label>
              <div class="col-sm-10">
                <select class="form-control" name="same_course_7">
                    <option value=null>選択しない</option>
                  <?php for ($i=1; $i < 6; $i++) :?>
                    <option value=<?php echo $i; ?>><?php echo $i; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
            </div>
            -->
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">menu</label>
              <div class="col-sm-10">
                <select id="menu_6" class="form-control" name="menu_6">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT menu FROM each_menu order by menu";
                    $stm1 = $pdo->prepare($sql);
                    $stm1 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm1 as $row) {
                    echo "<option value='".$row['menu']."'>".$row['menu']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">Style</label>
              <div class="col-sm-10" style="margin-top:10px;">
                <select id="style_6" class="form-control" name="style_6">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT style FROM style";
                    $stm2 = $pdo->prepare($sql);
                    $stm2 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm2 as $row) {
                    echo "<option value='".$row['style']."'>".$row['style']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">距離</label>
              <div class="col-sm-10">
                <select id="length_6" class="form-control" name="length_6">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT length FROM length order by length";
                    $stm9 = $pdo->prepare($sql);
                    $stm9 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm9 as $row) {
                    echo "<option value=".$row['length'].">".$row['length']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">本数</label>
              <div class="col-sm-10">
                <select id="number_6" class="form-control" name="number_6">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT number FROM number order by number";
                    $stm3 = $pdo->prepare($sql);
                    $stm3 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm3 as $row) {
                    echo "<option value=".$row['number'].">".$row['number']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">セット数</label>
              <div class="col-sm-10">
                <select id="set_number_6" class="form-control" name="set_number_6">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT set_number FROM set_number order by set_number";
                    $stm4 = $pdo->prepare($sql);
                    $stm4 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm4 as $row) {
                    echo "<option value=".$row['set_number'].">".$row['set_number']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <label>サークル</label>
            <div class="form-group" style="margin-top:10px; margin-bottom:2px;">
              <label class="col-sm-2">分</label>
              <div class="col-sm-4">
                <input id="circle_min_6" type="number" class="form-control" name="circle_min_6" placeholder="半角数字">
              </div>
              <label class="col-sm-2">秒</label>
              <div class="col-sm-4">
                <input id="circle_sec_6" type="number" class="form-control" name="circle_sec_6" placeholder="半角数字">
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">セット間</label>
              <div class="col-sm-10">
                <select id="set_interval_6" class="form-control" name="set_interval_6">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT set_interval FROM set_interval order by set_interval";
                    $stm6 = $pdo->prepare($sql);
                    $stm6 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm6 as $row) {
                    echo '<option value="'.$row['set_interval'].'">'.$row['set_interval'].'</option>';
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">レスト</label>
              <div class="col-sm-10">
                <select id="rest_6" class="form-control" name="rest_6">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT rest FROM rest order by rest";
                    $stm7 = $pdo->prepare($sql);
                    $stm7 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm7 as $row) {
                    echo '<option value="'.$row['rest'].'">'.$row['rest'].'</option>';
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">備考</label>
              <div class="col-sm-10">
                <textarea id="comment_6" name="comment_6" class="form-control" rows="4" cols="80"></textarea>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="menu_7">
            <h4 class="subtitle">７コース</h4>
            <!--
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">他のコースと同じ</label>
              <div class="col-sm-10">
                <select class="form-control" name="same_course_7">
                    <option value=null>選択しない</option>
                  <?php for ($i=1; $i < 7; $i++) :?>
                    <option value=<?php echo $i; ?>><?php echo $i; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
            </div>
            -->
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">menu</label>
              <div class="col-sm-10">
                <select id="menu_7" class="form-control" name="menu_7">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT menu FROM each_menu order by menu";
                    $stm1 = $pdo->prepare($sql);
                    $stm1 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm1 as $row) {
                    echo "<option value='".$row['menu']."'>".$row['menu']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">Style</label>
              <div class="col-sm-10" style="margin-top:10px;">
                <select id="style_7" class="form-control" name="style_7">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT style FROM style";
                    $stm2 = $pdo->prepare($sql);
                    $stm2 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm2 as $row) {
                    echo "<option value='".$row['style']."'>".$row['style']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">距離</label>
              <div class="col-sm-10">
                <select id="length_7" class="form-control" name="length_7">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT length FROM length order by length";
                    $stm9 = $pdo->prepare($sql);
                    $stm9 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm9 as $row) {
                    echo "<option value=".$row['length'].">".$row['length']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">本数</label>
              <div class="col-sm-10">
                <select id="number_7" class="form-control" name="number_7">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT number FROM number order by number";
                    $stm3 = $pdo->prepare($sql);
                    $stm3 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm3 as $row) {
                    echo "<option value=".$row['number'].">".$row['number']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">セット数</label>
              <div class="col-sm-10">
                <select id="set_number_7" class="form-control" name="set_number_7">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT set_number FROM set_number order by set_number";
                    $stm4 = $pdo->prepare($sql);
                    $stm4 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm4 as $row) {
                    echo "<option value=".$row['set_number'].">".$row['set_number']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <label>サークル</label>
            <div class="form-group" style="margin-top:10px; margin-bottom:2px;">
              <label class="col-sm-2">分</label>
              <div class="col-sm-4">
                <input id="circle_min_7" type="number" class="form-control" name="circle_min_7" placeholder="半角数字">
              </div>
              <label class="col-sm-2">秒</label>
              <div class="col-sm-4">
                <input id="circle_sec_7" type="number" class="form-control" name="circle_sec_7" placeholder="半角数字">
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">セット間</label>
              <div class="col-sm-10">
                <select id="set_interval_7" class="form-control" name="set_interval_7">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT set_interval FROM set_interval order by set_interval";
                    $stm6 = $pdo->prepare($sql);
                    $stm6 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm6 as $row) {
                    echo '<option value="'.$row['set_interval'].'">'.$row['set_interval'].'</option>';
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">レスト</label>
              <div class="col-sm-10">
                <select id="rest_7" class="form-control" name="rest_7">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT rest FROM rest order by rest";
                    $stm7 = $pdo->prepare($sql);
                    $stm7 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm7 as $row) {
                    echo '<option value="'.$row['rest'].'">'.$row['rest'].'</option>';
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">備考</label>
              <div class="col-sm-10">
                <textarea id="comment_7" name="comment_7" class="form-control" rows="4" cols="80"></textarea>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="menu_8">
            <h4 class="subtitle">８コース</h4>
            <!--
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">他のコースと同じ</label>
              <div class="col-sm-10">
                <select class="form-control" name="same_course_7">
                    <option value=null>選択しない</option>
                  <?php for ($i=1; $i < 8; $i++) :?>
                    <option value=<?php echo $i; ?>><?php echo $i; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
            </div>
            -->
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">menu</label>
              <div class="col-sm-10">
                <select id="menu_8" class="form-control" name="menu_8">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT menu FROM each_menu order by menu";
                    $stm1 = $pdo->prepare($sql);
                    $stm1 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm1 as $row) {
                    echo "<option value='".$row['menu']."'>".$row['menu']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">Style</label>
              <div class="col-sm-10" style="margin-top:10px;">
                <select id="style_8" class="form-control" name="style_8">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT style FROM style";
                    $stm2 = $pdo->prepare($sql);
                    $stm2 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm2 as $row) {
                    echo "<option value='".$row['style']."'>".$row['style']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">距離</label>
              <div class="col-sm-10">
                <select id="length_8" class="form-control" name="length_8">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT length FROM length order by length";
                    $stm9 = $pdo->prepare($sql);
                    $stm9 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm9 as $row) {
                    echo "<option value=".$row['length'].">".$row['length']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">本数</label>
              <div class="col-sm-10">
                <select id="number_8" class="form-control" name="number_8">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT number FROM number order by number";
                    $stm3 = $pdo->prepare($sql);
                    $stm3 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm3 as $row) {
                    echo "<option value=".$row['number'].">".$row['number']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">セット数</label>
              <div class="col-sm-10">
                <select id="set_number_8" class="form-control" name="set_number_8">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT set_number FROM set_number order by set_number";
                    $stm4 = $pdo->prepare($sql);
                    $stm4 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm4 as $row) {
                    echo "<option value=".$row['set_number'].">".$row['set_number']."</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            <label>サークル</label>
            <div class="form-group" style="margin-top:10px; margin-bottom:2px;">
              <label class="col-sm-2">分</label>
              <div class="col-sm-4">
                <input id="circle_min_8" type="number" class="form-control" name="circle_min_8" placeholder="半角数字">
              </div>
              <label class="col-sm-2">秒</label>
              <div class="col-sm-4">
                <input id="circle_sec_8" type="number" class="form-control" name="circle_sec_8" placeholder="半角数字">
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">セット間</label>
              <div class="col-sm-10">
                <select id="set_interval_8" class="form-control" name="set_interval_8">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT set_interval FROM set_interval order by set_interval";
                    $stm6 = $pdo->prepare($sql);
                    $stm6 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm6 as $row) {
                    echo '<option value="'.$row['set_interval'].'">'.$row['set_interval'].'</option>';
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">レスト</label>
              <div class="col-sm-10">
                <select id="rest_8" class="form-control" name="rest_8">
                  <?php
                  try {
                    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo 'データベース接続失敗。';
                    exit();
                  }
                  try {
                    $sql = "SELECT rest FROM rest order by rest";
                    $stm7 = $pdo->prepare($sql);
                    $stm7 -> execute();
                    $pdo=null;
                  } catch (PDOException $e) {
                    echo '<h3>データ送信失敗。</h3>';
                    exit();
                  }
                  foreach ($stm7 as $row) {
                    echo '<option value="'.$row['rest'].'">'.$row['rest'].'</option>';
                  }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <label class="col-sm-2 control-label">備考</label>
              <div class="col-sm-10">
                <textarea id="comment_8" name="comment_8" class="form-control" rows="4" cols="80"></textarea>
              </div>
            </div>
            <div class="form-group" style="margin-top:10px;">
              <input type="hidden" name="flag" value=1>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="" style="margin-top:20px;">
            <button type="submit" class="btn btn-primary">登録</button>
<!--            <a href="#menu-check" data-toggle="modal" type="button" class="btn btn-primary" onclick="onButtonClick();">登録</a> -->
          </div>
        </div>
      </form>

      <!-- 確認用モーダル -->
      <div class="modal fade" id="menu-check" tabindex="-1" role="dialog">
        <div class="modal-dialog" style="z-index: 1500">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">入力メニュー確認</h4>
            </div>
            <div class="modal-body">
              <label>作成者：</label>
              <div id="output_creater"></div>
            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>
      <!-- 確認用モーダル　ここまで -->

      <!-- 確認用javascript -->
      <script type="text/javascript">

      $(function () {
          $("#creater").on("keyup change", function () {
              $("#output_creater").val($(this).val());
          });
      });


        function onButtonClick() {
          //日付
          target_date = document.getElementById("output_date");
          target_date_index = document.insert_menu.date.selectedIndex;
          target_date.innerText = document.insert_menu.date.options[target_date_index].text;

          //作成者
          target_creater = document.getElementById("output_creater");
          target_creater_index = document.insert_menu.creater.selectedIndex;
          target_creater.innerText = document.insert_menu.creater.options[target_creater_index].text;

          //メニュー
          menu_1 = document.getElementById("output_menu_1");
          menu_1.innnerText = document.insert_menu.menu_1.value;

          //泳法
          style_1 = document.getElementById("output_style_1");
          style_1.innnerText = document.insert_menu.style_1.value;

          //距離
          length_1 = document.getElementById("output_length_1");
          length_1.innnerText = document.insert_menu.length_1.value;

          //本数
          number_1 = document.getElementById("number_1");
          number_1.innnerText = document.insert_menu.number_1.value;

          //セット数
          set_number_1 = document.getElementById("set_number_1");
          set_number_1.innnerText = document.insert_menu.set_number_1.value;

          //サークル　分
          circle_min_1 = document.getElementById("circle_min_1");
          circle_min_1.innnerText = document.insert_menu.circle_min_1.value;

          //サークル　秒
          circle_sec_1 = document.getElementById("circle_sec_1");
          circle_sec_1.innnerText = document.insert_menu.circle_sec_1.value;

          //セット間
          set_interval_1 = document.getElementById("set_interval_1");
          set_interval_1.innnerText = document.insert_menu.set_interval_1.value;

          //レスト
          rest_1 = document.getElementById("rest_1");
          rest_1.innnerText = document.insert_menu.rest_1.value;

          //備考
          comment_1 = document.getElementById("comment_1");
          comment_1.innnerText = document.insert_menu.comment_1.value;

        }
      </script>

      <!-- 確認用javascriptここまで -->


      <h3 class="subtitle">メニューの削除</h3>
      <form class="form-horizontal" action="../database/delete_menu.php" method="post">
        <div class="form-group">
          <label class="col-sm-2 conntrol-label">日付</label>
          <div class="col-sm-10" style="margin-top:10px;">
            <select class="form-control" name="day">
              <?php
              for ($i=0; $i < 14; $i++) {
                $n = '+'.$i.' day';
                $day = date('Y-m-d', strtotime($n));
                echo "<option value=".$day.">".$day."</option>";
              } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="" style="margin-left:10px;">
            <button type="submit" class="btn btn-danger">削除</button>
          </div>
        </div>
      </form>
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
</html>
