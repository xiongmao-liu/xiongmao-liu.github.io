<?php
header("Content-type:text/html;charset=utf-8");
$LotNo=$_POST['LotNo'];
$LotNo1=$LotNo[0];
$LotNo2=$LotNo[1];

include("../common/Oracle.php");

$sql = "select a.NOC0001 as LotNo,
           b.SUD0003 AS AMOUNT,
           a.SUD0072 AS WC,
           a.SUD0059 AS NG,
           to_char(a.HIH0005,'yyyy-MM-dd') as DATA,
           a.SUD0282 AS TYPE,
           (c.cdc1503) as Sizer,
           (substr(c.dhc0007,3,3)) as ShortName,
           to_char(d.HIH0016,'yyyy-MM-dd') as DATA1,
				d.TMC0011 as DATA2
           
		   FROM A2PRASS.FMS2018 a, A2PRASS.FMS2017 b,A2PRASS.FMS2030 c,A2PRASS.FMS0001 d
		   WHERE   a.SUD0282 =b.SUD0282  and a.NOC0001 =b.NOC0001 and a.NOC0001 =d.NOC0001 and a.noc0001=c.noc0001  and  a.HIH0005   BETWEEN  TO_DATE('$LotNo1', 'yyyy-mm-dd hh24:mi') AND
       TO_DATE('$LotNo2', 'yyyy-mm-dd hh24:mi')    and (c.cdc1503='03' or c.cdc1503='15')  ORDER BY  DATA";
//echo $sql;

$rs=$conn->prepare($sql);
if ($rs->execute()) 
$row = $rs -> fetchAll(PDO::FETCH_ASSOC);
echo json_encode($row);