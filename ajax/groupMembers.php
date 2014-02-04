<?php require_once("../inc/connection.php"); ?>

<?php
	$gid = $_POST['fname'];  //get filter text to find like
	
	$query = "SELECT subjects.id, groups.subjectId, subjects.title";
	$query .= " FROM groups";
	$query .= " INNER JOIN subjects";
	$query .= " ON subjects.id=groups.subjectId";
	$query .= " WHERE groups.id =" . $gid;
	$result = mysql_query($query);  
	$row = mysql_fetch_array($result);
	$title = $row['title'];

	$query = "SELECT students.id, students.lastName, students.firstName, groupDetails.price";
	$query .= " FROM students";
	$query .= " INNER JOIN groupDetails";
	$query .= " ON students.id=groupDetails.studentId";
	$query .= " WHERE groupid =" . $gid;

	$result = mysql_query($query);  

	echo "<table><tr><td>Αντικείμενο:</td><td>";
 	echo $title; 
	echo "</td></table><br>";

	echo "<table id=\"studLst\" style=\"margin-top:1em;width:90%\" border=\"1\" >";
	echo "<tr><th>Επώνυμο</th><th>Όνομα</th><th>Τιμή</th></tr>";

	while($row = mysql_fetch_array($result)){
		echo "<tr id=\"" . $row['id'] . "\" ondblclick=\"deleteRow(" . $row['id'] . ");\" >";
		echo "<td>" . $row['lastName'] . "</td>";
		echo "<td>" . $row['firstName'] . "</td>";
		echo "<td id=\"" . $row['price'] . "\">" . $row['price'] . "</td>";
		echo "</tr>\n";
	}
	echo "</table>";  
?>

<?php require_once("../inc/closeConnection.php"); ?>
