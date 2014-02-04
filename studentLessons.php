<?php require_once("inc/session.php"); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php confirmLoggedIn(); ?>
<?php include("inc/detailHeader.php"); ?>
		<?php include("inc/statusBar.php"); ?>
		<?php include("inc/menuBar.php"); ?>
		<div id="navigation" style="height:2em;">			
			<h1 style="float:left;">Ώρες Μαθητών&nbsp;</h1>
			<div style="float:right;">
				<a href="#" onclick="printStudentHours(studId);">
					Εκτύπωση
				</a>
			</div>
	</div>
	<div id="leftClmn" style="width:44%">
		Επώνυμο:<input type="text" name="name" id="name" onkeyup="getDetails();" />
		<div style="margin-top:1em;" id="msg"></div>
	</div>
	<div id="rightClmn" style="width:50%">
		<table id="lessonsDetails">
			<tr>
				<td>Έναρξη Περιόδου:</td><td><input type="text" name="startDate" id="startDate" /></td>
			</tr>
			<tr>
				<td>Λήξη Περιόδου:</td><td><input type="text" name="endDate" id="endDate" /></td>
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
	<script var stdId;></script>
	<script>
		function getDetails(){
			var name = $('#name').val(); //get the filter text
			$.ajax({
			type: "POST",
			url: "ajax/studentLessonsList.php",
			data: {fname:name}	//send filter text to groupStudentList.php
			}).done(function( result ) {
			$("#msg").html( result );
			});
		}
		function getStudentLessons(stdId){
			var strtDate = document.getElementById("startDate").value;		
			var stpDate = document.getElementById("endDate").value;		
		
			$.ajax({
			type: "POST",
			url: "ajax/getStudentLessons.php",
			data: {sId:stdId, stDate:strtDate, spDate: stpDate}	//send filter text to groupStudentList.php
			}).done(function( result ) {
			$("#studList").html( result );
			});
		}
		function printStudentHours(stdId){
			var strtDate = document.getElementById("startDate").value;		
			var stpDate = document.getElementById("endDate").value;		
			window.open('printStudentHours.php?sId=' + stdId + '&stD=' + strtDate + '&stpD=' + stpDate);
		}
		$(function() {
			$('#startDate').datepicker({ dateFormat: 'dd/mm/yy' }).val();
			$('#endDate').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		});
	
		$(document).ready(function(){
			var date = new Date();
			var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
			var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
			$('#startDate').datepicker('setDate', firstDay);
			$('#endDate').datepicker('setDate', lastDay);
		}); 
	</script>
<?php require("inc/footer.php"); ?>
