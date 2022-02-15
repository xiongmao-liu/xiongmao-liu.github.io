<?php
header("Content-type:text/html;charset=utf-8");
include ("../Common/mysql.php");



$sql="SELECT * FROM `sweight` ORDER BY`InTime` desc";
$sqlkind = 1;
$arr = executesql($sql, $sqlkind);
echo json_encode($arr);
