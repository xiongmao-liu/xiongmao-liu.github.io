<?php
	//创建ADO连接for Access
	date_default_timezone_set('PRC');
	$conn = @new COM("ADODB.Connection", NULL, 65001) or die ("ADO连接失败!");
	$connstr = "DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=" . realpath($path);
	$conn->Open($connstr);