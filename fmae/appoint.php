<?php
	header('Content-type: application/json');
	$a=isset($_POST['id'])?$_POST['id']:"hello";
	$a1=isset($_POST['cid'])?$_POST['cid']:"hello";
	$a2=isset($_POST['flag'])?$_POST['flag']:"hello";
	$host='127.0.0.1';
	$uname='root';
	
	$pwd='';
	$db="contractor";
	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	$flag = $a2;
		
	if ($flag == 1)
	{
		$houseid = $a;
		$contractor_uname = $a1; // "drashti29" //$_REQUEST['cid'];
		echo $a;
		echo $a1;
		echo $a2;
		$query = "SELECT price FROM `contractor detail` where Uname = '" .$contractor_uname. "'";
		$result = mysql_query($query, $con);
		$row = mysql_fetch_array($result);
		$price = $row['price'];
		echo $price;
		$query =  "INSERT INTO assess_request (`house-id`, `uname`, `price`, `date-posted`, `status`) VALUES (" .$houseid. ",'".$contractor_uname."',".$price.",NOW(), 'not approved')";
		//print $query;
		echo $query;
		$result = mysql_query($query, $con);
		mysql_close($con);
		
	}
if ($flag == 2)
	{
		$houseid = $a;
		$contractor_uname = $a1 ;//$a1; // "drashti29" //$_REQUEST['cid'];
		$query = "UPDATE `assess_request` SET Status = 'approved' where house-id = ".$houseid." and uname = '".$contractor_uname."'";
		$result = mysql_query($query, $con);
		$query = "UPDATE `assess_request` SET Status = 'rejected' WHERE `house-id` = ".$houseid." and uname != '".$contractor_uname."'" ;
		$result = mysql_query($query, $con);
		if ($result)
		{
			$query = "INSERT INTO `contractor_notification`(`uname`,`houseid`, `message`, `noti-date`) VALUES ('".$contractor_uname."',".$houseid.",'Your request has been approved',now())";
			print $query;
			$result = mysql_query($query, $con);
			echo $result;
		}
		mysql_close($con);
	}		
		
		
	
	 
	
	
	
	

?>