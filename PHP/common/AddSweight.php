<?php
header("Content-type:text/html;charset=utf-8");
include ("../Common/mysql.php");


$ShortName = $_POST['ShortName'];
$sql="INSERT INTO `sweight`(`ShortName`, `Weight`, `Low1`, `High1`, `Low2`, `High2`,`InTime`) VALUES ('$ShortName','-','-','-','-','-',now())";
$sqlkind = 2;

	$arr = executesql($sql, $sqlkind);
echo json_encode($arr);