<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $nome = $_REQUEST["username"];
  $hashsenha = md5($_REQUEST["senha"]);
  $sql =<<<EOF
     INSERT INTO public.perfil (nome, email ,curso_idcurso ,hashsenha)
     VALUES ('$nome','$hashsenha' );
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret) {
     http_response_code(501);
  } else {
      header("Location: https://uniexpo.herokuapp.com/UniExpo/index.html");
  }
}

?>
