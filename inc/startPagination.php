<?php	
	$page = 1;//Default page
	$limit = 20;//Records per page
	if(isset($_GET['page']) && $_GET['page']!=''){
		$page = $_GET['page'];
		if ( $page == 0 ) $page = 1;
	}
	if(isset($_GET['limit']) && $_GET['limit']!=''){
		$limit = $_GET['limit'];
	}												
	$start=($page-1)*$limit;					
?>
