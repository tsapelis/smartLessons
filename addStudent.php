<?php require_once("inc/session.php"); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php confirmLoggedIn(); ?>
<?php include("inc/header.php"); ?>
				<div id="navigation" style="height:2em;">			
						<h1 style="float:left;">Προσθήκη Μαθητή</h1>				
							<div style="float:right;">
								<a href="#" onClick="validateStudentForm( document.getElementById('frmAddStudent') );" id="saveBtn">
									Αποθήκευση
								</a>
								<a href="students.php" id="cancelBtn">
									Ακύρωση
								</a>
							</div>
				</div>
				<div id="err" style="float:clear; color:#ff0000; font-size:14px;"></div>			
				<div id="page">
	  			<form action="saveStudent.php" id="frmAddStudent" name="frmAddStudent" method="post">
						<table>
						  <tr>
								<td>*Επώνυμο:</td>
								<td><input type="text" value="" id="studentSurname" name="studentSurname" maxlength="20"></td>
								<td>Ημ/νία Δημιουργίας:</td>
								<td><input type="text" value="" id="studentCreation" name="studentCreation" maxlength="20" readonly></td>
							</tr>
							<tr>
								<td>*Όνομα:</td>
								<td><input type="text" value="" id="studentName" name="studentName" maxlength="20"></td>
								<td>Ημ/νία Τροποποίησης:</td>
								<td><input type="text" value="" id="studentEdit" name="studentEdit" maxlength="20" readonly></td>
							</tr>
							<tr>
								<td>Κινητό:</td>
								<td><input type="text" value="" id="studentMobile" name="studentMobile" maxlength="10"></td>
								<td>Σχόλια:</td>
								<td rowspan="3"><textarea id="studentRemarks" name="studentRemarks"  rows="5" cols="40"></textarea></td>
							</tr>
							<tr>
								<td>Σταθερό:</td>
								<td><input type="text" value="" id="studentPhone" name="studentPhone" maxlength="10"></td>
							</tr>
							<tr>	
								<td>*Τιμή:</td>
								<td><input type="text" value="" id="studentPrice" name="studentPrice"></td>
							</tr>
						</table>		
					</form>	
				</div>
				<script src="./js/script.js"></script>
				<script>
					var dt = getDateTime();
					document.getElementById("studentCreation").value = dt;
					document.getElementById("studentEdit").value = dt;	
				</script>
<?php require("inc/footer.php"); ?>
