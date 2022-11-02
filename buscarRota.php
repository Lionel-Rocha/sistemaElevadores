<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "GET"){
  $unidade = $_GET["unidade"];
  $sql =<<<EOF
  select * from rota_trabalho where unidade = '$unidade';
EOF;
  $ret = pg_query($db, $sql);
  $amigo = pg_last_error();
  // echo $amigo;
  if(!$ret) {
     http_response_code(501);
  } else {
     http_response_code(200);
     $response["dados"] = array();
    while($row = pg_fetch_row($ret)) {
      $rota = array();
      $rota["contrato"] = $row[0];
      $rota["edificio"] = $row[1];
      $rota["ordem"] = $row[2];
      $rota["endereco"] = $row[3];
      $rota["unidade"] = $row[4];
      array_push($response["dados"], $rota);

      echo "<body style='background-color:blue'>";
      echo "<div style='display:flex'>";
      echo "<p style='color:white'>";
      echo "Contrato \n";
      echo $rota["contrato"];
      echo "</p>";
      echo "</div>";

      echo "<br>";
      echo "Edifício";
      echo "\n";
      echo $rota["edificio"];
      echo "<br>";
      echo "Unidade";
      echo "\n";
      echo $rota["unidade"];
      echo "<br>";
      echo "Ordem";
      echo "\n";
      echo $rota["ordem"];
      echo "<br>";
      echo "Endereço";
      echo "\n";
      echo $rota["endereco"];
      echo "<br>";
      echo "</body>";
    }
    echo $amigo;
    json_encode($response);







  }
}

?>
