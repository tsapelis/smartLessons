<?php require_once("inc/session.php"); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php confirmLoggedIn(); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/statusBar.php"); ?>				
				<div id="page" style="padding:2em 0 2em 0;">
					<table style="margin:auto;" >
						<tr>
							<td><a href="students.php">Μαθητές</a></td>
							<td><a href="groups.php">Καταχώρηση Μαθημάτων</a></td>							
						</tr>
						<tr>
							<td><a href="createGroup.php">Δημιουργία Group</a></td>						
							<td><a href="logout.php">Αποσύνδεση Χρήστη</a></td>
						</tr>
					</table>
				</div>
<?php require("inc/footer.php"); ?>
