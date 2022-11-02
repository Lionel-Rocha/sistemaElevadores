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

      // echo "<body style='background-color:#262B51'>";
      // echo "<div style='display:flex'>";
      // echo "<p style='color:white;font-family:sans-serif'>";
      // echo "Contrato \n";
      // echo $rota["contrato"];
      // echo "</p>";
      // echo "</div>";
      //
      // echo "<div style='display:flex'>";
      // echo "<p style='color:white;font-family:sans-serif'>";
      // echo "Edifício \n";
      // echo $rota["edificio"];
      // echo "</p>";
      // echo "</div>";
      //
      // echo "<div style='display:flex'>";
      // echo "<p style='color:white;font-family:sans-serif'>";
      // echo "Unidade \n";
      // echo $rota["unidade"];
      // echo "</p>";
      // echo "</div>";
      //
      // echo "<div style='display:flex'>";
      // echo "<p style='color:white;font-family:sans-serif'>";
      // echo "Ordem \n";
      // echo $rota["ordem"];
      // echo "</p>";
      // echo "</div>";
      //
      // echo "<div style='display:flex'>";
      // echo "<p style='color:white;font-family:sans-serif'>";
      // echo "Endereço \n";
      // echo $rota["endereco"];
      // echo "</p>";
      // echo "</div>";
      //
      // echo "</body>";
    }
    // echo $amigo;
    echo json_encode($response);
    header('Location= https://sistemaelevadores.herokuapp.com/ProcuraRota.html')






  }
}

?>
