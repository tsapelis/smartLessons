<?php require_once("inc/session.php"); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php confirmLoggedIn(); ?>
<?php
	$studentSurname = strip_tags( $_POST['studentSurname'] );	
	$studentName = strip_tags( $_POST['studentName'] );
	$studentPhone = strip_tags( $_POST['studentPhone'] );
	$studentMobile = strip_tags( $_POST['studentMobile'] );
	$studentPrice = strip_tags( $_POST['studentPrice'] );
	$studentCreation = strip_tags( $_POST['studentCreation'] );
	$studentEdit = strip_tags( $_POST['studentEdit'] );
	$studentRemarks = strip_tags( $_POST['studentRemarks'] );
?>

<?php

	if( !isset($_GET['id']) || empty($_GET['id'])  ){
		$query = "INSERT INTO students(
							lastName, firstName, phone, mobile, sugPrice, creationDate, editDate, remarks
							) VALUES (
							'{$studentSurname}', '{$studentName}', '{$studentPhone}', '{$studentMobile}', {$studentPrice}, '{$studentCreation}', 								'{$studentEdit}', '{$studentRemarks}'
							)";	
	}
	else{
		$query = "UPDATE students
							SET lastName = '{$studentSurname}', firstName = '{$studentName}', 
									phone = '{$studentPhone}', mobile = '{$studentMobile}', 
									sugPrice = '{$studentPrice}', creationDate = '{$studentCreation}', 
									editDate = '{$studentEdit}', remarks = '{$studentRemarks}'
							WHERE id = '{$_GET['id']}'";	
	}

	$result = mysql_query($query, $connection);
	if ( $result ){
		//success
		header("Location: students.php");
		exit;
	}
	else{
		echo "<p>Λάθος κατά την καταχώρηση του μαθητή.</p>";
		echo "<p>" . mysql_error() . "</p>";
	}
?>

<?php mysql_close($connection); ?>
