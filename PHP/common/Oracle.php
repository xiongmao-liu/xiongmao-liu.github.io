<?php
	$tns = "  
	  (DESCRIPTION =
	    (ADDRESS_LIST =
	      (ADDRESS = (PROTOCOL = TCP)(HOST = 163.50.16.3)(PORT = 1521))
	    )
	    (CONNECT_DATA =
	      (SERVICE_NAME = prs2)
	    )
	  )
	       ";
	$db_username = "grie";
	$db_password = "grie";

	try{
	    $conn = new PDO("oci:dbname=".$tns,$db_username,$db_password);
	}catch(PDOException $e){
	    echo ($e->getMessage());
		die();
	}
?>