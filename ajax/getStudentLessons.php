<?php require_once("../inc/connection.php"); ?>
<?php require_once("../inc/functions.php"); ?>

<?php
	
	$gid = $_POST['sId'];  //get filter text to find like
	$stDate = $_POST['stDate'];
	$spDate = $_POST['spDate'];

	$dateFound = false; // date not found

	if ( !empty($stDate) && !empty($stDate) ){
		$stDate = implode("-", array_reverse(explode("/", $stDate))); // convert date to suitable format for the database

		$spDate = implode("-", array_reverse(explode("/", $spDate)));
		$spDate = date('Y-m-d', strtotime($spDate .' +1 day'));

		$dateFound = true; // date found
	}
	
	$query = "SELECT *";
	$query .= " FROM lessons";
	$query .= " WHERE studentId =" . $gid;


	if ( $dateFound ){
		$query .= " AND date>='" . $stDate . "'";
		$query .= " AND date<'" . $spDate . "'";
	}
	$query .= " ORDER BY date DESC";

	$result = mysql_query($query);  

	echo "<table id=\"studLst\" style=\"margin-top:1em;width:90%\" border=\"1\" >";
	echo "<tr><th>Ημερομηνία</th><th>Τιμή</th><th>Ώρες</th><th>Υπόλοιπο</th></tr>";

	while($row = mysql_fetch_array($result)){
		echo "<tr>";
//		echo "<td style=\"text-align:center\">" . date_format($date, 'D d/m/Y') . "</td>";
		echo "<td style=\"text-align:center\">" . getGreekDate($row['date']) . "</td>";
		echo "<td style=\"text-align:center\">" . $row['price'] . "</td>";
		echo "<td style=\"text-align:center\" id=\"" . $row['hours'] . "\">" . $row['hours'] . "</td>";
		echo "<td style=\"text-align:center\">" . $row['cost'] . "</td>";
		echo "</tr>\n";
	}
	echo "</table>";  

?>

<?php require_once("../inc/closeConnection.php"); ?>
