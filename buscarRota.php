<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "GET"){
  $endereco = $_GET["endereco"];
  $sql =<<<EOF
  select * from rota where endereco = '$endereco'
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret) {
     http_response_code(501);
  } else {
     http_response_code(200);
     $response["dados"] = array();
    while($row = pg_fetch_row($ret)) {
      $rota = array();
      $rota["rotaid"] = $row[0];
      // $rota["contrato"] = $row[1];
      // $rota["edificio"] = $row[2];
      // $rota["ordem"] = $row[3];
      // $rota["endereco"] = $row[4];
      // $rota["unidade"] = $row[5];
      array_push($response["dados"], $rota);
    }
    echo $response;
    // echo json_encode($response);
    // header("Location: https://sistemaelevadores.herokuapp.com/rota.html");
  }
}

?>
