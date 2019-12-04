<?php
$gobackURL = "../data/team_member_pass.php";

$dsn = 'mysql:dbname=nishi_swimming_club;charset=utf8;host=localhost';
$user = 'nishi';
$password = 'Onepiece2015';
?>


<?php
/*
  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
  $sql0 = "INSERT INTO team_member(name, sex, class, s1) VALUES('池田 純', '男', 67, 'Fr')";
  $sql1 = "INSERT INTO team_member(name, sex, class, s1) VALUES('田中 恭平', '男', 67, 'Fr')";
  $sql2 = "INSERT INTO team_member(name, sex, class, s1) VALUES('栗田 真之介', '男', 67, 'Fr')";
  $sql3 = "INSERT INTO team_member(name, sex, class, s1) VALUES('清水 直人', '男', 67, 'Fr')";
  $pdo->query($sql0);
  $pdo->query($sql1);
  $pdo->query($sql2);
  $pdo->query($sql3);
*/
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

    if(!isset($_POST["family_name"])||($_POST["family_name"]==="")) {
      $error = 1;
    }
    if(!isset($_POST["first_name"])||($_POST["first_name"]==="")) {
      $error = 2;
    }

    if($error===1) {
      echo "<h3>姓を入力してください。</h3>";
      echo "<a class='btn btn-danger' href=", $gobackURL, ">戻る</a>";
      exit();
    }

    if($error===2) {
      echo "<h3>名を入力してください。</h3>";
      echo "<a class='btn btn-danger' href=", $gobackURL, ">戻る</a>";
      exit();
    }

    $name = $_POST["family_name"]." ".$_POST["first_name"];
    $sex = $_POST["sex"];
    $class = $_POST["class"];
    $s1 = $_POST["S1"];

    try {
      $sql = "INSERT INTO team_member(name, sex, class, s1) VALUES(:name, :sex, :class, :s1)";
      $stm = $pdo->prepare($sql);
      $stm -> bindValue(':name', $name, PDO::PARAM_STR);
      $stm -> bindValue(':sex', $sex, PDO::PARAM_STR);
      $stm -> bindValue(':class', $class, PDO::PARAM_INT);
      $stm -> bindValue(':s1', $s1, PDO::PARAM_STR);
      $stm -> execute();
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
                name
              </th>
              <th>
                sex
              </th>
              <th>
                class
              </th>
              <th>
                S1
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <?php echo $name; ?>
              </td>
              <td>
                <?php echo $sex; ?>
              </td>
              <td>
                <?php echo $class; ?>
              </td>
              <td>
                <?php echo $s1; ?>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <h3>これがあなたのIDです。</h3>
      <p>
        当サイトでは、情報をIDに基づいて管理するので、自分のIDは覚えておくと便利です。
      </p>
      <?php
      $sql2 = "SELECT id FROM team_member WHERE name = :name";
      $stm2 = $pdo->prepare($sql2);
      $stm2->bindValue(':name', $name, PDO::PARAM_STR);
      $stm2->execute();
      foreach ($stm2 as $row) {
        echo "<div class='alert alert-info' role='alert'>ID:　",$row['id'],"</div>";
      }
      $pdo = null;
      ?>
      <a href="../data/team_member_pass.php" class="btn btn-success" role="button">戻る</a>
    </div>
  </body>
</html>
