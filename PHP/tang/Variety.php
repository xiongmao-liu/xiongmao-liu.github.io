<?php
header("Content-type:text/html;charset=utf-8");
$LotNo=$_POST['LotNo'];
include("../tang/Oracle.php");

$sql = "select a.NOC0001 as LotNo, 
			a.DHC0039 as TypeName,
			(b.cdc1503||substr(b.dhc0007,3,3)||b.cdc1507) as ShortName,
			(b.cdc1503) as Sizer,
			c.SUD0001 as Amount
			FROM A2PRASS.FMS0001 a, A2PRASS.FMS2030 b,A2PRASS.FMS2013 c
			WHERE a.noc0001=b.noc0001   and  c.noc0001=b.noc0001   and a.NOC0001='$LotNo' ";

//echo $sql;

$rs=$conn->prepare($sql);
if ($rs->execute()) 
$row = $rs -> fetchAll(PDO::FETCH_ASSOC);
echo json_encode($row);