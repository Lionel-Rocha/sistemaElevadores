<!-- <?php -->
<!-- $shop = array( array("title"=>"rose", "price"=>1.25 , "number"=>15), -->
<!--                array("title"=>"daisy", "price"=>0.75 , "number"=>25), -->
<!--                array("title"=>"orchid", "price"=>1.15 , "number"=>7) -->
<!--              ); -->
<!-- ?> -->
<!-- <?php if (count($shop) > 0): ?> -->
<!-- <table> -->
<!--   <thead> -->
<!--     <tr> -->
<!--       <th><?php echo implode('</th><th>', array_keys(current($shop))); ?></th> -->
<!--     </tr> -->
<!--   </thead> -->
<!--   <tbody> -->
<!-- <?php foreach ($shop as $row): array_map('htmlentities', $row); ?> -->
<!--     <tr> -->
<!--       <td><?php echo implode('</td><td>', $row); ?></td> -->
<!--     </tr> -->
<!-- <?php endforeach; ?> -->
<!--   </tbody> -->
<!-- </table> -->
<!-- <?php endif; ?> -->

<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "GET"){
  $endereco = $_GET["endereco"];
  $sql =<<<EOF
  select * from rota;
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
      $rota["rotaid"] = $row[0];
      $rota["contrato"] = $row[1];
      $rota["edificio"] = $row[2];
      $rota["ordem"] = $row[3];
      $rota["endereco"] = $row[4];
      $rota["unidade"] = $row[5];
      array_push($response["dados"], $rota);


    }
    print_r($rota);
    ?>