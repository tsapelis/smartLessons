<?php require_once("inc/session.php"); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("inc/functions.php"); ?>

<?php
	$username = strip_tags( $_POST['username'] );	
	$password = strip_tags( $_POST['passwrd'] );
	$hashedPassword = sha1( $password );

	echo "user " . $username . "<br>";
	echo "pass " . $password . "<br>";
	echo "hash " . $hashedPassword . "<br>";

?>

<?php
	$query = "SELECT id, firstName, lastName from users WHERE password='{$hashedPassword}' and username='{$username}'" ;
	echo $query;
	$result = mysql_query($query);  
	
	if ( mysql_num_rows( $result ) == 1 ){
		$user = mysql_fetch_array($result);		
		$_SESSION['userId'] = $user['id'];
		$_SESSION['firstName'] = $user['firstName'];
		$_SESSION['lastName'] = $user['lastName'];

		header("Location: main.php");
		exit;
	}	
	else{
		header("Location: index.php");
		exit;
	}
?>

<?php mysql_close($connection); ?>
