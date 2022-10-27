<?php
$host        = "ec2-44-206-11-200.compute-1.amazonaws.com";
$port        = "port = 5432";
$dbname      = "dbname = d150o1hra5udor";
$credentials = "user = dnkjvdrahpifir password=96eb96960fa8074df89cde9089eb23a61bf56b62ee25dd16f04a95da1d3e941f";
$db = pg_connect( "$host $port $dbname $credentials"  );
	if(!$db) {
				echo $host;
	      echo "Error : Unable to open database\n";
	 } else {
	      echo "Opened database successfully\n";
	}

?>
