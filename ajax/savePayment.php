<?php
	require("../inc/config.php");

	$id = $_POST['lId'];
	$amount = $_POST['lAmnt'];
	$lDtemp = $_POST['ldt'];  //get lesson date with wrong format for saving to database
	$lDt = implode("-", array_reverse(explode("/", $lDtemp))); // convert date to suitable format for the database

	//echo $id . " " . $amount . " " . $lDtemp . " " . $lDt;
	

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

// insert payment
	$q1 = "INSERT INTO payments(studentId, amount, date) ";
	$q1 .= "VALUES({$id}, {$amount}, '{$lDt}')";
	//$r = $mysqli->query($q1);
echo $q1 . "<br>";

// update student rest
	$q1 = "UPDATE students ";
	$q1 .= "SET rest = rest - {$amount} ";
	$q1 .= "WHERE id = {$id}";

	//$r = $mysqli->query($q1);
echo $q1 . "<br>";

	$qr = "SELECT * FROM lessons ";
	$qr .= "WHERE studentId={$id} AND cost<>0 ";
	$qr .= "ORDER BY date ASC ";
//echo "<br>Connection Ok!";

	$r = $mysqli->query($qr);

	while($build = mysqli_fetch_array($r)){
		echo $build[id] . " " . $build[date] . " " . $build[hours] . " " . $build[cost] . "<br>"; 
	}

		/*if ( !$r ){
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
*/
	$mysqli->close();

?>

