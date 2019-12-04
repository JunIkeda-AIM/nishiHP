<?php
$gobackURL = "../data/record_pass.php";

$dsn = 'mysql:dbname=nishi_swimming_club;charset=utf8;host=localhost';
$user = 'nishi';
$password = 'Onepiece2015';
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
  <body>
    <div class="container">
      <?php
      $flag = 1;
      if ($flag === 1) {
        try {
          $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
          $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
          echo 'データベース接続失敗。';
          exit();
        }

        $day = $_POST["day"];
        $creater = $_POST["creater"];
        $aim = $_POST["aim"];


        $menu_ = array();
        $style = array();
        $length = array();
        $same_course = array();
        $number = array();
        $set_number = array();
        $circle_min = array();
        $circle_sec = array();
        $set_interval = array();
        $rest = array();
        $comment = array();


        $menu_1 = $_POST['menu_1'];
        $style_1 = $_POST['style_1'];
        $length_1 = $_POST['length_1'];
        $number_1 = $_POST["number_1"];
        $set_number_1 = $_POST["set_number_1"];
        $circle_min_1 = $_POST["circle_min_1"];
        $circle_sec_1 = $_POST["circle_sec_1"];
        $set_interval_1 = $_POST["set_interval_1"];
        $rest_1 = $_POST["rest_1"];
        $comment_1 = $_POST["comment_1"];

        $menu_2 = $_POST['menu_2'];
        $style_2 = $_POST['style_2'];
        $length_2 = $_POST['length_2'];
        $same_course_2 = $_POST["same_course_2"];
        $number_2 = $_POST["number_2"];
        $set_number_2 = $_POST["set_number_2"];
        $circle_min_2 = $_POST["circle_min_2"];
        $circle_sec_2 = $_POST["circle_sec_2"];
        $set_interval_2 = $_POST["set_interval_2"];
        $rest_2 = $_POST["rest_2"];
        $comment_2 = $_POST["comment_2"];


        $menu_3 = $_POST['menu_3'];
        $style_3 = $_POST['style_3'];
        $length_3 = $_POST['length_3'];
        $same_course_3 = $_POST["same_course_3"];
        $number_3 = $_POST["number_3"];
        $set_number_3 = $_POST["set_number_3"];
        $circle_min_3 = $_POST["circle_min_3"];
        $circle_sec_3 = $_POST["circle_sec_3"];
        $set_interval_3 = $_POST["set_interval_3"];
        $rest_3 = $_POST["rest_3"];
        $comment_3 = $_POST["comment_3"];


        $menu_4 = $_POST['menu_4'];
        $style_4 = $_POST['style_4'];
        $length_4 = $_POST['length_4'];
        $same_course_4 = $_POST["same_course_4"];
        $number_4 = $_POST["number_4"];
        $set_number_4 = $_POST["set_number_4"];
        $circle_min_4 = $_POST["circle_min_4"];
        $circle_sec_4 = $_POST["circle_sec_4"];
        $set_interval_4 = $_POST["set_interval_4"];
        $rest_4 = $_POST["rest_4"];
        $comment_4 = $_POST["comment_4"];


        $menu_5 = $_POST['menu_5'];
        $style_5 = $_POST['style_5'];
        $length_5 = $_POST['length_5'];
        $same_course_5 = $_POST["same_course_5"];
        $number_5 = $_POST["number_5"];
        $set_number_5 = $_POST["set_number_5"];
        $circle_min_5 = $_POST["circle_min_5"];
        $circle_sec_5 = $_POST["circle_sec_5"];
        $set_interval_5 = $_POST["set_interval_5"];
        $rest_5 = $_POST["rest_5"];
        $comment_5 = $_POST["comment_5"];


        $menu_6 = $_POST['menu_6'];
        $style_6 = $_POST['style_6'];
        $length_6 = $_POST['length_6'];
        $same_course_6 = $_POST["same_course_6"];
        $number_6 = $_POST["number_6"];
        $set_number_6 = $_POST["set_number_6"];
        $circle_min_6 = $_POST["circle_min_6"];
        $circle_sec_6 = $_POST["circle_sec_6"];
        $set_interval_6 = $_POST["set_interval_6"];
        $rest_6 = $_POST["rest_6"];
        $comment_6 = $_POST["comment_6"];


        $menu_7 = $_POST['menu_7'];
        $style_7 = $_POST['style_7'];
        $length_7 = $_POST['length_7'];
        $same_course_7 = $_POST["same_course_7"];
        $number_7 = $_POST["number_7"];
        $set_number_7 = $_POST["set_number_7"];
        $circle_min_7 = $_POST["circle_min_7"];
        $circle_sec_7 = $_POST["circle_sec_7"];
        $set_interval_7 = $_POST["set_interval_7"];
        $rest_7 = $_POST["rest_7"];
        $comment_7 = $_POST["comment_7"];


        $menu_8 = $_POST['menu_8'];
        $style_8 = $_POST['style_8'];
        $length_8 = $_POST['length_8'];
        $same_course_8 = $_POST["same_course_8"];
        $number_8 = $_POST["number_8"];
        $set_number_8 = $_POST["set_number_8"];
        $circle_min_8 = $_POST["circle_min_8"];
        $circle_sec_8 = $_POST["circle_sec_8"];
        $set_interval_8 = $_POST["set_interval_8"];
        $rest_8 = $_POST["rest_8"];
        $comment_8 = $_POST["comment_8"];
        //$time = $_POST["time"];

        $same_course[] = $same_course_2;
        $same_course[] = $same_course_3;
        $same_course[] = $same_course_4;
        $same_course[] = $same_course_5;
        $same_course[] = $same_course_6;
        $same_course[] = $same_course_7;
        $same_course[] = $same_course_8;

        $menu = array();


        $number[] = $number_1;
        $number[] = $number_2;
        $number[] = $number_3;
        $number[] = $number_4;
        $number[] = $number_5;
        $number[] = $number_6;
        $number[] = $number_7;
        $number[] = $number_8;
        $menu[] = $number;

        $set_number[] = $set_number_1;
        $set_number[] = $set_number_2;
        $set_number[] = $set_number_3;
        $set_number[] = $set_number_4;
        $set_number[] = $set_number_5;
        $set_number[] = $set_number_6;
        $set_number[] = $set_number_7;
        $set_number[] = $set_number_8;
        $menu[] = $set_number;

        $circle_min[] = $circle_min_1;
        $circle_min[] = $circle_min_2;
        $circle_min[] = $circle_min_3;
        $circle_min[] = $circle_min_4;
        $circle_min[] = $circle_min_5;
        $circle_min[] = $circle_min_6;
        $circle_min[] = $circle_min_7;
        $circle_min[] = $circle_min_8;
        $menu[] = $circle_min;

        $circle_sec[] = $circle_sec_1;
        $circle_sec[] = $circle_sec_2;
        $circle_sec[] = $circle_sec_3;
        $circle_sec[] = $circle_sec_4;
        $circle_sec[] = $circle_sec_5;
        $circle_sec[] = $circle_sec_6;
        $circle_sec[] = $circle_sec_7;
        $circle_sec[] = $circle_sec_8;
        $menu[] = $circle_sec;

        $set_interval[] = $set_interval_1;
        $set_interval[] = $set_interval_2;
        $set_interval[] = $set_interval_3;
        $set_interval[] = $set_interval_4;
        $set_interval[] = $set_interval_5;
        $set_interval[] = $set_interval_6;
        $set_interval[] = $set_interval_7;
        $set_interval[] = $set_interval_8;
        $menu[] = $set_interval;

        $rest[] = $rest_1;
        $rest[] = $rest_2;
        $rest[] = $rest_3;
        $rest[] = $rest_4;
        $rest[] = $rest_5;
        $rest[] = $rest_6;
        $rest[] = $rest_7;
        $rest[] = $rest_8;
        $menu[] = $rest;

        $comment[] = $comment_1;
        $comment[] = $comment_2;
        $comment[] = $comment_3;
        $comment[] = $comment_4;
        $comment[] = $comment_5;
        $comment[] = $comment_6;
        $comment[] = $comment_7;
        $comment[] = $comment_8;
        $menu[] = $comment;

        $menu_[] = $menu_1;
        $menu_[] = $menu_2;
        $menu_[] = $menu_3;
        $menu_[] = $menu_4;
        $menu_[] = $menu_5;
        $menu_[] = $menu_6;
        $menu_[] = $menu_7;
        $menu_[] = $menu_8;
        $menu[] = $menu_;

        $style[] = $style_1;
        $style[] = $style_2;
        $style[] = $style_3;
        $style[] = $style_4;
        $style[] = $style_5;
        $style[] = $style_6;
        $style[] = $style_7;
        $style[] = $style_8;
        $menu[] = $style;

        $length[] = $length_1;
        $length[] = $length_2;
        $length[] = $length_3;
        $length[] = $length_4;
        $length[] = $length_5;
        $length[] = $length_6;
        $length[] = $length_7;
        $length[] = $length_8;
        $menu[] = $length;

      //  for ($i=0; $i < 7; $i++) {
      //    for ($j=1; $j < $i+2; $j++) {
      //      if ($same_course[$i]==$j) {
      //        for ($k=0; $k < 7; $k++) {
      //          $menu[$k][$i+1] = $menu[$k][$j-1];
      //        }
      //      }
      //    }
      //  }

        //menu 0:number, 1:set_number, 2:circle_min, 3:circle_sec, 4:set_interval, 5:rest, 6:comment, 7:menu, 8:style, 9:length

        for ($i=0; $i < 8; $i++) {
          $course = $i + 1;

          if ($menu[5][$i]==0) {
            $menu[5][$i] = 1;
          }

          $circle = $menu[2][$i] * 60 + $menu[3][$i];
          $time = ( $circle * $menu[0][$i] * $menu[1][$i] + ($menu[4][$i] * 60) * ($menu[1][$i] - 1) + ($menu[5][$i] * 60) ) / 60.0;


          $menu_ = $menu[7][$i];
          $style = $menu[8][$i];
          $length = $menu[9][$i];
          $number_ = $menu[0][$i];
          $set_number_ = $menu[1][$i];
          $set_interval_ = $menu[4][$i];
          $rest_ = $menu[5][$i];
          $comment_ = $menu[6][$i];

          try {
            $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $e) {
            echo 'データベース接続失敗。';
            exit();
          }
          try {
            $sql = "INSERT INTO menu VALUES(:day, :menu, :style, :course, :length, :number, :set_number, :circle, :set_interval, :rest, :comment, :time, :creater, :aim)";
            $stm = $pdo->prepare($sql);
            $stm -> bindValue(':day', $day, PDO::PARAM_STR);
            $stm -> bindValue(':menu', $menu_, PDO::PARAM_STR);
            $stm -> bindValue(':style', $style, PDO::PARAM_STR);
            $stm -> bindValue(':course', $course, PDO::PARAM_INT);
            $stm -> bindValue(':length', $length, PDO::PARAM_INT);
            $stm -> bindValue(':number', $number_, PDO::PARAM_INT);
            $stm -> bindValue(':set_number', $set_number_, PDO::PARAM_INT);
            $stm -> bindValue(':circle', $circle, PDO::PARAM_INT);
            $stm -> bindValue(':set_interval', $set_interval_, PDO::PARAM_INT);
            $stm -> bindValue(':rest', $rest_, PDO::PARAM_INT);
            $stm -> bindValue(':comment', $comment_, PDO::PARAM_STR);
            $stm -> bindValue(':time', $time, PDO::PARAM_INT);
            $stm -> bindValue(':creater', $creater, PDO::PARAM_STR);
            $stm -> bindValue(':aim', $aim, PDO::PARAM_STR);
            $stm -> execute();
            $pdo=null;
          } catch (PDOException $e) {
            echo '<h3>データ送信失敗。</h3>';
            exit();
          }

        }
      }
