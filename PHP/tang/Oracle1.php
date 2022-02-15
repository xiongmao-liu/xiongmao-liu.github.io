<?php
	$tns = "  
  (DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = 163.50.16.7)(PORT = 1521))
    (CONNECT_DATA =
      (SID = PRSE)
      (SERVER = DEDICATED)
    )
  )
	       ";
	$db_username = "eprass";
	$db_password = "eprass";

	try{
	    $conn = new PDO("oci:dbname=".$tns,$db_username,$db_password);
	}catch(PDOException $e){
	    echo ($e->getMessage());
		die();
	}
?>