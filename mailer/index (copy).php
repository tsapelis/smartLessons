<?php 
require 'settings.php';

session_start();
$errors = '';
$surname = '';
$name = '';
$visitor_email = '';
$birthdate = '';
$phone = '';
$team = '';

if(isset($_POST['submit'])){
	
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$visitor_email = $_POST['email'];
	$birthdate = $_POST['birthdate'];
	$phone = $_POST['phone'];
	$team = $_POST['team'];
	require 'msg.php';
	///------------Do Validations-------------
	if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0){
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors .= "\n Ο κωδικός δεν είναι ο σωστός!";
	}
	
	if(empty($errors)){
		
		define("PHPMAILER", true);
		include('phpmailer/config.inc.php');
		//send the email
		$to = $your_email;
		$mailer->Subject = "=?UTF-8?B?" .base64_encode($title). "?=";
		$mailer->Body = $body;
		$mailer->AddAddress($to);
		$mailer->AddAddress($visitor_email);
		
		$mailer->AddAddress("ttsapelis@yahoo.com");
		
		if(!$mailer->Send()){
			echo "Σφάλμα κατα την αποστολή των στοιχείων: " . $mailer->ErrorInfo;
		}
		else{
			header('Location: submit.php');
		}
	}
}
?>
