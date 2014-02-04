<?php require_once("inc/session.php"); ?>
<?php confirmLoggedIn(); ?>
<?php include("inc/detailHeader.php"); ?>
			<?php include("inc/statusBar.php"); ?>
			<?php include("inc/menuBar.php"); ?>
				<div id="navigation">			
						<h1 style="float:left;">Μαθητές&nbsp;</h1>
							<div style="float:left">
								Επώνυμο:<input type="text" name="name" id="name" onkeyup="getDetails();" />
							</div>			
							<div style="float:right;">
								<a href="editStudent.php" id="addBtn">
									Προσθήκη 
								</a>
								<a href="javascript:void(0);" id="editBtn">
									<img src="images/edit.png">
								</a>
								<a href="studentPayment.php" id="payBtn">
									Πληρωμή
								</a>
								<a href="javascript:void(0);" id="deleteBtn" onClick="validateStudentDeletion(this);">
									<img src="images/delete.png" >
								</a>
							</div>
				</div>
				<div id="page">					
					<div style="margin-top:1em;" id="msg"></div>

				</div>
				<script src="./js/script.js"></script>
				<script src="http://code.jquery.com/jquery-latest.js"></script>
				<script>
					function getDetails(){
						var name = $('#name').val(); //get the filter text
						$.ajax({
						type: "POST",
						url: "ajax/studentList.php",
						data: {fname:name}	//send filter text to groupStudentList.php
						}).done(function( result ) {
						$("#msg").html( result );
						});
					}
				</script>
				<script>
					 document.getElementById("thisD").value = getCurrentDate();
				</script>
<?php require("inc/footer.php"); ?>
