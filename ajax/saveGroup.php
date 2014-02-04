<?php
	require("../inc/config.php");

	$title = $_POST['gTitle'];  //get group title 
	$subject = $_POST['gSubId'];  //get group title 

	$studIds = $_POST['lIds'];
	$studVals = $_POST['lVals'];

	if( ( !$title ) || ( !$subject ) || ( count($studIds)<=0 ) ){
		echo "Ελλειπή Στοιχεία !";
		exit;
	}

//	INSERT INTO `lessons`( `date`) VALUES ('2013-12-28 13:55:43')

	$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$mysqli->set_charset("utf8");

	if (mysqli_connect_errno()) {
	  printf("Connect failed: %s\n", mysqli_connect_error());
	  exit();
	}

	$ok = true;

	$mysqli->autocommit(FALSE);	// start transaction
	$r = $mysqli->query("INSERT INTO groups(subjectId, title) VALUES ({$subject}, '{$title}')");
	$gId = $mysqli->insert_id;  // grab last inserted group Id
	
	for($i=0; $i<count($studIds); $i++){
		$r = $mysqli->query("INSERT INTO groupDetails(groupId, studentId, price) VALUES ({$gId}, {$studIds[$i]}, {$studVals[$i]})");
		if ( !$r ){
			$ok = true;
			echo $mysqli->error;
		}
	}
	
	if ( $ok == true ){
		$mysqli->commit();
		echo "Τα στοιχεία καταχωρήθηκαν.";
	}	
	else{
		echo "Πρόβλημα κατα την καταχώρηση!";
		$mysqli->rollback();
	}
	
	$mysqli->close();
?>

