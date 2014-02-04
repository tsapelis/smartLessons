<?php require_once("inc/session.php"); ?>
<?php require_once("inc/connection.php"); ?>

<?php confirmLoggedIn(); ?>

<?php
backup_tables();


function backup_tables(){
	$tables = array();
	$result = mysql_query('SHOW TABLES');

	while($row = mysql_fetch_row($result)){
			$tables[] = $row[0];
	}

	foreach($tables as $table){
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);
	
		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";

		for ($i = 0; $i < $num_fields; $i++){
			while($row = mysql_fetch_row($result)){
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++){
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { 
						$return.= '"'.$row[$j].'"' ; 
					} 
					else{
						$return.= '""'; 
					}
					if ($j<($num_fields-1)){ 
						$return.= ','; 
					}
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}

	//$handle = fopen('backUp/db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
	$handle = fopen('backUp/db-backup-'.time().'.sql','w+');
	fwrite($handle,$return);
	fclose($handle);

	echo "End of backUp!";
}
?>
