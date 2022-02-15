<?php
header("Content-type:text/html;charset=utf-8");
include ("../Common/mysql.php");

$Amount= $_POST['Amount'];
$Low1= $_POST['Low1'];
$High1= $_POST['High1'];
$Weight= $_POST['Weight'];
$arr=[];
if($Amount < $Low1){
	$arr[0]='';
}
 if($Low1 < $Amount  && $Amount < $High1){
	$arr[1]['BLK']='1';
	$arr[1]['TIPS']='分割数为1';
	$arr[1]['WEIGHT']= $Weight;
}

 if(2*$Low1 < $Amount  && $Amount < 2*$High1){
	$arr[2]['BLK']='2';
	$arr[2]['TIPS']='分割数为2';
		$arr[2]['WEIGHT']= round($Weight /2, 2);
}

if(3*$Low1 < $Amount  && $Amount < 3*$High1){
	$arr[3]['BLK']='3';
	$arr[3]['TIPS']='分割数为3';
	$arr[3]['WEIGHT']= round($Weight /3, 2);
}

 if(4*$Low1 < $Amount  && $Amount < 4*$High1){
	$arr[4]['BLK']='4';
	$arr[4]['TIPS']='分割数为4';
	$arr[4]['WEIGHT']= round($Weight /4, 2);
}

 if($Amount > 4*$High1){
	$arr[5]='';
	
}



if($arr ==null){
	$arr=[];
	echo json_encode($arr);
}else{
	echo json_encode($arr);
}
