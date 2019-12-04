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

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="../../js/bootstrap.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <title>time record</title>
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
      $id = $_POST["id"];
      $style = $_POST["style"];
      $length = $_POST["length"];
      $class = $_POST["class"];
      $sex = $_POST["sex"];

      if ($id===NULL) {
        if ($class==0) {
          $sql = "SELECT * FROM team_member, time_record where team_member.id = time_record.id AND style = :style AND length = :length AND sex = :sex order by record";
          $stm = $pdo->prepare($sql);
          $stm->bindvalue(':style', $style, PDO::PARAM_STR);
          $stm->bindvalue(':length', $length, PDO::PARAM_INT);
          $stm->bindvalue(':sex', $sex, PDO::PARAM_STR);
          $stm->execute();
        } else {
          $sql = "SELECT * FROM team_member, time_record where team_member.id = time_record.id AND style = :style AND length = :length AND sex = :sex AND class = :class order by record";
          $stm = $pdo->prepare($sql);
          $stm->bindvalue(':style', $style, PDO::PARAM_STR);
          $stm->bindvalue(':length', $length, PDO::PARAM_INT);
          $stm->bindvalue(':sex', $sex, PDO::PARAM_STR);
          $stm->bindvalue(':class', $class, PDO::PARAM_STR);
          $stm->execute();
        }
      } else {
        $sql = "SELECT * FROM team_member, time_record WHERE team_member.id = time_record.id AND time_record.id = :id AND style = :style AND length = :length order by date";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        $stm->bindValue(':style', $style, PDO::PARAM_STR);
        $stm->bindValue(':length', $length, PDO::PARAM_INT);
        $stm->execute();
      }
      $pdo=null;
    } catch (Exception $e) {
      echo 'データ受信失敗。';
      exit();
    } ?>
    <div class="container" style="padding-top:50px;">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>ID</th>
              <th>Class</th>
              <th>Date</th>
              <th>Record</th>
              <th>Comment</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            $count = 0;
            if ($id===null) {
              foreach ($stm as $row) {
                $id_p = $row['id'];
                $id_check = array(0);
                if (in_array($id_p, $id_check)) {
                  $count += 100;
                  continue;
                }
                $id_check[] = $id_p;
                $count++;
                echo "<tr>";
                echo "<th>", $i, "</th>";
                echo "<th>", $id_p, "</th>";
                echo "<th>", $row['class'], "</th>";
                echo "<td>", $row['date'], "</td>";
                $record_0 = $row['record'];
                if ($record_0 < 10000) {
                  $mscd = $record_0 % 100;
                  $scd = ($record_0 - $mscd) / 100;
                  if ($mscd < 10) {$mscd = "0".$mscd;}
                  $record_1 = $scd.".".$mscd;
                } else {
                  $mscd = $record_0 % 100;
                  $scd = ($record_0 % 10000 - $mscd) / 100;
                  $min = ($record_0 - $scd*100 - $mscd) / 10000;
                  if ($mscd < 10) {$mscd = "0".$mscd;}
                  if ($scd < 10) {$scd = "0".$scd;}
                  $record_1 = $min.":".$scd.".".$mscd;
                }
                echo "<td>", $record_1, "</td>";
                echo "<td>", $row['comment'], "</td>";
                echo "</tr>";
                $i++;
              }
            } else {

            foreach ($stm as $row) {
              echo "<tr>";
              echo "<th>", $i, "</th>";
              echo "<th>", $row['id'], "</th>";
              echo "<th>", $row['class'], "</th>";
              echo "<td>", $row['date'], "</td>";
              $record_0 = $row['record'];
              if ($record_0 < 10000) {
                $mscd = $record_0 % 100;
                $scd = ($record_0 - $mscd) / 100;
                if ($mscd < 10) {$mscd = "0".$mscd;}
                $record_1 = $scd.".".$mscd;
              } else {
                $mscd = $record_0 % 100;
                $scd = ($record_0 % 10000 - $mscd) / 100;
                $min = ($record_0 - $scd*100 - $mscd) / 10000;
                if ($mscd < 10) {$mscd = "0".$mscd;}
                if ($scd < 10) {$scd = "0".$scd;}
                $record_1 = $min.":".$scd.".".$mscd;
              }
              echo "<td>", $record_1, "</td>";
              echo "<td>", $row['comment'], "</td>";
              echo "</tr>";
              $i++;
            }

          } ?>
          </tbody>
        </table>
        <?php print_r($id_check); ?>
        <?php echo $count; ?>
      </div>
      <a href="../data/record_pass.php" class="btn btn-success" role="button">戻る</a>
    </div>
  </body>
</html>
