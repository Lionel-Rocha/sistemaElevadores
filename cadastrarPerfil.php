<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $nome = $_REQUEST["username"];
  $hashsenha = md5($_REQUEST["senha"]);
  $sql =<<<EOF
     INSERT INTO public.pessoa (username,password) VALUES ('$nome','$hashsenha');
EOF;
  $ret = pg_query($db, $sql);
  
  if(!$ret) {
     echo "não foi";
  } else {
      header("Location: https://uniexpo.herokuapp.com/UniExpo/index.html");
  }
}

?>
