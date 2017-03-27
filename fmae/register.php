<?php
	session_start();
	$host='localhost';
	$uname='root';
	$pwd='';
	$db="contractor";
	$errorcode['register'] = 1;
	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	 
	$uname=$_REQUEST['username'];
	$name=$_REQUEST['name'];
	$pwd=$_REQUEST['pass'];
	$email=$_REQUEST['email'];
	$contact=$_REQUEST['no'];
	$rating=0;
	
	$query = "select * from `contractor detail` where Uname = '".$uname."'";
	
	$r=mysql_query($query,$con);
	if (mysql_num_rows(r) == 0)
	{
		$query = "INSERT INTO `contractor detail`(`Uname`, `Name`, `Password`, `Email`, `contact`, `Avg_rate`) VALUES ('".$uname."','".$name."','".$pwd."','".$email."','".$contact."',".$rating.")" ;
		//echo $query;
		if($r=mysql_query($query,$con))
		{
			$_SESSION['uid'] = $uname;
		
			header('Location: http://localhost/fmae/location.php');
		}
	}
	else 
	{
		$errorcode['register'] = 0;
	}
	
	mysql_close($con);
?>