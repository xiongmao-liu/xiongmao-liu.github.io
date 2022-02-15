<?php
header("Content-type:text/html;charset=utf-8");
include ("../common/mysql.php");


$sql="SELECT * FROM `box_bar` order by Boxbar desc";
$sqlkind = 1;

	$arr = executesql($sql, $sqlkind);
echo json_encode($arr);
