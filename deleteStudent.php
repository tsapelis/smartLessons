<?php require_once("inc/session.php"); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php confirmLoggedIn(); ?>

<?php
	$query = "DELETE FROM students
						WHERE id = '{$_GET['id']}'";

	$result = mysql_query($query, $connection);
	if ( $result ){
		//success
		header("Location: students.php");
		exit;
	}
	else{
		echo "<p>Λάθος κατά τη διαγραφή του μαθητή.</p>";
		echo "<p>" . mysql_error() . "</p>";
	}
?>

<?php mysql_close($connection); ?>
