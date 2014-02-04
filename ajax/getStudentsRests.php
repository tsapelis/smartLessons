<?php require_once("../inc/connection.php"); ?>
<?php require_once("../inc/functions.php"); ?>

<?php

	$query = "SELECT students.lastName, students.firstName, rest";
	$query .= " FROM students";
	$query .= " WHERE rest!=0";

	$result = mysql_query($query);  
	$s = 0;

	echo "<table style=\"margin-top:1em;width:90%\" border=\"1\" >";
	echo "<tr><th>Επώνυμο</th><th>Όνομα</th><th>Υπόλοιπο</th></tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td style=\"text-align:center\">" . $row['lastName'] . "</td>";
		echo "<td style=\"text-align:center\">" . $row['firstName'] . "</td>";
		echo "<td style=\"text-align:center\">" . $row['rest'] . "</td>";
		echo "</tr>\n";
		$s += $row['rest'];
	}
	echo "<td style=\"text-align:center;font-weight:bold;\">&nbsp;</td>";
	echo "<td style=\"text-align:center;font-weight:bold;\">Σύνολο</td>";
	echo "<td style=\"text-align:center;font-weight:bold;\">" . $s . "</td>";
	echo "</table>";  

?>

<?php require_once("../inc/closeConnection.php"); ?>