/*
        try {
          $sql = "INSERT INTO menu VALUES(:day, :menu, :style, :course, :length, :number, :set_number, :circle, :set_interval, :rest, :comment, :time, :creater)";
          $stm = $pdo->prepare($sql);
          $stm -> bindValue(':day', $day, PDO::PARAM_STR);
          $stm -> bindValue(':menu', $menu, PDO::PARAM_STR);
          $stm -> bindValue(':style', $style, PDO::PARAM_STR);
          $stm -> bindValue(':course', $course, PDO::PARAM_INT);
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
*/
      try {
        $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      } catch (PDOException $e) {
        echo 'データベース接続失敗。';
        exit();
      }

      try{
        $sql = "SELECT * FROM menu WHERE day = :day";
        $stm_0 = $pdo->prepare($sql);
        $stm_0->bindValue(':day', $day, PDO::PARAM_STR);
        $stm_0->execute();
        $pdo=null;
      } catch (PDOException $e) {
        echo "<h3>データ送信失敗。</h3>";
      }
/*
      $j = 0;
      $k = 0;
      $menu = array(array());
      $style = array(array());
      $length = array(array());
      $number = array(array());
      $set_number = array(array());
      $circle = array(array());
      $set_interval = array(array());
      $rest = array(array());
      $comment = array(array());
      $count = 0;
      foreach ($stm_0 as $row) {
        if ($k < 9) {
          $menu[$j][$k] = $row['menu'];
          $style[$j][$k] = $row['style'];
          $length[$j][$k] = $row['length'];
          $number[$j][$k] = $row['number'];
          $set_number[$j][$k] = $row['set_number'];
          $circle[$j][$k] = $row['circle'];
          $set_interval[$j][$k] = $row['set_interval'];
          $rest[$j][$k] = $row['rest'];
          $comment[$j][$k] = $row['comment'];
          $k++;
          $count++;
        }
        if ($k === 8) {
          $k = 0;
          $j++;
        }
      }

      for ($i=0; $i < $count; $i++) {

      }



*/
      echo '<h3 class="subtitle">指定された日付に現在登録されているメニュー</h3>';
      echo '<div class="container" style="padding-top:50px;">';
      echo  '<div class="table-responsive">';
      echo    '<table class="table">';
      echo      '<thead>';
      echo        '<tr>';
      echo          '<th>No.</th>';
      echo          '<th>menu</th>';
      echo          '<th>style</th>';
      echo          '<th>コース</th>';
      echo          '<th>距離</th>';
      echo          '<th>本数</th>';
      echo          '<th>セット数</th>';
      echo          '<th>サークル</th>';
      echo          '<th>セット間</th>';
      echo          '<th>レスト</th>';
      echo          '<th>備考</th>';
      echo          '<th>時間（分）</th>';
      echo        '</tr>';
      echo      '</thead>';
      echo      '<tbody>';
              $i = 1;
              foreach ($stm_0 as $row) {
                echo "<tr>";
                if ($i % 8 === 1) {
                  $No = ($i-1)/8 + 1;
                } else {
                  $No = null;
                }
                echo "<th>", $No, "</th>";
                echo "<th>", $row['menu'], "</th>";
                echo "<th>", $row['style'], "</th>";
                echo "<td>", $row['course'], "</td>";
                echo "<td>", $row['length'], "</td>";
                echo "<td>", $row['number'], "</td>";
                echo "<td>", $row['set_number'], "</td>";
                $circle = $row['circle'];
                $circle_sec = $circle % 60;
                $circle_min = ($circle-$circle_sec) / 60;
                echo "<td>", $circle_min,"'",$circle_sec,'"', "</td>";
                echo "<td>", $row['set_interval'], "</td>";
                echo "<td>", $row['rest'], "</td>";
                echo "<td>", $row['comment'], "</td>";
                echo "<td>", $row['time'], "</td>";
                echo "</tr>";
                $i++;
              }
      echo      '</tbody>';
      echo    '</table>';
      echo  '</div>';
      echo  "<a href='../schedule/insert_menu_pass.php?day=".$day."&creater=".$creater."' class='btn btn-success' role='button'>戻る</a>";
      echo '</div>';

      ?>

    </div>
  </body>
</html>
