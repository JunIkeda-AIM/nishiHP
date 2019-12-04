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
  <div style="margin-left:10px;margin-right:10px;">
    <?php
    try {
      $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'データベース接続失敗。';
      exit();
    }
    try{
      $day = $_GET['day'];
      $sql = "SELECT * FROM menu WHERE day = :day AND course = 5";
      $stm = $pdo->prepare($sql);
      $stm->bindValue(':day', $day, PDO::PARAM_STR);
      $stm->execute();
      $pdo=null;
    } catch (Exception $e) {
      echo 'データ受信失敗。';
      exit();
    } ?>

    <h2 class="subtitle">５コース メニュー <?php echo $day; ?></h2>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Menu</th>
            <th>Style</th>
            <th>コース</th>
            <th>距離</th>
            <th>本数</th>
            <th>セット数</th>
            <th>サークル</th>
            <th>セット間</th>
            <th>レスト</th>
            <th>備考</th>
            <th>時間</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          $sum_length = 0;
          $sum_time = 0;
          foreach ($stm as $row) {
            echo "<tr>";
            echo "<th>", $i, "</th>";
            echo "<th>", $row['menu'], "</th>";
            echo "<th>", $row['style'], "</th>";
            echo "<th>6</th>";
            $length = $row['length'];
            echo "<th>", $length, "</th>";
            $number = $row['number'];
            echo "<th>", $number, "</th>";
            $set_number = $row['set_number'];
            echo "<th>", $set_number, "</th>";
            $circle = $row['circle'];
            $circle_sec = $circle % 60;
            $circle_min = ($circle-$circle_sec)/60;

            echo "<th>", $circle_min,"'",$circle_sec,'"', "</th>";
            echo "<th>", $row['set_interval'], "</th>";
            echo "<th>", $row['rest'], "</th>";
            echo "<th style='width:540px; wordwrap: normal;'>", $row['comment'], "</th>";
            $time = $row['time'];// / 60.0;
            echo "<th>", $time, "</th>";
            echo "</tr>";
            if ($set_number > 0){$number *= $set_number;}
            $sum_length += $length * $number;
            $sum_time += $time;
            if ($i === 1) {$creater = $row['creater'];}
            if ($i === 1) {$aim = $row['aim'];}
            $i++;
          }
          echo "<h4>作成者：".$creater."</h4>";
          echo "<p>総距離:".$sum_length."m  総時間:".$sum_time."分</p>";
          echo "<h5>メニューの意図：".$aim."</h5>";
           ?>

        </tbody>
      </table>
    </div>
  </div>
