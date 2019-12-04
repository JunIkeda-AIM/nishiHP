<?php
$dsn = 'mysql:dbname=nishi_swimming_club;charset=utf8;host=localhost';
$user = 'nishi';
$password = 'Onepiece2015';
$id = $_GET['id'];
?>

<?php
  try {
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  } catch (PDOException $e) {
    echo 'データベース接続失敗。';
    exit();
  }
  try {
    $sql = "SELECT * FROM report where id = :id ORDER BY date";
    $stm = $pdo->prepare($sql);
    $stm -> bindValue('id', $id, PDO::PARAM_STR);
    $stm -> execute();
    $pdo = null;
  } catch (Exception $e) {
    echo "データ処理中にエラーが発生しました。";
    exit();
  }

  try {
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  } catch (Exception $e) {
    echo 'データベース接続失敗';
    exit();
  }
  try {
    $sql = "SELECT * FROM team_member where id = :id";
    $stm0 = $pdo->prepare($sql);
    $stm0 -> bindValue('id', $id, PDO::PARAM_STR);
    $stm0 -> execute();
    $pdo = null;
  } catch (Exception $e) {
    echo "データ処理中にエラーが発生しました。";
    exit();
  }


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>六校戦への軌跡</title>
  </head>
  <body>
    <div class="margin: 15px;">
      <h2>六校戦への軌跡</h2>
      <?php foreach ($stm0 as $row) {
        $name = $row['name'];
      } ?>
      <p><?php echo $name; ?>さん、六校戦おつかれさまでした。長い間よく頑張りました。<br /></p>
      <?php foreach ($stm as $row): ?>
        <?php echo $row['date']; ?>
        <br />
        <?php echo $row['report']; ?>
        <br />
        <br />
      <?php endforeach; ?>
    </div>
  </body>
</html>
