<?php
defined('PHPMAILER') || die('Direct access to this file is not permitted.');
require 'class.phpmailer.php';
require 'class.smtp.php';


$mailer = new PHPMailer();
$mailer->IsSMTP(true);
$mailer->Host = 'www.proteascycling.gr';
$mailer->SMTPAuth = true;
$mailer->Port = 587;
$mailer->Username = 'info@proteascycling.gr';
$mailer->Password = '6977229699';
$mailer->CharSet='utf-8';
$mailer->ContentType = 'text/html';
$mailer->SetFrom('info@proteascycling.gr','info@proteascycling.gr');
$mailer->AddAddress('ttsapelis@yahoo.com');
?>
