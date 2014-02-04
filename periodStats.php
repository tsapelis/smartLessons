<?php require_once("inc/session.php"); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php confirmLoggedIn(); ?>
<?php include("inc/detailHeader.php"); ?>
		<?php include("inc/statusBar.php"); ?>
		<?php include("inc/menuBar.php"); ?>
		<div id="navigation" style="height:2em;">			
			<h1 style="float:left;">Απολογισμός Περιόδου&nbsp;</h1>
			<div style="float:right;">
			</div>
	</div>
	<div style="background:white;" id="parameters">
		<div style="padding:0.5em 0 0.5em 2em;border-bottom:solid 1px #c0c0c0;">
			<table>
				<tr>
					<td>Έναρξη Περιόδου:</td><td><input type="text" name="startDate" id="startDate" /></td>
				</tr>
				<tr>
					<td>Λήξη Περιόδου:</td><td><input type="text" name="endDate" id="endDate" /></td>
					<td><input type="button" name="calc" value="Υπολογισμός" id="calc" onclick="getDetails();"/></td>
				</tr>
			</table>
		</div>
	</div>
	<div id="leftClmn" style="width:44%">
		<div id="grpList" style="padding-bottom:1em;">
			<table style="margin-top:1em;width:90%" border="1" >
				<tr>
					<th>Τίτλος</th>
					<th>Ώρες</th>
				</tr>
			</table>	
		</div>
	</div>
	<div id="rightClmn" style="width:50%">		
		<div id="studList" style="padding-bottom:1em;">
			<table style="margin-top:1em;width:90%" border="1" >
				<tr>
					<th>Επώνυμο</th>
					<th>Όνομα</th>
					<th>Ποσό</th>
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
			var strtDate = document.getElementById("startDate").value;		
			var stpDate = document.getElementById("endDate").value;		
		
			getGroupsStats(strtDate, stpDate);
			getStudentsStats(strtDate, stpDate);
		}
		function getGroupsStats(sDate, eDate){
			$.ajax({
			type: "POST",
			url: "ajax/getGroupsStats.php",
			data: {stDate:sDate, spDate: eDate}	//send filter text to groupStudentList.php
			}).done(function( result ) {
			$("#grpList").html( result );
			});
		}
		function getStudentsStats(sDate, eDate){
			$.ajax({
			type: "POST",
			url: "ajax/getStudentsStats.php",
			data: {stDate:sDate, spDate: eDate}	//send filter text to groupStudentList.php
			}).done(function( result ) {
			$("#studList").html( result );
			});
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
