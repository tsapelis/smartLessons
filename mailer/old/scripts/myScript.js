function checkemail(param){
  str = param.value
  var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i

  if (filter.test(str)){
	return true;
  }
  else{
	return false;
  }
  return true;
}

function validate_required(field){
  with (field){
	if (value==null||value==""){
		return false;
	}
	else{
		return true;
	}
  }
}

function isValidDate(dateStr) {
// Checks for the following valid date formats:
// MM/DD/YY   MM/DD/YYYY   MM-DD-YY   MM-DD-YYYY
// Also separates date into month, day, and year variables

  var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{2}|\d{4})$/;

// To require a 4 digit year entry, use this line instead:
// var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/;

  var matchArray = dateStr.match(datePat); // is the format ok?
  if (matchArray == null) {
	return false;
  }
  day = matchArray[1]; // parse date into variables
  month = matchArray[3];
  year = matchArray[4];
  if (month < 1 || month > 12) { // check month range
	return false;
  }
  if (day < 1 || day > 31) {
	return false;
  }
  if ((month==4 || month==6 || month==9 || month==11) && day==31) {
	return false
  }
  if (month == 2) { // check for february 29th
	var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
	if (day>29 || (day==29 && !isleap)) {
		return false;
    }
  }
  return true;  // date is valid
}