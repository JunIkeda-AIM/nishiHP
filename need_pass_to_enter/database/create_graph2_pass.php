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
    try {
      $id = $_POST['id'];

      $sql = "SELECT * FROM team_member, inorun WHERE team_member.id = inorun.id AND inorun.id = :id order by date";
      $stm = $pdo->prepare($sql);
      $stm->bindValue(':id', $id, PDO::PARAM_INT);
      $stm->execute();
      $pdo=null;
    } catch (Exception $e) {
      echo 'データ受信失敗。';
      exit();
    } ?>
    <div class="container" style="padding-top:50px;">
      <div id="myfirstchart" style="height: 250px;">
        <script type="text/javascript">
          new Morris.Line({
            element: 'myfirstchart',
            data: [
              <?php
              $js = "";
              $j = 0;
              $ymin = 60;
              $ymax = 0;
              foreach ($stm as $row) {
                $j += 1;
                $record_0 = $row['record'];
                $scd = $record_0 % 100;
                $min = ($record_0 - $scd) / 100;
                if ($scd < 10) {$scd = "0".$scd;}
                if ($min < 10) {$min = "0".$min;}
                $record_1 = $min+round($scd/60.0,2);
                if ($min > $ymax) {$ymax = $min + 1;}
                if ($min < $ymin) {$ymin = $min;}
                $js = $js."{ date:'".$row['date']."', record: '".$record_1."'},";
              }
              $js = mb_substr($js, 0, -1);
              echo $js;
               ?>
            ],
            xkey: 'date',
            ykeys: ['record'],
            labels: ['タイム'],
            ymin: <?php echo $ymin; ?>,
            ymax: <?php echo $ymax; ?>,
            postUnits: 'min',
            resize: true
          });
        </script>
      </div>
      <a href="../data/inorun_pass.php" class="btn btn-success" role="button">戻る</a>

      <?php
      try {
        $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        echo 'データベース接続失敗。';
        exit();
      }
      try {
        $id = $_POST['id'];

        $sql = "SELECT * FROM team_member, inorun WHERE team_member.id = inorun.id AND inorun.id = :id order by date";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        $pdo=null;
      } catch (Exception $e) {
        echo 'データ受信失敗。';
        exit();
      }
        ?>
      <div class="table-responsive" style="margin-top:10px;">
        <table class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>ID</th>
              <th>Date</th>
              <th>Record</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            reset($stm);
            foreach ($stm as $row) {
              echo "<tr>";
              echo "<th>", $i, "</th>";
              echo "<th>", $row['id'], "</th>";
              echo "<td>", $row['date'], "</td>";
              $record_0 = $row['record'];
              $scd = $record_0 % 100;
              $min = ($record_0 - $scd) / 100;
              if ($scd < 10) {$scd = "0".$scd;}
              if ($min < 10) {$min = "0".$min;}
              $record_1 = $min.":".$scd;
              echo "<td>", $record_1, "</td>";
              echo "</tr>";
              $i++;
            }
             ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
