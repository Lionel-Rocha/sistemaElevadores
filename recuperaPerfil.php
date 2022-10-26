<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "GET"){
  $email = $_GET["username"];

  $sql =<<<EOF
     select * from Pessoa where username = '$username';
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret) {
     http_response_code(501);
  } else {
     http_response_code(200);
     $response["perfis"] = array();
    while($row = pg_fetch_row($ret)) {
      $perfil = array();
      $perfil["id"] = $row[0];
      $perfil["nome"] = $row[1];
      $perfil["senha"] = $row[2];
      array_push($response["perfis"], $perfil);
    }
    echo json_encode($response);
  }
}

?>