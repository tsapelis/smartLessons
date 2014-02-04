<?php
	session_start();

	function confirmLoggedIn(){
		if ( !isset($_SESSION['userId']) ){
			header("Location: login.php");
			exit;
		}
	}
?>
