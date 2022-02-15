<?php
header("Content-type:text/html;charset=utf-8");
include ("../Common/mysql.php");

$OpNo = $_POST['OpNo'];
$LotNo = $_POST['LotNo'];
$ShortName = $_POST['ShortName'];

$Pweight = $_POST['Pweight'];



$Weight = $_POST['Weight'];
$Weight1 = $_POST['Weight1'];
$Weight2 = $_POST['Weight2'];
$Weight3 = $_POST['Weight3'];
$Weight4 = $_POST['Weight4'];



$sql="INSERT INTO `bag`(`Op`, `LotNo`, `ShortName`, `Pweight`, `Weight`, `Weight1`, `Weight2`, 
`Weight3`, `Weight4`, `OutTime`) VALUES ('$OpNo','$LotNo','$ShortName','$Pweight','$Weight','$Weight1',
'$Weight2','$Weight3','$Weight4',now())";
$sqlkind = 2;

	$arr = executesql($sql, $sqlkind);
echo json_encode($arr);