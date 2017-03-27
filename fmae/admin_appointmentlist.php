<?php
	
	$host='127.0.0.1';
	$uname='root';
	$pwd='';
	$db="contractor";
	$flag['code'] = 0;
	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");

	$query = "SELECT * FROM assess_request where status = 'not approved' ORDER BY `assess_request`.`price`";
	//print $query;
	$result = mysql_query($query, $con);
	
	$emparray = array();
	while($row=mysql_fetch_array($result , MYSQL_ASSOC))
	{
		$row_array['houseid'] = $row['house-id'];
		$row_array['uname'] = $row['uname'];
		$row_array['price'] = $row['price'];
		$row_array['date'] = $row['date-posted'];// and your respective cols
		array_push($emparray,$row_array);
		
	}
	echo (json_encode(array('cart'=> $emparray)));
	mysql_close($con);

?>