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
$change = 1;
if ($change === 1) {
  try {
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo 'データベース接続失敗。';
    exit();
  }
  try {
    $item = $_POST['item'];
    $option = $_POST['option'];
    switch ($item) {
      case 'menu':
        $sql = "INSERT INTO each_menu(menu) VALUES(:option)";
        $stm = $pdo->prepare($sql);
        $stm -> bindValue(':option', $option, PDO::PARAM_STR);
        $stm -> execute();
        break;
      case 'style':
        $sql = "INSERT INTO style(style) VALUES(:option)";
        $stm = $pdo->prepare($sql);
        $stm -> bindValue(':option', $option, PDO::PARAM_STR);
        $stm -> execute();
        break;
      case 'course':
        $sql = "INSERT INTO course(course) VALUES(:option)";
        $stm = $pdo->prepare($sql);
        $stm -> bindValue(':option', $option, PDO::PARAM_STR);
        $stm -> execute();
        break;
      case 'length':
        $sql = "INSERT INTO length(length) VALUES(:option)";
        $stm = $pdo->prepare($sql);
        $stm -> bindValue(':option', $option, PDO::PARAM_INT);
        $stm -> execute();
        break;
      case 'number':
        $sql = "INSERT INTO number(number) VALUES(:option)";
        $stm = $pdo->prepare($sql);
        $stm -> bindValue(':option', $option, PDO::PARAM_INT);
        $stm -> execute();
        break;
      case 'set_number':
        $sql = "INSERT INTO set_number(set_number) VALUES(:option)";
        $stm = $pdo->prepare($sql);
        $stm -> bindValue(':option', $option, PDO::PARAM_INT);
        $stm -> execute();
        break;
      case 'circle':
        $sql = "INSERT INTO circle(circle) VALUES(:option)";
        $stm = $pdo->prepare($sql);
        $stm -> bindValue(':option', $option, PDO::PARAM_STR);
        $stm -> execute();
        break;
      case 'set_interval':
        $sql = "INSERT INTO set_interval(set_interval) VALUES(:option)";
        $stm = $pdo->prepare($sql);
        $stm -> bindValue(':option', $option, PDO::PARAM_STR);
        $stm -> execute();
        break;
      case 'rest':
        $sql = "INSERT INTO rest(rest) VALUES(:option)";
        $stm = $pdo->prepare($sql);
        $stm -> bindValue(':option', $option, PDO::PARAM_STR);
        $stm -> execute();
        break;
      case 'creater':
        $sql = "INSERT INTO creater(creater) VALUES(:option)";
        $stm = $pdo->prepare($sql);
        $stm -> bindValue(':option', $option, PDO::PARAM_STR);
        $stm -> execute();
        break;
      default:
        echo "Are you OK?";
        break;
    }
    $pdo=null;
  } catch (PDOException $e) {
    echo '<h3>データ送信失敗。</h3>';
    exit();
  }
  echo  '<a id="goback" href="../schedule/insert_menu_pass.php" class="btn btn-success btn-lg" role="button">戻る</a>';
}
?>
