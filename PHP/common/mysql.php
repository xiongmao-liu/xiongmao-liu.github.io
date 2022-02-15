<?php
date_default_timezone_set('Etc/GMT-8');	
function db_connect(){
	$dbhost = '10.81.22.247';  	// mysql服务器主机地址
	$dbuser = 'admin';            // mysql用户名
	$dbpass = 'admin';				// mysql用户名密码
	$dbname = 'cu';          
	$result = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if(! $result )
	{
	    die('Could not connect: ' . mysqli_error());
	}
	//插入里有中文
	mysqli_query($result , "set names utf8");
	if(!$result)
		return false;
	$result->autocommit(true);
	return $result;	
	echo '数据库连接成功！';
}

function db_result_to_array($result){
	$res_array = array();
	for($count=0; $row=$result->fetch_assoc();$count++)
//			for($colcount=0; $colcount<= $row; $colcount++){
//				$row[colcount]=iconv('')
//			}
//			$res_array[$count]=array('oplevel'=>$row['oplevel'],'opname'=>iconv('gb2312','UTF-8',$row['opname']));
		$res_array[$count]=$row;
	return $res_array;
}

function executesql($sql,$sqlkind){
    $conn = db_connect();  
    $result = @$conn ->query($sql);
    if($sqlkind==2){
    	if($result) 
    		return true;
		else
			return false;
    }    
        
    
	if($sqlkind==1){
		$num_cats = @$result ->num_rows;
		if($num_cats == 0)  
        	return [];
		$result = db_result_to_array($result);
    	return $result;		
		mysqli_free_result($retval);
		mysqli_close($conn);    	
	}
	return true;
}

function JSON($array) {
    arrayRecursive($array, 'urlencode', true);
    $json = json_encode($array);
    return urldecode($json);
}
?>