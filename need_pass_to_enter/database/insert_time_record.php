<?php
$gobackURL = "../data/record_pass.php";

$dsn = 'mysql:dbname=nishi_swimming_club;charset=utf8;host=localhost';
$user = 'nishi';
$password = 'Onepiece2015';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootstrapのCSS読み込み -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="../../js/bootstrap.min.js"></script>
    <title>タイムレコード登録</title>
  </head>
  <body>
    <?php
    try {
      $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));

      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
      echo 'データベース接続失敗。';
      exit();
    }

    $id = $_POST["id"];
    $year = $_POST["year"];
    $month = $_POST["month"];
    $day = $_POST["day"];
    $min = $_POST["min"];
    $scd = $_POST["scd"];
    $mscd = $_POST["mscd"];
    $style = $_POST["style"];
    $length = $_POST["length"];
    $comment = $_POST["comment"];

    if ($id==null) {
      echo "IDを入力してください。<br />";
      echo "<a href='../data/record_pass.php' class='btn btn-default'>戻る</a>";
      exit();
    }

    if ($mscd==null) {
      echo "ミリ秒を入力してください。<br />";
      echo "<a href='../data/record_pass.php' class='btn btn-default'>戻る</a>";
      exit();
    }
    if ($scd==null) {
      echo "秒を入力してください。<br />";
      echo "<a href='../data/record_pass.php' class='btn btn-default'>戻る</a>";
      exit();
    }

    if ($min === NULL) { $record = $scd * 100 + $mscd; }
    else { $record = $min * 10000 + $scd * 100 + $mscd; }
    $date = $year."/".$month."/".$day;
    try {
      if ($comment !== NULL) {
        $sql = "INSERT INTO time_record VALUES(:id, :date, :style, :length, :record, :comment)";
        $stm = $pdo->prepare($sql);
        $stm -> bindValue(':id', $id, PDO::PARAM_INT);
        $stm -> bindValue(':date', $date, PDO::PARAM_STR);
        $stm -> bindValue(':record', $record, PDO::PARAM_STR);
        $stm -> bindValue(':style', $style, PDO::PARAM_STR);
        $stm -> bindValue(':length', $length, PDO::PARAM_STR);
        $stm -> bindValue(':comment', $comment, PDO::PARAM_STR);
        $stm -> execute();
      } else {
        $sql = "INSERT INTO time_record VALUES(:id, :date, :style, :length, :record, '')";
        $stm = $pdo->prepare($sql);
        $stm -> bindValue(':id', $id, PDO::PARAM_INT);
        $stm -> bindValue(':date', $date, PDO::PARAM_STR);
        $stm -> bindValue(':record', $record, PDO::PARAM_STR);
        $stm -> bindValue(':style', $style, PDO::PARAM_STR);
        $stm -> bindValue(':length', $length, PDO::PARAM_STR);
        $stm -> execute();
      }
      $pdo=null;
    } catch (PDOException $e) {
      echo '<h3>データ送信失敗。</h3>';
      exit();
    }
    ?>
    <div class="container" style="padding-top:50px;">
      <h3>登録完了</h3>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>
                ID
              </th>
              <th>
                Date
              </th>
              <th>
                Style
              </th>
              <th>
                Length
              </th>
              <th>
                Record
              </th>
              <th>
                Comment
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <?php echo $id; ?>
              </td>
              <td>
                <?php echo $date; ?>
              </td>
              <td>
                <?php echo $style; ?>
              </td>
              <td>
                <?php echo $length; ?>
              </td>
              <td>
                <?php echo $record; ?>
              </td>
              <td>
                <?php echo $comment; ?>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <a href="../data/record_pass.php" class="btn btn-success" role="button">戻る</a>
    </div>
  </body>
</html>
