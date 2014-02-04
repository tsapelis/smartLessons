<?php require_once("../inc/connection.php"); ?>
<?php require_once("../inc/functions.php"); ?>

<?php
	
	$stDate = $_POST['stDate'];
	$spDate = $_POST['spDate'];

	$dateFound = false; // date not found

	if ( !empty($stDate) && !empty($stDate) ){
		$stDate = implode("-", array_reverse(explode("/", $stDate))); // convert date to suitable format for the database

		$spDate = implode("-", array_reverse(explode("/", $spDate)));
		$spDate = date('Y-m-d', strtotime($spDate .' +1 day'));

		$dateFound = true; // date found
	}

	$query = "SELECT DISTINCT groups.title, sum( hours ) AS sHrs";
	$query .= " FROM `lessons`";
	$query .= " INNER JOIN groups ON lessons.groupId = groups.id";

	if ( $dateFound ){
		$query .= " WHERE date>='" . $stDate . "'";
		$query .= " AND date<'" . $spDate . "'";
	}
	$query .= " GROUP BY studentId";

	$result = mysql_query($query);  
	$s = 0;

	echo "<table style=\"margin-top:1em;width:90%\" border=\"1\" >";
	echo "<tr><th>Τίτλος</th><th>Ώρες</th></tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td style=\"text-align:center\">" . $row['title'] . "</td>";
		echo "<td style=\"text-align:center\">" . $row['sHrs'] . "</td>";
		echo "</tr>\n";
		$s += $row['sHrs'];
	}
	echo "<td style=\"text-align:center;font-weight:bold;\">Σύνολο</td>";
	echo "<td style=\"text-align:center;font-weight:bold;\">" . $s . "</td>";
	echo "</table>";  

?>

<?php require_once("../inc/closeConnection.php"); ?>
