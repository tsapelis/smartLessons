<?php require_once("inc/connection.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php include("inc/header.php"); ?>
					<div id="navigation" style="height:2em;">			
						<h1 style="float:left;">Είσοδος Χρήστη</h1>				
							<div style="float:right;">
								
							</div>
				</div>
				<div id="err" style="float:clear; color:#ff0000; font-size:14px;">
				<?php	
						if (isset($_GET['logout']) && $_GET['logout'] == 1) {
							$message = "Επιτυχής Αποσύνδεση.";
							echo "<p>" . $message . "</p>";
						} 
				?>
				</div>			
				<div id="page">
	  			<form action="login.php" id="loginFrm" name="loginFrm" method="post">
						<table>
						  <tr>
								<td>Όνομα Χρήστη:</td>
								<td><input type="text" id="username" name="username" maxlength="20"></td>
							</tr>
							<tr>
								<td>Κωδικός Πρόσβασης:</td>
								<td><input type="password" id="passwrd" name="passwrd" maxlength="20"></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td style="text-align:right;"><input  type="submit" value="Είσοδος"></td>														
							</tr>
						</table>		
					</form>	
				</div>
				<script>
					window.onload = function() {
						document.getElementById("username").focus();
					};
				</script>
<?php require("inc/footer.php"); ?>
