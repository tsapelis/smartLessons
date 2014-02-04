<?php 
	require 'settings.php';

	define("PHPMAILER", true);
	include('phpmailer/config.inc.php');
	//send the email
	$to = $your_email;
	$mailer->Subject = "=?UTF-8?B?" .base64_encode("SmartLessons Backup"). "?=";
	$mailer->Body = "first backup.";
	$mailer->AddAddress("ttsapelis@yahoo.com");

	$file_to_attach = '.';
	//$mailer->AddAttachment( $file_to_attach , 'smartlessons.sql' );
	$mailer->AddAttachment( 'smartlessons.sql' );
	
	if(!$mailer->Send()){
		echo "Σφάλμα κατα την αποστολή των στοιχείων: " . $mailer->ErrorInfo;
	}
	else{
		echo "Επιτυχής αποστολή.";
	}
?>
