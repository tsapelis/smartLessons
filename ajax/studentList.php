<?php require_once("../inc/connection.php"); ?>

<?php
	$name = $_POST['fname'];  //get filter text to find like
	$query = "SELECT * from students WHERE lastName LIKE " . "\"" . $name . "%\" ORDER BY lastName ASC";
	$result = mysql_query($query);  

	echo "<table border=\"1\">";
	echo "<tr><th>&nbsp;</th><th>Επώνυμο</th>";
	echo "<th>Όνομα</th><th>Σταθερό</th>";
	echo "<th>Κινητό</th><th>Υπόλοιπο</th><th>Ημ/νια Δημιουργίας</th>";	
	echo "<th>Ημ/νία Τροποποίησης</th></tr>";


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
	echo "</table>";
?>

<?php require_once("../inc/closeConnection.php"); ?>
