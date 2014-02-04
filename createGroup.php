<?php require_once("inc/session.php"); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php confirmLoggedIn(); ?>
<?php include("inc/detailHeader.php"); ?>
			<?php include("inc/statusBar.php"); ?>
			<?php include("inc/menuBar.php"); ?>
		<div id="navigation" style="height:2em;">			
			<h1 style="float:left;">Μαθητές&nbsp;</h1>
			<div style="float:right;">
				<a href="#" onclick="saveGroup();">
					Αποθήκευση
				</a>
				<a href="#" onclick="alert(stdVals);">
					Ακύρωση
				</a>
			</div>
	</div>
	<div id="leftClmn" style="width:44%">
		Επώνυμο:<input type="text" name="name" id="name" onkeyup="getDetails();" />
		<div style="margin-top:1em;" id="msg"></div>
	</div>
	<div id="rightClmn" style="width:50%">
		<table>
			<tr>
				<td>Τίτλος:</td><td><input type="text" name="groupTitle" id="groupTitle" /></td>
			</tr>
			<tr>
				<td>Αντικείμενο:</td>
				<td>
					<?php echo showSubjectsOptions(); ?>
				</td>
		</table>
		<div style="padding-bottom:1em;">
			<table style="margin-top:1em;width:90%" border="1" id="studList">
				<tr>
					<th>Επώνυμο</th>
					<th>Όνομα</th>
					<th>Τιμή</th>
				</tr>
			</table>	
		</div>
	</div>
	<script>
		var stdIds = new Array;	//Global List with students Ids for the group creation
		var stdVals = new Array;	//Global List with student value for the group creation
	</script>
	<script src="./js/script.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script>
		function getDetails(){
			var name = $('#name').val(); //get the filter text
			$.ajax({
			type: "POST",
			url: "ajax/groupStudentList.php",
			data: {fname:name}	//send filter text to groupStudentList.php
			}).done(function( result ) {
			$("#msg").html( result );
			});
		}

		function saveGroup(){
			var title = $('#groupTitle').val(); //get group description
			var subject = $('#groupSubject').val(); //get group subject
			$.ajax({
			type: "POST",
			url: "ajax/saveGroup.php",
			data: {gTitle: title, gSubId: subject, lIds: stdIds, lVals: stdVals}	//send title saveGroup.php
			}).done(function( result ) {
			$("#msg").html( result );
			});
		}
	</script>
<?php require("inc/footer.php"); ?>
