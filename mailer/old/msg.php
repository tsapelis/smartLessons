<?php
date_default_timezone_set(Europe/Athens);
$date = date('d/m/Y', time());

$body = "<p>&nbsp;</p><center>".
  "<h1 style=\"font-size:16pt;\">Ποδηλατικός Σύλλογος Πρωτέας</h1>".
  "<p style=\"font-size:12pt;\">Αναπαύσεως 63 & Καλοκαιρινού, Κερατσίνι  & Πλατεία Εθνικής Αντίστασης, Σαλαμίνα</p>".
  "<p style=\"font-size:12pt;\">Τηλ : 2104650365, 2104640870, 697759265 FAX : 2104650395, 2104650674</p>".
  "<p style=\"font-size:12pt;\">url : www.proteascycling.gr e-mail : info@proteascycling.gr<br></p>".
  
  "<h2 style=\"font-size:16pt;\">$title</h2>".
  "<p style=\"font-size:13pt;\"><b>Υπεύθυνη Δήλωση</b>".
  "<table width=\"50%\" border=\"1\" style=\"font-size:14pt;\">".
    "<tr>".
	  "<td>Επώνυμο</td>".
	  "<td>$surname</td>".
	"</tr>".
	"<tr>".
	 " <td>Όνομα</td>".
	  "<td>$name</td>".
	"</tr>".
	"<tr>".
	  "<td>Ημ/νία γέννησης</td>".
	  "<td>$birthdate</td>".
	"</tr>".
	"<tr>".
	  "<td>Τηλέφωνο Επικοινωνίας</td>".
	  "<td>$phone</td>".
	"</tr>".
	"<tr>".
	  "<td>e-mail</td>".
	  "<td>$visitor_email</td>".
	"</tr>".
	"<tr>".
	  "<td>Σύλλογος</td>".
	  "<td>$team</td>".
	"</tr>".
  "</table>".
  "</p>".
"</center>".
"<p style=\"font-size:11pt;\"><br>Με την παρούσα δηλώνω υπεύθυνα ότι με την συμμετοχή μου στον αγώνα αποδέχομαι τους κανονισμούς της προκήρυξης και ότι είμαι απολύτως υγιής για την συμμετοχή μου στον αγώνα, αντιλαμβανόμενος όλους τους πιθανούς κινδύνους που απορρέουν από την συμμετοχή μου σε αυτόν.".
"</p><p style=\"font-size:11pt;\">Συμμετέχω αποκλειστικά και μόνο με δική μου ευθύνη και παράλληλα αναγνωρίζω ότι οι διοργανωτές, όπως και κάθε πρόσωπο που εργάζεται και εμπλέκεται με οποιοδήποτε τρόπο στη διοργάνωση του συγκεκριμένου αγώνα, δεν φέρουν καμία απολύτως ευθύνη απέναντί μου για τυχόν τραυματισμό μου, καταστροφή ή απώλεια προσωπικού εξοπλισμού ή αντικειμένων, πριν κατά τη διάρκεια ή και μετά τον αγώνα.".
"</p><p style=\"font-size:11pt;\">Επίσης δηλώνω υπεύθυνα ότι δεν απαιτώ καμιά αποζημίωση για φωτογραφίες, βίντεο, στιγμιότυπα, αποτελέσματα με προσωπικά μου στοιχεία ή συνεντεύξεις κατά τη διάρκεια της διοργάνωσης, που τυχόν θα χρησιμοποιηθούν από τον διοργανωτή ή τους χορηγούς για ενημερωτικούς ή διαφημιστικούς σκοπούς κατά τη διάρκεια και μετά τη λήξη της διοργάνωσης. ".
"<br>&nbsp;<br>&nbsp;</p>".
"<center>".
  "<table border=\"0\" style=\"font-size:11pt;\">".
    "<tr>".
	  "<td>Ημερομηνία</td>".
	  "<td>$date</td>".
	  "<td width=\"100px\"> </td>".
	  "<td>Υπογραφή</td>".
	  "<td>.........................</td>".
	"</tr>".
  "</table>".
"</center>";
?>