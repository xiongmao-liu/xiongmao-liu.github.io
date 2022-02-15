<?php
header("Content-type:text/html;charset=utf-8");

include ("../tang/mysql.php");
include("../tang/Oracle.php");

$data = array();


//$sql=" SELECT * FROM `mach`";
//	$sqlkind =1;
//$arr = executesql($sql, $sqlkind);
//for ($i = 0; $i <count($arr); $i++) {
//$MachNo =  $arr[$i]['MachNo'];
	  $sql = "
select * from (select a.NOC0002 as MachNo, 
			a.NOC0055  as Vnumber,
            a.CDC0001B as OpNo,
            a.SUD0315 as BlkNo,
            a.SUD0316 as Amount,
            to_char(a.HIH0002,'yyyy-mm-dd')||' '||a.TMC0002 as ENDTIME
			FROM A2PRASS.FMS2028 a 
			WHERE  a.NOC0002='E42'   order by ENDTIME desc) 
            where rownum = 1";

//echo $sql;
   $sqla = "select  a.*,b.NOC0001 as LotNo  from  ($sql) a  ,A2PRASS.FMS2028 b where  a.Vnumber = b.NOC0055
    ";
	
	$sqlb="select a.*,
			(b.cdc1503||substr(b.dhc0007,3,3)||b.cdc1507) as ShortName,
			(b.cdc1503) as Sizer
		
			FROM  ($sqla) a,A2PRASS.FMS2030 b
			WHERE a.LOTNO=b.noc0001      ";
$rs=$conn->prepare($sqlb);
if ($rs->execute()) 
$row = $rs -> fetchAll(PDO::FETCH_ASSOC);
echo json_encode($row);
  
	
	
	
	
//}

  
 
   //echo json_encode($data);
  
  
     //echo json_encode($arr);
    


