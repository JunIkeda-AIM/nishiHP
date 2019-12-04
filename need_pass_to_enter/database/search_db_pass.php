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
    <title>member</title>
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
    try{
      $name = $_POST["name"];
      $class = $_POST["class"];
      $sex = $_POST["sex"];
      $s1 = $_POST["s1"];

      if ($name===NULL) {
        switch ($class) {
          case 0:
            switch ($sex) {
              case '0':
                switch ($s1) {
                  case '0':
                    $sql = "SELECT * FROM team_member";
                    $stm = $pdo->query($sql);
                    break;
                  default:
                    $sql = "SELECT * FROM team_member WHERE s1=:s1";
                    $stm = $pdo->prepare($sql);
                    $stm->bindValue(':s1', $s1, PDO::PARAM_STR);
                    $stm->execute();
                    break;
                }
                break;
              default:
                switch ($s1) {
                  case '0':
                    $sql = "SELECT * FROM team_member WHERE sex=:sex";
                    $stm = $pdo->prepare($sql);
                    $stm->bindValue(':sex', $sex, PDO::PARAM_STR);
                    $stm->execute();
                    break;
                  default:
                    $sql = "SELECT * FROM team_member WHERE sex=:sex AND s1=:s1";
                    $stm = $pdo->prepare($sql);
                    $stm->bindValue(':sex', $sex, PDO::PARAM_STR);
                    $stm->bindValue(':s1', $s1, PDO::PARAM_STR);
                    $stm->execute();
                    break;
                }
                break;
            }
            break;
          default:
          switch ($sex) {
            case '0':
              switch ($s1) {
                case '0':
                  $sql = "SELECT * FROM team_member WHERE class=:class";
                  $stm = $pdo->prepare($sql);
                  $stm->bindValue(':class', $class, PDO::PARAM_INT);
                  $stm->execute();
                  break;
                default:
                  $sql = "SELECT * FROM team_member WHERE class=:class AND s1=:s1";
                  $stm = $pdo->prepare($sql);
                  $stm->bindValue(':class', $class, PDO::PARAM_INT);
                  $stm->bindValue(':s1', $s1, PDO::PARAM_STR);
                  $stm->execute();
                  break;
              }
              break;
            default:
              switch ($s1) {
                case '0':
                  $sql = "SELECT * FROM team_member WHERE class=:class AND sex=:sex";
                  $stm = $pdo->prepare($sql);
                  $stm->bindValue(':class', $class, PDO::PARAM_INT);
                  $stm->bindValue(':sex', $sex, PDO::PARAM_STR);
                  $stm->execute();
                  break;
                default:
                  $sql = "SELECT * FROM team_member WHERE class=:class AND sex=:sex AND s1=:s1";
                  $stm = $pdo->prepare($sql);
                  $stm->bindValue(':class', $class, PDO::PARAM_INT);
                  $stm->bindValue(':sex', $sex, PDO::PARAM_STR);
                  $stm->bindValue(':s1', $s1, PDO::PARAM_STR);
                  $stm->execute();
                  break;
              }
              break;
          }
          break;
        }
      } else {
        $sql = "SELECT * FROM team_member WHERE name LIKE :name0";
        $stm = $pdo->prepare($sql);
        $name0 = '%'.$name.'%';
        $stm->bindValue(':name0', $name0, PDO::PARAM_STR);
        $stm->execute();
      }
      $pdo=null;
    } catch (Exception $e) {
      echo 'データ受信失敗。';
      exit();
    }
    ?>
    <div class="container" style="padding-top:50px;">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Sex</th>
              <th>Class</th>
              <th>S1</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($stm as $row) {
              echo "<tr>";
              echo "<th>", $row['id'], "</th>";
              echo "<td>", $row['name'], "</td>";
              echo "<td>", $row['sex'], "</td>";
              echo "<td>", $row['class'], "</td>";
              echo "<td>", $row['s1'], "</td>";
              echo "</tr>";
            } ?>
          </tbody>
        </table>
      </div>
      <a href="../data/team_member_pass.php" class="btn btn-success" role="button">戻る</a>
    </div>
  </body>
</html>
