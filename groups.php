<?php require_once("inc/session.php"); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php confirmLoggedIn(); ?>
<?php include("inc/detailHeader.php"); ?>
		<?php include("inc/statusBar.php"); ?>
		<?php include("inc/menuBar.php"); ?>
		<div id="navigation" style="height:2em;">			
			<h1 style="float:left;">Groups&nbsp;</h1>
			<div style="float:right;">
				<a href="javascript:void(0);" onclick="checkLesson(grpId, grpTitle, 'lessonDate', 'lessonHours', 'studLst');">
					Αποθήκευση
				</a>
				<a href="#">
					Ακύρωση
				</a>
			</div>
	</div>
	<div id="msg"></div>
	<div id="leftClmn" style="width:44%">
		Τίτλος:<input type="text" name="name" id="name" onkeyup="getDetails();" />
		<div style="margin-top:1em;" id="list"></div>
	</div>
	<div id="rightClmn" style="width:50%">
		<table id="lessonsDetails">
			<tr>
				<td>Ημερομηνία:</td><td><input type="text" name="lessonDate" id="lessonDate" /></td>
			</tr>
			<tr>
				<td>Ώρες:</td><td><input type="text" value="1" name="lessonHours" id="lessonHours" /></td>
			</tr>
		</table>
		<div id="studList" style="padding-bottom:1em;">
			<table id="studLst" style="margin-top:1em;width:90%" border="1" >
				<tr>
					<th>Επώνυμο</th>
					<th>Όνομα</th>
					<th>Τιμή</th>
				</tr>
			</table>	
		</div>
	</div>
	<script src="./js/script.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/> 
	<script var grpId, grpTitle;></script>
	<script>
		function getDetails(){
			var name = $('#name').val(); //get the filter text
			$.ajax({
			type: "POST",
			url: "ajax/groupList.php",
			data: {fname:name}	//send filter text to groupStudentList.php
			}).done(function( result ) {
			$("#list").html( result );
			});
		}
		function getGroupMembers(gid){
			$.ajax({
			type: "POST",
			url: "ajax/groupMembers.php",
			data: {fname:gid}	//send filter text to groupStudentList.php
			}).done(function( result ) {
			$("#studList").html( result );
			});
		}
		$(function() {
			$('#lessonDate').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		});
	</script>
	<script>
		 document.getElementById("lessonDate").value = getCurrentDate();
	</script>
<?php require("inc/footer.php"); ?>
