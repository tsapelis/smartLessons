<?php	
	require("config.php");
	$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
	
	if(!$connection){
		die ("Error connection failed" . mysql_error());
	}
	
	$db_select = mysql_select_db(DB_NAME, $connection);
	if(!$connection){
		die ("Error selection failed" . mysql_error());
	}	 
	
	mysql_set_charset('utf8',$connection);
?>
