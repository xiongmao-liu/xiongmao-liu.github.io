<?php
header("Content-type:text/html;charset=utf-8");


include("../tang/Oracle1.php");

$sqla = "select  b.*  from  EPRASS.FMS2142 b where b.NOC0002 ='D16' and  rownum = 1
    ";
	
	$rs=$conn->prepare($sqla);
if ($rs->execute()) 
$row = $rs -> fetchAll(PDO::FETCH_ASSOC);
echo json_encode($row);
