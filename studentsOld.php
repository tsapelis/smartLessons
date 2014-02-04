<?php require_once("inc/session.php"); ?>
<?php require_once("inc/connection.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php confirmLoggedIn(); ?>
<?php include("inc/header.php"); ?>
				<div id="navigation" style="height:2em;">			
						<h1 style="float:left;">Μαθητές&nbsp;</h1>
							<div style="float:left">		
								<select name="limit" id="limit" size="1" onchange="filterShow(this);">
									<?php include("inc/startPagination.php"); ?>
									<?php
										$vls = array("5", "10", "20", "30", "0");
										showOptions($vls, $limit);
									?>								
								</select>
							</div>
							<div style="float:left">
								<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
									<?php 
										if ( $_POST["fltr"] ){
											$value =  $_POST["fltr"];
										}
										else{
											$value =  "";
										}
									?>
									<input type="text" value="<?php echo $value;?>" id="fltr" name="fltr" maxlength="20">
									<input type="submit" value="Υποβολή">
									<input type="hidden" name="studId" id="studId" value="">
								</form>				
							</div>			

							<div style="float:right;">
								<a href="editStudent.php" id="addBtn">
									Προσθήκη Μαθητή
								</a>
								<a href="#" id="editBtn">
									<img src="images/edit.png">
								</a>
								<a href="#" id="deleteBtn" onClick="validateStudentDeletion(this);">
									<img src="images/delete.png" >
								</a>
							</div>
				</div>
				<div id="page">
					<table border="1">
						<tr>
						<th>&nbsp;</th>	
						<th>Επώνυμο</th>	
						<th>Όνομα</th>	
						<th>Σταθερό</th>	
						<th>Κινητό</th>	
						<th>Υπόλοιπο</th>	
						<th>Ημ/νια Δημιουργίας</th>	
						<th>Ημ/νία Τροποποίησης</th>	
						</tr>
						<?php
							//Get total records (you can also use MySQL COUNT function to count records)
							$query=mysql_query("select id from students");
							$rows=mysql_num_rows($query);

							// limit=0 means show all records
							if ( $limit == 0  ) $limit = $rows;  

							$query  = "SELECT * from students order by lastName ASC LIMIT $start, $limit";
							if ( $_POST["fltr"] ){
								$query  = "SELECT * FROM students WHERE lastName LIKE " . "\"%" . $_POST["fltr"] . "%\"";
								$query  .= " ORDER BY lastName ASC LIMIT  $start, $limit";
							}

							$result = mysql_query($query);
						
							while($row = mysql_fetch_array($result)){
								echo "<tr><td>";
								echo "<input type=\"radio\" name=\"id[]\" value=\"" . $row['id'] . "\" " . "onclick=\"linkUpdate(" . $row['id'] . ")\">";
								echo "<td>" . $row['lastName'] . "</td>";
								echo "<td>" . $row['firstName'] . "</td>";
								echo "<td>" . $row['phone'] . "</td>";
								echo "<td>" . $row['mobile'] . "</td>";
								echo "<td>" . $row['rest'] . "</td>";
								echo "<td>" . $row['creationDate'] . "</td>";
								echo "<td>" . $row['editDate'] . "</td>";
								echo "</tr>";
							}
					?>
					</table>
					<p>
						<?php
							echo pagination($limit, $page, $_SELF ,$rows); //call function to show pagination
						?>
					</p>
				</div>
				<script src="./js/script.js"></script>
<?php require("inc/footer.php"); ?>
