<?php require_once("../inc/connection.php"); ?>

<?php
	$name = $_POST['fname'];  //get filter text to find like
	$query = "SELECT * from students WHERE lastName LIKE " . "\"" . $name . "%\" ORDER BY lastName ASC";
	$result = mysql_query($query);  

	echo "<table border=\"1\">"; 
	while($row = mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td><input type=\"radio\" name=\"id[]\" value=\"" . $row['id'] . "\" " . "onclick=\"studId=this.value; getStudentLessons(" . $row['id'] . ");\"></td>";
		echo "<td>" . $row['lastName'] . "</td>";
		echo "<td>" . $row['firstName'] . "</td>";
		echo "</tr>\n";
	}
	echo "</table>";  
?>

<?php require_once("../inc/closeConnection.php"); ?>
