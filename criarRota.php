<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $contrato = $_REQUEST["contrato"];
  $edificio = $_REQUEST["edificio"];
  $ordem = $_REQUEST["ordem"];
  $endereco = $_REQUEST["endereco"];
  $unidade = $_REQUEST["unidade"];
  $sql =<<<EOF
     INSERT INTO public.rota (contrato,edificio,ordem,endereco,unidade) VALUES ('$contrato','$edificio','$ordem','$endereco',$unidade');
EOF;
  $ret = pg_query($db, $sql);
  $amigo = pg_last_error();
  echo $amigo;
  if(!$ret) {
     echo $amigo;
  } else {
    echo $amigo;
      // header("Location: https://sistemaelevadores.herokuapp.com/index.html");
  }
}

?>
