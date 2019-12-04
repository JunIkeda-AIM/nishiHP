<?php
$dsn = 'mysql:dbname=nishi_swimming_club;charset=utf8;host=localhost';
$user = 'nishi';
$password = 'Onepiece2015';

$the_day = date('Y-m-d', strtotime('-7 day'));

try {
  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'データベース接続失敗。';
  exit();
}
try {
  $sql = "SELECT * FROM team_member, time_record INTO OUTFILE '/tmp/time_record.csv' where team_member.id = time_record.id order by time_record.id ";
  $stm = $pdo->prepare($sql);
  $stm -> bindValue(':option', $option, PDO::PARAM_STR);
  $stm -> execute();
} catch (PDOException $e) {
  echo 'データ受信失敗。';
  exit();
}
 ?>
