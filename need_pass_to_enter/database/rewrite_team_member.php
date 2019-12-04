<?php
$gobackURL = "../data/team_member_pass.php";

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
    <title>メンバー登録</title>
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

    if(!isset($_POST["id"])||($_POST["id"]==="")) {
      $error = 1;
    }
    if($error===1) {
      echo "<h3>IDを入力してください。</h3>";
      echo "<a class='btn btn-danger' href=", $gobackURL, ">戻る</a>";
      exit();
    }


    $id = $_POST["id"];
    $s1 = $_POST["s1"];

    try {
      $sql = "UPDATE team_member SET s1 = :s1 WHERE id = :id";
      $stm = $pdo->prepare($sql);
      $stm -> bindValue(':id', $id, PDO::PARAM_INT);
      $stm -> bindValue(':s1', $s1, PDO::PARAM_STR);
      $stm -> execute();
    } catch (PDOException $e) {
      echo '<h3>データ送信失敗。</h3>';
      exit();
    }
    ?>
    <div class="container" style="padding-top:50px;">
      <h3>更新完了</h3>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>
                ID
              </th>
              <th>
                S1
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <?php echo $id; ?>
              </td>
              <td>
                <?php echo $s1; ?>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <a href="../data/team_member_pass.php" class="btn btn-success" role="button">戻る</a>
    </div>
  </body>
</html>
