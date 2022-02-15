<?php
header("Content-type:text/html;charset=utf-8");
include ("../Common/mysql.php");

$op = $_POST['op'];

$sql="SELECT * FROM `oplist` where `OpNo` ='$op' ";
$sqlkind = 1;

	$arr = executesql($sql, $sqlkind);
echo json_encode($arr);
