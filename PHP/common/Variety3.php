<?php
header("Content-type:text/html;charset=utf-8");
$LotNo=$_POST['LotNo'];
$LotNo1=$LotNo[0];
$LotNo2=$LotNo[1];

include("../common/Oracle.php");

$sql = "select a.NOC0001 as LotNo, 
a.CDC0043 as PROJECT,
				to_char(a.HIH0016,'yyyy-MM-dd') as DATA1,
				a.TMC0011 as DATA2,
			(substr(b.dhc0007,3,3)) as ShortName,
			b.DHC0039 as TYPENAME,
			(b.cdc1503) as Sizer
			FROM A2PRASS.FMS0001 a, A2PRASS.FMS2030 b
			WHERE a.noc0001=b.noc0001  and  a.CDC0043 in ('8100','ZZZZ')  and   a.HIH0016   BETWEEN  TO_DATE('$LotNo1', 'yyyy-mm-dd hh24:mi') AND
       TO_DATE('$LotNo2', 'yyyy-mm-dd hh24:mi')  and (b.cdc1503='03' or b.cdc1503='15')    ORDER BY  DATA1";
//echo $sql;

$rs=$conn->prepare($sql);
if ($rs->execute()) 
$row = $rs -> fetchAll(PDO::FETCH_ASSOC);
echo json_encode($row);