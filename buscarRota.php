<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "GET"){
  $endereco = $_GET["endereco"];
  $sql =<<<EOF
  select * from rota;
EOF;
  $ret = pg_query($db, $sql);
  $amigo = pg_last_error();
  // echo $amigo;
  if(!$ret) {
     http_response_code(501);
  } else {
        echo "<table>
    <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Age</th>
    <th>Hometown</th>
    <th>Job</th>
    </tr>";
    while($row = pg_fetch_row($ret)) {
      echo "<tr>";
      echo "<td>" . $row[0] . "</td>";
      echo "<td>" . $row[1] . "</td>";
      echo "<td>" . $row[2] . "</td>";
      echo "<td>" . $row[3] . "</td>";
      echo "<td>" . $row[4] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    //  http_response_code(200);
    //  $response["dados"] = array();
    // while($row = pg_fetch_row($ret)) {
    //   $rota = array();
    //   $rota["rotaid"] = $row[0];
    //   $rota["contrato"] = $row[1];
    //   $rota["edificio"] = $row[2];
    //   $rota["ordem"] = $row[3];
    //   $rota["endereco"] = $row[4];
    //   $rota["unidade"] = $row[5];
    //   array_push($response["dados"], $rota);


    }
    //echo json_encode($response);




  }
}

?>
