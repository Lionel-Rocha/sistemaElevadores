<?php
$host        = "host = ec2-3-220-207-90.compute-1.amazonaws.com";
$port        = "port = 5432";
$dbname      = "dbname = da3ju6ghk04hj1";
$credentials = "user = sakculthzsfedk password=e9e45652bb953a10531321726133c4c45ed359eca9239e94d1db219dc0784e51";
$db = pg_connect( "$host $port $dbname $credentials"  );
	if(!$db) {
	      echo "Error : Unable to open database\n";
	 } else {
	      echo "Opened database successfully\n";
	}

?>