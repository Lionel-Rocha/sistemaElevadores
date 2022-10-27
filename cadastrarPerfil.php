<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $nome = $_REQUEST["username"];
  $hashsenha = md5($_REQUEST["senha"]);
  $sql =<<<EOF
     INSERT INTO public.pessoa (username,password) VALUES ('$nome','$hashsenha');
EOF;
  $ret = pg_query($db, $sql);
  $amigo = pg_last_error();
  if(!$ret) {
     echo $amigo;
  } else {
      header("Location: https://sistemaelevadores.herokuapp.com/index.html");
  }
}

?>
