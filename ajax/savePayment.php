<?php
	require("../inc/config.php");

	$id = $_POST['lId'];
	$amount = $_POST['lAmnt'];
	$lDtemp = $_POST['ldt'];  //get lesson date with wrong format for saving to database
	$lDt = implode("-", array_reverse(explode("/", $lDtemp))); // convert date to suitable format for the database

	echo $id . " " . $amount . " " . $lDtemp . " " . $lDt;
	

	if( ( !$amount ) || ( !$lDtemp ) || ( !$lDt ) ){
		echo "Ελλειπή Στοιχεία !";
		exit;
	}
	$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$mysqli->set_charset("utf8");

	if (mysqli_connect_errno()) {
	  printf("Connection failed: %s\n", mysqli_connect_error());
	  exit();
	}
echo "<br>Connection Ok!";
/*
	$ok = true;
	$mysqli->autocommit(FALSE);	// start transaction
	for($i=0; $i<count($studIds); $i++){
		$cst = $lHr * $studVals[$i];		// calculate lesson's cost for every student
																		// insert lesson's record for every student
		$qr = "INSERT INTO lessons(groupId, studentId, hours, date, price, cost) ";
		$qr .= "VALUES ({$gId}, {$studIds[$i]}, {$lHr}, '{$lDt}', {$studVals[$i]}, {$cst})";
		$r = $mysqli->query($qr);
		if ( !$r ){
			$ok = true;
			echo $mysqli->error;
		}
																		// update student's cost
		$qr = "UPDATE students SET rest=rest+{$cst} where id={$studIds[$i]}";
		$r = $mysqli->query($qr);
		if ( !$r ){
			$ok = true;
			echo $mysqli->error;
		}		
	}
	
	if ( $ok == true ){
		$mysqli->commit();
//		echo "Τα στοιχεία καταχωρήθηκαν.";
		echo "Καταχωρήθηκέ " . $lHr .  ($lHr < 2 ? " ώρα" : " ώρες") . " για το μάθημα \"" . $gTtl . "\" στις " . $lDtemp;	
	}	
	else{
		echo "Πρόβλημα κατα την καταχώρηση!";
		$mysqli->rollback();
	}	
	$mysqli->close();
*/
?>

