<?php
header("Content-type:text/html;charset=utf-8");
$LotNo=$_POST['LotNo'];
$LotNo1=$LotNo[0];
$LotNo2=$LotNo[1];

include("../common/Oracle.php");

$sql = "select a.NOC0001 as LotNo, 
			a.CDC0068 as TYPE,
			a.SUD0003 as Amount,
			to_char(a.HIH0005,'yyyy-MM-dd') as DATA,
			(substr(b.dhc0007,3,3)) as ShortName,
			b.DHC0039 as TYPENAME,
			(b.cdc1503) as Sizer,
			to_char(c.HIH0016,'yyyy-MM-dd') as DATA1,
				c.TMC0011 as DATA2
			FROM A2PRASS.FMS2016 a, A2PRASS.FMS2030 b ,A2PRASS.FMS0001 c
			WHERE a.noc0001=b.noc0001    and c.noc0001=b.noc0001    and(b.cdc1503='03' or b.cdc1503='15') and a.HIH0005   BETWEEN  TO_DATE('$LotNo1', 'yyyy-mm-dd hh24:mi') AND
       TO_DATE('$LotNo2', 'yyyy-mm-dd hh24:mi')  ORDER BY  DATA";
//echo $sql;

$rs=$conn->prepare($sql);
if ($rs->execute()) 
$row = $rs -> fetchAll(PDO::FETCH_ASSOC);
echo json_encode($row);