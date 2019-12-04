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

<?php
try {
  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'データベース接続失敗。';
  exit();
}
try {
  $day = $_POST['day'];
  $sql = "DELETE FROM menu WHERE day = :day";
  $stm=$pdo->prepare($sql);
  $stm->bindValue(':day', $day, PDO::PARAM_STR);
  $stm->execute();
  $pdo=null;
} catch (PDOException $e) {
  echo '<h3>データ送信失敗。</h3>';
  exit();
}
echo  '<a id="goback" href="../schedule/insert_menu_pass.php" class="btn btn-success btn-lg" role="button">戻る</a>';
?>
