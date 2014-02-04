<?php 
 	require_once("inc/session.php"); 
 	require_once("inc/connection.php"); 
 	require_once("inc/functions.php"); 
	require_once('pdf/config/tcpdf_config_alt.php');
	require_once('pdf/tcpdf.php');

	confirmLoggedIn(); 
	$std = getStudentById( $_GET['sId'] );
	$stDate = $_GET['stD'];
	$spDate = $_GET['stpD'];
	$gid = $std['id'];

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
	$query .= " ORDER BY date ASC";

	$result = mysql_query($query);  

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tsapelis Thanasis');
$pdf->SetTitle('Απολογισμός Περιόδου');
$pdf->SetSubject('SmartLessons');
$pdf->SetKeywords('SmartLessons, Απολογισμός Περιόδου');

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->setFontSubsetting(true);
$pdf->SetFont('dejavusans', '', 9, '', true);

$pdf->AddPage();
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
$html = <<<EOD
<table style="text-align:left">
	<tr>
		<td colspan="5" style="text-align:center; "><h3>Απολογισμός Περιόδου</h3></td>
	</tr>
	<tr>
		<td colspan="5" style="text-align:center; "><h4>{$std['lastName']} {$std['firstName']}</h4></td>
	</tr>
	<tr>
		<td style="text-align:center;width: 180px">&nbsp;</td>
		<td colspan="2" style="text-align:center;width: 150px"><h4>Από: {$_GET['stD']}</h4></td>
		<td colspan="2" style="text-align:left;"><h4>Έως: {$_GET['stpD']}</h4></td>
	</tr>
EOD;

$s = 0;
$t = "";
while($row = mysql_fetch_array($result)){
	$date = date_create( $row['date'] );

	$t .= "<tr>";
	$t .= "<td>&nbsp;</td>";
//	$t .= "<td colspan=\"2\" style=\"text-align:center;\">" . date_format($date, 'D d/m/Y') . "</td>";
	$t .= "<td colspan=\"2\" style=\"text-align:center;\">" . getGreekDate($row['date']) . "</td>";
	$t .= "<td style=\"text-align:right;width:80px;\">" . $row['hours'] . "</td>";
	$t .= "<td>&nbsp;</td>";
	$t .= "</tr>";

	$s += $row['hours'];
}


$html .= <<<EOD
	{$t}
	<tr>
		<td colspan="3">&nbsp;</td>
		<td style="text-align:right;width:80px;">Συνολο: {$s}</td>
		<td>&nbsp;</td>
	</tr>
</table>
EOD;

$pdf->writeHTMLCell(0, 0, 0, '', $html, 0, 1, 0, true, 'L', true);
$pdf->Output('summary.pdf', 'I');

