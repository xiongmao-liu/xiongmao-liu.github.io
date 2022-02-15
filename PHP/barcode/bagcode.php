<?php
header("Content-type:text/html;charset=utf-8");
include ("../common/mysql.php");


$sql="SELECT * FROM `bag_bar` order by  Bagbar   desc";
$sqlkind = 1;

	$arr = executesql($sql, $sqlkind);
echo json_encode($arr);
