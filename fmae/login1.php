<?php
	session_start();
	$host='localhost';
	$uname='root';
	$pwd='';
	$db="contractor";

	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	 
	$uname= $_REQUEST['username'];
	$pwd= $_REQUEST['pass'];
	$flag['code']=0;
	$query = "SELECT * FROM `contractor detail` where Uname = '" .$uname. "' and Password = '".$pwd. "'" ;
	$result = mysql_query($query, $con);
	
	if(mysql_num_rows($result) == 1)
	{
		$flag['code'] = 1;
		$_SESSION['uid'] = $uname;
		header('Location: http://localhost/fmae/location.php');
	}
	
?>