<?php require_once("inc/session.php"); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php confirmLoggedIn(); ?>

<?php include("inc/header.php"); ?>
<?php include("inc/statusBar.php"); ?>
<?php include("inc/menuBar.php"); ?>
<?php 
	if( !isset($_GET['id']) || empty($_GET['id'])  ){
		header("Location: students.php");
		exit;
	}
	else{
		$std = getStudentById( $_GET['id'] );
		$lastName = $std['lastName'];
		$firstName = $std['firstName'];
		$rest = $std['rest'];
	}
?>
				<div id="navigation" style="height:2em;">			
						<h1 style="float:left;">Πληρωμή Μαθητή</h1>				
							<div style="float:right;">
							</div>
				</div>
				<div id="err" style="float:clear; color:#ff0000; font-size:14px;"></div>			
				<div id="page">
					<div style="text-align:center;margin:auto; width:100%">
						<p>
							<?php
								echo "<h3>{$lastName} {$firstName}</h3>";
							?>
						</p>
						<div style="padding:1em 0 1em 0;">
							<?php
								echo "<h3>Υπόλοιπο: {$rest}&euro;</h3>";
							?>
						</div>
						<form action="" id="frmStudentPayment" name="frmStudentPayment" method="post">
							<div>
								<table style="margin:auto; width:36%">
									<tr>
										<td>Ημερομηνία Πληρωμής:</td>
										<td><input type="text" style="width:10em;text-align:center;" name="payDate" id="payDate" /></td>
									</tr>
									<tr>
										<td>Ποσό Πληρωμής:</td>
										<td><input type="text" style="width:10em;text-align:right;" name="payAmount" id="payAmount" /></td>
									</tr>
								</table>
							</div>
							<div style="padding:1em 0 1em 0;">
								<a href="javascript:void(0)" onClick="validatePaymentForm( document.getElementById('frmStudentPayment') );" id="saveBtn">
									Αποθήκευση
								</a>
								<a href="students.php" id="cancelBtn">
									Ακύρωση
								</a>
							</div>
						</form>	
					</div>
				</div>
				<script src="./js/script.js"></script>
				<script src="http://code.jquery.com/jquery-latest.js"></script>
				<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
				<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/> 	
				<script>
					$(function() {
						$('#payDate').datepicker({ dateFormat: 'dd/mm/yy' }).val();
					});	
					$(document).ready(function(){
						var date = new Date();
						$('#payDate').datepicker('setDate', date);
					}); 
				</script>
<?php require("inc/footer.php"); ?>
