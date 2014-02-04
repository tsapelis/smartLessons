				<div id="statusBar">
					<div id="thisD" style="float:left;padding-left:2em;">
						<script>
							var today = new Date();
							var dd = today.getDate();
							var mm = today.getMonth()+1; //January is 0!

							var weekday=new Array(7);
							weekday[0]="Κυριακή";
							weekday[1]="Δευτέρα";
							weekday[2]="Τρίτη";
							weekday[3]="Τετάρτη";
							weekday[4]="Πεμπτη";
							weekday[5]="Παρασκευή";
							weekday[6]="Σάββατο";

							var n = weekday[today.getDay()]; 

							var yyyy = today.getFullYear();
							if(dd<10) dd='0'+dd;
							if(mm<10) mm='0'+mm;

							today = n + ' ' + dd + '/' + mm + '/' + yyyy;

							document.write(today);
						</script>
					</div>
					<div style="float:right;padding-right:1em;">
						<?php echo $_SESSION['lastName'] . " " . $_SESSION['firstName']; ?>
						(<a href="logout.php">Αποσύνδεση</a>)
					</div>
				</div>
