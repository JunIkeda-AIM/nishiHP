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

        <?php
        $day = $_POST['day'];
        $dir = "/var/www/html/nishiHP/need_pass_to_enter/schedule/pdf/";
        for ($i = 0; $i< count($_FILES["upfile"]["name"]); $i++) {
          if (is_uploaded_file($_FILES["upfile"]["tmp_name"][$i])) {
            $fileName = $dir.$_FILES["upfile"]["name"][$i];
              if (move_uploaded_file($_FILES["upfile"]["tmp_name"][$i], $fileName)) {
                chmod($fileName, 0644);
                echo $_FILES["upfile"]["name"][$i] . "をアップロードしました。<br>";
              } else {
                echo "アップロードエラー";
              }
          } else {
            echo "ファイルが選択されていません";
          }
        }
         ?>

         <?php /*
         $day = $_POST['day'];
         $dir = "/var/www/html/nishiHP/need_pass_to_enter/schedule/pdf/";
         for ($i = 0; $i< count($_FILES["upfile"]["name"]); $i++) {
           if (is_uploaded_file($_FILES["upfile"]["tmp_name"][$i])) {
             $fileName = $dir.$_FILES["upfile"]["name"][$i];
             if (file_exists($fileName)===false) {
               if (move_uploaded_file($_FILES["upfile"]["tmp_name"][$i], $fileName)) {
                 chmod($fileName, 0644);
                 echo $_FILES["upfile"]["name"][$i] . "をアップロードしました。<br>";
               } else {
                 echo "アップロードエラー";
               }
             } else {
               echo "既にファイルが存在します。";
             }
           } else {
             echo "ファイルが選択されていません";
           }
         } */
          ?>


        <p></p>
        <a href="insert_menu_pass.php" class="btn-sm btn-primary">続けてアップロード</a>
        <a href="../schedule_pass.php" class="btn-sm btn-primary">完了</a>
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
