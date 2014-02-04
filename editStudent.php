<?php require_once("inc/session.php"); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php confirmLoggedIn(); ?>

<?php include("inc/header.php"); ?>
<?php include("inc/statusBar.php"); ?>
<?php include("inc/menuBar.php"); ?>
<?php 
	if( !isset($_GET['id']) || empty($_GET['id'])  ){
		$lastName = "";
		$firstName = "";
		$mobile = "";
		$phone = "";
		$price = "";
		$remarks = "";
		$saveId = "";
	}
	else{
		$std = getStudentById( $_GET['id'] );
		$lastName = $std['lastName'];
		$firstName = $std['firstName'];
		$mobile = $std['mobile'];
		$phone = $std['phone'];
		$price = $std['sugPrice'];
		$remarks = $std['remarks'];
		$creationDate = $std['creationDate'];
		$saveId = "?id=" . $_GET['id'];
	}
?>
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
	  			<form action="saveStudent.php<?php echo $saveId;?>" id="frmAddStudent" name="frmAddStudent" method="post">
						<table>
						  <tr>
								<td>*Επώνυμο:</td>
								<td><input type="text" value="<?php echo $lastName; ?>" id="studentSurname" name="studentSurname" maxlength="20"></td>
								<td>Ημ/νία Δημιουργίας:</td>
								<td><input type="text" value="<?php echo $creationDate; ?>" id="studentCreation" name="studentCreation" maxlength="20" readonly></td>
							</tr>
							<tr>
								<td>*Όνομα:</td>
								<td><input type="text" value="<?php echo $firstName; ?>" id="studentName" name="studentName" maxlength="20"></td>
								<td>Ημ/νία Τροποποίησης:</td>
								<td><input type="text" value="" id="studentEdit" name="studentEdit" maxlength="20" readonly></td>
							</tr>
							<tr>
								<td>Κινητό:</td>
								<td><input type="text" value="<?php echo $mobile; ?>" id="studentMobile" name="studentMobile" maxlength="10"></td>
								<td>Σχόλια:</td>
								<td rowspan="3"><textarea id="studentRemarks" name="studentRemarks" rows="5" cols="40"><?php echo $remarks; ?></textarea></td>
							</tr>
							<tr>
								<td>Σταθερό:</td>
								<td><input type="text" value="<?php echo $phone; ?>" id="studentPhone" name="studentPhone" maxlength="10"></td>
							</tr>
							<tr>	
								<td>*Τιμή:</td>
								<td><input type="text" value="<?php echo $price; ?>" id="studentPrice" name="studentPrice"></td>
							</tr>
						</table>		
					</form>	
				</div>
				<script src="./js/script.js"></script>
				<script>
					var dt = getDateTime();
					<?php
						if( !isset($_GET['id']) || empty($_GET['id'])  ){
							echo"document.getElementById(\"studentCreation\").value = dt;\n";
							echo "document.getElementById(\"studentEdit\").value = dt;";	
						}
						else{
							echo "document.getElementById(\"studentEdit\").value = dt";	
						}
					?>
				</script>
<?php require("inc/footer.php"); ?>
