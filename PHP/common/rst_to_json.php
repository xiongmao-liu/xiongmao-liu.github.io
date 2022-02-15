<?php
$rsArr = $conn -> execute($sql);
$array = array();
while (!$rsArr -> eof) {
	$fcount = $rsArr -> fields -> Count;
	for ($i = 0; $i <= $fcount - 1; $i++) {
		$rsname = $rsArr -> fields[$i] -> name;
		$rsvalue = $rsArr -> fields[$i] -> value;
//		if ($rsname == "systime") {
//			$rsvalue = date('Y-m-d H:i:s', strtotime($rsvalue));
//		}
		$result[$rsname] = $rsvalue;
	};
	$array[] = $result;
	$rsArr -> movenext();
}
echo json_encode($array);
