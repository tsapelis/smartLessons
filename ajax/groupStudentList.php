<?php require_once("../inc/connection.php"); ?>

<?php
	$name = $_POST['fname'];  //get filter text to find like
	$query = "SELECT * from students WHERE lastName LIKE " . "\"" . $name . "%\" ORDER BY lastName ASC";
	$result = mysql_query($query);  

	echo "<table border=\"1\">"; 
	while($row = mysql_fetch_array($result)){
		echo "<tr ondblclick=\"updateStudentList(this, '" . $row['firstName'] . "', '" . $row['lastName'] . "', '" . $row['id'] . "', stdIds, stdVals)\">";
		echo "<td>" . $row['lastName'] . "</td>";
		echo "<td>" . $row['firstName'] . "</td>";
		echo "<td>" . "<input type=\"text\" name=\"id[]\" size=\"1\" value=\"" . $row['sugPrice'] . "\" " . ">" . "</td>";
		echo "</tr>\n";
	}
	echo "</table>";  
?>

<?php require_once("../inc/closeConnection.php"); ?>
