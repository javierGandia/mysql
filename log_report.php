<!DOCTYPE html>
<html>

  <head>
    <title>Site Visits Report</title>
  </head>

  <body>

      <h1>Site Visits Report</h1>

      <table border = '1'>
        <tr>
          <th>No.</th>
          <th>Visitor</th>
          <th>Total Visits</th>
        </tr>

        <?php
        $user = "javier"
        $password = "password"
        $database = "redis"
        $table = "contador"
        $conexion = new PDO("mysql:host=locatehost;dbname=$database", $user, $password); 

            try {
		$db = new PDO("mysql:host=mysql;dbname=$database", $user, $password);
                $siteVisitsMap = 'siteStats';

                $siteStats = 'siteStats';

                $i = 1;

                foreach ($db->query("SELECT ip, visitas FROM contador") as $row) {

                    echo "<tr>";
                      echo "<td align = 'left'>"   . $i . "."     . "</td>";
                      echo "<td align = 'left'>"   . $visitor     . "</td>";
                      echo "<td align = 'right'>"  . $totalVisits . "</td>";
                    echo "</tr>";

                    $i++;
                }

            } catch (Exception $e) {
                echo $e->getMessage();
            }

        ?>

      </table>
  </body>

</html>
