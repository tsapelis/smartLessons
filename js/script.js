function checkLesson(grpId, grpTtl, lDate, lHours, studsTbl){
  var ld = document.getElementById(lDate).value;
  var lh = document.getElementById(lHours).value;
	var table = document.getElementById(studsTbl);
	var rows = table.getElementsByTagName("tr");

	var sId = new Array();
	var sVal = new Array();

	for (var i=1; i<rows.length; i++){
		var cells = rows[i].getElementsByTagName("td");
		sId.push( rows[i].id );
		sVal.push( cells[2].id );
	}
	
	if ( !lh || !ld  ){
		alert("Ελλειπή Στοιχεία!");
	}
	else{
		saveLesson(grpId, grpTtl, ld, lh, sId, sVal);
	}
}

function saveLesson(gId, gTtl, lDt, lHr, stdTbl, stdVls){
	$.ajax({
	type: "POST",
	url: "../sm/ajax/saveLesson.php",
	data: {lgId: gId, lgTtl: gTtl, llDt: lDt, llHr: lHr, lstdTbl: stdTbl, lstdVls: stdVls}	//send to saveLesson.php
	}).done(function( result ) {
	$("#msg").html( result );
	});

}

function deleteRow(rowid){   
  var row = document.getElementById(rowid);
  var table = row.parentNode;
  while ( table && table.tagName != 'TABLE' )
      table = table.parentNode;
  if ( !table )
      return;
  table.deleteRow(row.rowIndex);
}

function getCurrentDate(){
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!

	var yyyy = today.getFullYear();
	if(dd<10) dd='0'+dd;
	if(mm<10) mm='0'+mm;
	today = dd + '/' + mm + '/' + yyyy;

	return today;
}

function removeFromGroupList(stdId, lId, lVal){
	var index = lId.indexOf(stdId);

	document.getElementById("studList").deleteRow(index+1); // delete student from html table row = index + 1

	if (index > -1) {
		  lId.splice(index, 1);
		  lVal.splice(index, 1);
	}
}

function updateStudentList(Object, fName, lName, stdId, lId, lVal){
	var	inputList =	Object.getElementsByTagName("input");
	var tmp = "";
	stdValue = inputList[0].value;

	tmp = "<tr id=\"" + stdId  + "\" ondblclick=\"removeFromGroupList(this.id, stdIds, stdVals);\">";
	tmp = tmp + "<td>" + lName + "</td><td>" + fName + "</td><td>" + stdValue + "</td></tr>";

	document.getElementById('studList').innerHTML =  document.getElementById('studList').innerHTML + tmp;

	lId[ lId.length ] = stdId;
	lVal[ lVal.length ] = stdValue;
}

function validateStudentDeletion(tForm){
	var dBtn = document.getElementById("deleteBtn");	
	var id = document.getElementById("studId");
	var t = confirm("Να διαγραφεί ο μαθητής;");	
	
	if( (t == true) && ( id.value ) ){
		dBtn.setAttribute("href", "deleteStudent.php?id=" + id.value);
	}
	else{ //if confirmation answer is Cancel stay at the same page.
		dBtn.setAttribute("href", "#");
	}
}

function getDateTime(){
	var cd = new Date();
	var dt = cd.getFullYear() + "-" + (cd.getMonth()+1) + "-" + cd.getDate() + "  " + cd.getHours() + ":" + cd.getMinutes() + ":" + cd.getSeconds();

	return dt;
}

function validateStudentForm(thisform){  
	with (thisform){  
		document.getElementById("err").style.padding="1em 0 1em 2em";
		if (validate(studentSurname)==false){ 
			document.getElementById('err').innerHTML =  "Το επώνυμο  απαιτείται!";
			studentSurname.focus();
			return false;
		}
		if (validate(studentName)==false){ 
			document.getElementById('err').innerHTML =  "Το όνομα απαιτείται!";
			studentName.focus();
			return false;
		}
		if (validate(studentPrice)==false){ 
			document.getElementById('err').innerHTML =  "Η τιμή απαιτείται!";
			studentPrice.focus();
			return false;
		}
		if (isNaN(Number(studentPrice.value))==true){ 
			document.getElementById('err').innerHTML =  "Η τιμή είναι αριθμητική τιμή!";
			studentPrice.focus();
			return false;
		}

		submit();
	}
}

function validatePaymentForm(id, thisform, dt){  
	with (thisform){  
		document.getElementById("msg").style.padding="1em 0 1em 2em";

		if (isNaN(Number(payAmount.value))==true){ 
			document.getElementById('msg').innerHTML =  "Το ποσό πληρωμής είναι αριθμητική τιμή!";
			payAmount.focus();
			return false;
		}

		if (validate(payAmount)==false){ 
			document.getElementById('msg').innerHTML =  "Το ποσό πληρωμής απαιτείται!";
			payAmount.focus();
			return false;
		}
	}
	savePayment(id, payAmount.value, dt);
}

function savePayment(id, amount, dt){
	$.ajax({
	type: "POST",
	url: "../sm/ajax/savePayment.php",
	data: {lId: id, lAmnt: amount, ldt: dt}	//send to savePayment.php
	}).done(function( result ) {
	$("#msg").html( result );
	});
}

function validate(field){
  with (field){
		if (value==null||value==""){
			return false;
		}
		else{
			return true;
		}
  }
}

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

function linkUpdate(id){
	var dBtn = document.getElementById("deleteBtn");
	var edBtn = document.getElementById("editBtn");
	var payBtn = document.getElementById("payBtn");

	var std = document.getElementById("studId");

	edBtn.setAttribute("href", "editStudent.php?id=" + id);
	dBtn.setAttribute("href", "deleteStudent.php?id=" + id);
	payBtn.setAttribute("href", "studentPayment.php?id=" + id);
	std.value = id;
}

function filterShow(sel){
	var pg = getUrlVars()["page"];
	var value = sel.options[sel.selectedIndex].value;
	var url = location.pathname.substring(1);
	var fileName = url.substring(url.lastIndexOf('/') + 1);
	
	if( !pg ) pg = 1;
	
	window.open(fileName + "?limit=" + value + "&page=" + pg,"_self")
}
