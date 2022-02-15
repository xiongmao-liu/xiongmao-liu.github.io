<?php
header("Content-type:text/html;charset=utf-8");
include ("../Common/mysql.php");

$OpNo = $_POST['OpNo'];
$LotNo = $_POST['LotNo'];
$ShortName = $_POST['ShortName'];
$Sweight = $_POST['Sweight'];
$Pweight = $_POST['Pweight'];



$Weight = $_POST['Weight'];
$Amount = $_POST['Amount'];
$Low = $_POST['Low'];
$High = $_POST['High'];
$BLK = $_POST['BLK'];
$Fweight = $_POST['Fweight'];

$Plan = $_POST['Plan'];



$sql="INSERT INTO `part`(`LotNo`, `OpNo`, `ShortName`, `Sweight`, `Amount`, `Pweight`, `Pamount`, 
`Fweight`, `Flow`, `Fhigh`, `Plan`,`Weight`,`InTime`) VALUES 
('$LotNo','$OpNo','$ShortName','$Sweight','$Amount','$Pweight','$BLK',
'$Fweight','$Low','$High','$Plan','$Weight',now()) ";
$sqlkind = 2;

	$arr = executesql($sql, $sqlkind);
echo json_encode($arr);