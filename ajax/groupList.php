<?php require_once("../inc/connection.php"); ?>

<?php
	$name = $_POST['fname'];  //get filter text to find like
	$query = "SELECT * from groups WHERE title LIKE " . "\"%" . $name . "%\" ORDER BY id DESC";
	$result = mysql_query($query);  

	echo "<table border=\"1\">"; 
	while($row = mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td><input type=\"radio\" id=\"groupList\" name=\"groupList\"  value=\"" . $row['id'] . "\" " . "onclick=\"grpId=this.value;grpTitle=$(this).parent().next('td').text();getGroupMembers(" . $row['id'] . ");\"></td>";
		echo "<td>" . $row['title'] . "</td>";
		echo "</tr>\n";
	}
	echo "</table>";  
?>

<?php require_once("../inc/closeConnection.php"); ?>
