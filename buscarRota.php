<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "GET"){
  $endereco = $_GET["endereco"];
  //echo $endereco;
  $sql =<<<EOF
  select * from rota;
EOF;
  $ret = pg_query($db, $sql);
  $amigo = pg_last_error();
  echo $amigo;
  if(!$ret) {
     http_response_code(501);
  } else {
     http_response_code(200);
     $response["dados"] = array();
    while($row = pg_fetch_row($ret)) {
      $rota = array();
      $rota["rotaid"] = $row[0];
      $rota["contrato"] = $row[1];
      $rota["edificio"] = $row[2];
      $rota["ordem"] = $row[3];
      $rota["endereco"] = $row[4];
      $rota["unidade"] = $row[5];
      array_push($response["dados"], $rota);
    }
    echo json_encode($response);
    // echo json_encode($response);
    header("Location: https://sistemaelevadores.herokuapp.com/rota.html");
  }
}

?>
