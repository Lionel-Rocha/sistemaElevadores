<?php
include ("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $dataAbertura = $_REQUEST["dataAbertura"];
  $contrato = $_REQUEST["contrato"]);
  $unidade = $_REQUEST["unidade"];
  $descricaoPendencia = $_REQUEST["descricaoPendencia"];
  $dataResolucao = $_REQUEST["dataResolucao"];
  $codigoPendencia = $_REQUEST["codigoPendencia"];
  $reparo = $_REQUEST["reparo"];
  $codigoPeca = $_REQUEST["codigoPeca"];
  $CodPrioridade = $_REQUEST["CodPrioridade"];
  $obra = $_REQUEST["obra"];
  $observacao = $_REQUEST["observacao"];
  $sql =<<<EOF
  insert into public.pendencia(dataAbertura, contrato, unidade, descricaoPendencia, dataResolucao, codigoPendencia, reparo, codigoPeca, CodPrioridade, obra, observacao) values ('$dataAbertura','$contrato','$unidade','$descricaoPendencia','$dataResolucao','$codigoPendencia','$reparo','$codigoPeca','$CodPrioridade','$obra','$observacao');
EOF;
  $ret = pg_query($db, $sql);
  $amigo = pg_last_error();
  if(!$ret) {
     echo $amigo;
  } else {
      header("Location: https://sistemaelevadores.herokuapp.com/telaVisualizacao.html");
  }
}


?>
