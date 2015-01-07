function validateForm() {
    var x = document.forms["new"]["fullname"].value,
    	y = document.forms["new"]["phonenumber"].value;

    if (x==null || x=="") {
        alert("Задалжително Въведете Имена");
        return false;
    }
    if (y==null || y=="") {
    	alert("Задължително Въведете Номер");
    	return false
    };
}
function validateEdit(){
	var x = document.forms["edit"]["forUpdate"].value
	if (x==null || x=="") {
		alert("Задължително Въведете Номер за редактиране");
		return false;
	};
}
function validateRemove(){
	var x = document.forms["remove"]["forRemove"].value
	if (x==null || x=="") {
		alert("Задължително Въведете Номер за изтриване");
		return false;
	};
}