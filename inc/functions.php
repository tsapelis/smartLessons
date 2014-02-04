<?php
function getGreekDate($dt){
	//$date = date_create( $d );
	$t = strtotime($dt);
	$d = getdate($t);
	$day = date('D', $d[0]);

	switch ($day){ 
		case "Mon": 
			$dayGr="Δευτέρα"; 
			break; 
		case "Tue": 
			$dayGr="Τρίτη"; 
			break; 
		case "Wed": 
			$dayGr="Τετάρτη"; 
			break; 
		case 'Thu': 
			$dayGr="Πέμπτη"; 
			break; 
		case "Fri": 
			$dayGr="Παρασκεύη"; 
			break; 
		case "Sat": 
			$dayGr="Σαββάτο"; 
			break; 
		case "Sun": 
			$dayGr="Κυριακή"; 
			break; 
		default:
			$dayGr="Τίποτα"; 
	} 
	return $dayGr . ' ' . date('d', $d[0]) . '/' . date('m', $d[0]) . '/' . date('Y', $d[0]);
//return $dayGr;
}

function showSubjectsOptions(){
	global $connection;

	$query = "SELECT * ";
	$query .= "FROM subjects";
	$rSet = mysql_query($query, $connection);

	$r = "<select name=\"groupSubject\" id=\"groupSubject\">";

	while( $row = mysql_fetch_array($rSet) ){
		$r .= "<option value=\"". $row['id'] . "\">" . $row['title'] . "</option>";
	}
	
	$r .= "</select>";
	return $r;
}

function getStudentById($studId){
	global $connection;

	$query = "SELECT * ";
	$query .= "FROM students ";
	$query .= "WHERE id=" . $studId . " ";
	$query .= "LIMIT 1";
	$rSet = mysql_query($query, $connection);

	$stud = mysql_fetch_array($rSet);
	if( $stud ){
		return $stud;
	}
	else{
		return NULL;
	}
}

function showOptions($v, $lmt){
	for($i=0; $i<count($v); $i++){
		if( $v[$i] == "0" ){
			$q = "<option value=\"$v[$i]\"";
			if ($lmt == 0) $q .=  " selected=\"selected\" ";				
			$q .=  ">Όλοι</option>";								
			echo $q;
		}
		else if ( $v[$i] == $lmt ){
			echo "<option value=\"$v[$i]\" selected=\"selected\">$v[$i]</option>";
		}
		else{
			echo "<option value=\"$v[$i]\">$v[$i]</option>";								
		}
	}
}

function pagination($per_page = 10, $page = 1, $url = '', $total){
	$adjacents = "2";
	$page = ($page == 0 ? 1 : $page);
	$start = ($page - 1) * $per_page;

	$prev = $page - 1;
	$next = $page + 1;
	$lastpage = ceil($total/$per_page);
	$lpm1 = $lastpage - 1;

	$pagination = "$page / $lastpage<br>";
	if ( $lastpage == 1 &&  $page == 1 ){
		$pagination .= ""; // print everything in one page;
	}
	else if ( $page == 1 ){
		$pagination .= "Αρχική" . " Προηγούμενη";
		$pagination .= "<a href=\"{$url}?limit={$per_page}&page={$next}\"> Επόμενη</a>";
		$pagination .= "<a href=\"{$url}?limit={$per_page}&page={$lastpage}\"> Τελευταία</a>";
	}
	else if ( $page == $lastpage ){
		$pagination .= "<a href=\"{$url}?limit={$per_page}&page=1\"> Αρχική</a>";		
		$pagination .= "<a href=\"{$url}?limit={$per_page}&page={$prev}\"> Προηγούμενη</a>";
		$pagination .= " Επόμενη";
		$pagination .= " Τελευταία";
	}
	else{
		$pagination .= "<a href=\"{$url}?limit={$per_page}&page=1\"> Αρχική</a>";		
		$pagination .= "<a href=\"{$url}?limit={$per_page}&page={$prev}\"> Προηγούμενη</a>";
		$pagination .= "<a href=\"{$url}?limit={$per_page}&page={$next}\"> Επόμενη</a>";
		$pagination .= "<a href=\"{$url}?limit={$per_page}&page={$lastpage}\"> Τελευταία</a>";
	}

	return $pagination;
}

?>
