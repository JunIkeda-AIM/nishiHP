<?php
$dsn = 'mysql:dbname=nishi_swimming_club;charset=utf8;host=localhost';
$user = 'nishi';
$password = 'Onepiece2015';

try {
  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));

  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
  echo 'データベース接続失敗。';
  exit();
}

$flag = $_POST["flag"];
$id = $_POST["id"];
if ($id===NULL) {
  $id = $_GET['id'];
}
$report = $_POST["report"];

if ($flag==="insert") {
  if ($report==NULL) {
    echo "報告書本文を入力してください。<br />";
    echo "<a href='../report_pass.php' class='btn btn-default'>戻る</a>";
    exit();
  }
  try {
    $date = date('Y-m-d');
    $sql = "INSERT INTO report VALUES(:id, :date, :report)";
    $stm = $pdo->prepare($sql);
    $stm -> bindValue(':id', $id, PDO::PARAM_INT);
    $stm -> bindValue(':date', $date, PDO::PARAM_STR);
    $stm -> bindValue(':report', $report, PDO::PARAM_STR);
    $stm -> execute();
  } catch (Exception $e) {
    echo '<h3>データ送信失敗。</h3>';
    exit();
  }
}

try {
  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));

  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
  echo 'データベース接続失敗。';
  exit();
}

try {
  $this_month = date('Y-m-01');
  $sql = "SELECT * FROM report, team_member WHERE team_member.id = report.id and report.id = :id and date >= :this_month order by date";
  $stm = $pdo->prepare($sql);
  $stm->bindValue(':id', $id, PDO::PARAM_INT);
  $stm->bindValue(':this_month', $this_month, PDO::PARAM_STR);
  $stm->execute();
} catch (Exception $e) {
  echo '<h3>データ送信失敗。</h3>';
  exit();
}
$day = [];
foreach ($stm as $row) {
  $day[] = mb_substr($row['date'], -2);
  $name = $row['name'];
}


$year = date('Y');
$month = date('m');
$last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));
$calendar = array();
$j = 0;

for ($i = 1; $i < $last_day + 1; $i++) {
  $week = date('w', mktime(0, 0, 0, $month, $i, $year));
  if ($i == 1) {
    for ($s = 1; $s <= $week; $s++) {
      $calendar[$j]['day'] = '';
      $j++;
    }
  }
  $calendar[$j]['day'] = $i;
  $j++;

  if ($i == $last_day) {
    for ($e = 1; $e <= 6 - $week; $e++) {
      $calendar[$j]['day'] = '';
      $j++;
    }
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
             <li class="active"><a href="../report_pass.php">Report</a></li>
             <li><a href="../data_pass.php">Data</a></li>
             <li><a href="../pictures_pass.php">Picturs</a></li>
             <li><a href="../training_pass.php">Training</a></li>
             <li><a href="../schedule_pass.php">Schedule</a></li>
           </ul>
           <ul class="nav navbar-nav navbar-right">
             <li><a href="#login0" data-toggle="modal" style="padding-right:50px;">管理者専用ページ</a></li>
           </ul>
         </div>
         <div style="border-top: dashed 1px rgb(85, 84, 85) ; margin-left: 15px; margin-right: 15px;">
           <p class="topicPath"><a href="../index_pass.php" style="color: black;">Home</a> &gt; <a href="../report_pass.php">Report</a></p>
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
         <div class="col-sm-7">
          <?php if ($name===null) {
            $name = "ID:".$id;
          } ?>
          <h3 class="subtitle">今月の <?php echo $name; ?> さんの出席状況</h3>
          <br />
          <p>出席した日は青く表示されます。</p>
          <h4>
          <?php echo $year; ?>年<?php echo $month; ?>月
          </h4>
          <table>
            <tr>
              <th>日</th>
              <th>月</th>
              <th>火</th>
              <th>水</th>
              <th>木</th>
              <th>金</th>
              <th>土</th>
            </tr>

            <tr>
              <?php $cnt = 0; ?>
              <?php foreach ($calendar as $key => $value): ?>

                <?php if (in_array($value['day'], $day)): ?>
                  <td bgcolor="#33CCFF">
                  <?php $flag = true; ?>
                <?php else: ?>
                  <td>
                  <?php $flag = false; ?>
                <?php endif; ?>
                <?php $cnt++; ?>
                <?php $the_day = $value['day']; ?>
                <?php $modal_id = "report_".$the_day; ?>
                <?php echo '<a href="#'.$modal_id.'" data-toggle="modal">'.$the_day.'</a>'; ?>
                  </td>

            <?php if ($cnt == 7): ?>
            </tr>
            <tr>
            <?php $cnt = 0; ?>
            <?php endif; ?>
            <?php echo "<div class='modal fade' id=".$modal_id." tabindex='-1' role='dialog'>"; ?>
              <div class="modal-dialog" style="z-index: 1500">
                <div class="modal-content">
                  <?php
                  $the_day_ = $year."-".$month."-".$the_day;
                  if ($flag===true) {
                    try {
                      $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
                      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    } catch (PDOException $e) {
                      echo "データベース接続失敗。";
                      exit();
                    }
                    try{
                      $sql = "SELECT * FROM report, team_member where report.id = team_member.id AND date = :the_day_ AND report.id = :id";
                      $stm = $pdo->prepare($sql);
                      $stm->bindValue(':the_day_', $the_day_, PDO::PARAM_STR);
                      $stm->bindValue(':id', $id, PDO::PARAM_STR);
                      $stm->execute();
                      $pdo=null;
                    } catch (Exception $e) {
                      echo "エラーが発生しました。";
                    }
                    foreach ($stm as $row) {
                      $text = $row['report'];
                      $date = $row['date'];
                    }
                  } else {
                    $text = null;
                    $date = null;
                  }
                   ?>
                  <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?php if($text!==null) {echo $date." の報告内容";} ?></h4>
                  </div>
                  <div class="modal-body">
                    <?php
                    if ($text == null) {
                      echo "表示する内容がありません。";
                    } else {
                      echo "<div class='report_text' style='margin-bottom:10px;'>".$text."</div>";
                    }
                     ?>
                  </div>
                  <div class="modal-footer">
                    <small>エラーの報告は管理者まで</small>
                  </div>
                </div>
              </div>
            </div>


            <?php endforeach; ?>
            </tr>
          </table>
         </div>
         <style type="text/css">
           table {
             width: 80%;
           }
           table th {
             background: #EEEEEE;
           }
           table th,
           table td {
             border: 1px solid #CCCCCC;
             text-align: center;
             padding:5px;
           }
         </style>
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
