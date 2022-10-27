<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "GET"){
  $username = $_GET["username"];
  $hashsenha = md5($_GET["password"]);
  $sql =<<<EOF
     select * from pessoa where username = '$username' and password = '$hashsenha';
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret) {
     http_response_code(501);
  } else {
     http_response_code(200);
     $response["pessoa"] = array();
     $podeir = false;
    while($row = pg_fetch_row($ret)) {
      $podeir = true;
      break;
    }
    if($podeir){
      echo json_encode($response);
      //echo '<script src="pacote.js"> setarInfo() </script>';
      header('Location: https://sistemaelevadores.herokuapp.com/telaVisualizacao.html');
    }
    else{
      header('Location: https://sistemaelevadores.herokuapp.com/login.html');
    }

  }
}

?>