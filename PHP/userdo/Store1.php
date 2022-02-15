<?php
header("Content-type:text/html;charset=utf-8");
include ("../Common/mysql.php");



$sql="SELECT * FROM `bag` ORDER BY OutTime desc ";
$sqlkind = 1;

	$arr = executesql($sql, $sqlkind);
echo json_encode($arr);
