<?php
header("Content-type:text/html;charset=utf-8");
include ("../Common/mysql.php");

$Pro = $_POST['Pro'];
$Size = $_POST['Size'];
$Code = $_POST['Code'];
if ($Size == 'Bill') {
	$Type = 'B';
} else {
	$Type = 'S';
}
if ($Pro == 'Bags') {
	$sql = "INSERT INTO `bag_bar`(`Bagbar`, `Size`, `Type`) VALUES ('$Code','med','$Type')";
	$sqlkind = 2;
	$arr = executesql($sql, $sqlkind);
} else if ($Pro == 'Bag') {
	$sql = "INSERT INTO `bag_bar`(`Bagbar`, `Size`, `Type`) VALUES ('$Code','big','$Type')";
	$sqlkind = 2;
	$arr = executesql($sql, $sqlkind);
}
else if ($Pro == 'Box') {
	$sql = "INSERT INTO `box_bar`(`Boxbar`, `Type`) VALUES ('$Code','$Type')";
	$sqlkind = 2;
	$arr = executesql($sql, $sqlkind);
}
