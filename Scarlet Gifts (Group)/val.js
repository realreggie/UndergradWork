 <script  type="text/javascript">
	function validateForm() {
	var a = document.forms["myForm"]["fname"].value;
	var b = document.forms["myForm"]["lname"].value;
	var c = document.forms["myForm"]["city"].value;
	
	if (a == null || a == " ") {
	alert("First name must be filled out");
	return false;
	};
	if (b==null || b==" ") {
	alert("Last name must be filled out");
	return false;
	};
	if (c==null || c==" ") {
	alert("Last name must be filled out");
	return false;
	};
    var x = document.forms["myForm"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
	};
	var phone = document.getElementById("inputphone").value;
	phone = phone.replace(/\D/g,'');

	if(phone==null || phone==" "){
		alert("Please enter the phone number");
		return false
	}
	if(isNaN(phone)){
		alert("Invalid phone number");
		return false;
	}
	if (phone.length != 10) {
		alert("Phone number should be 10 digits");
		return false;
	};
	
	var zip = document.getElementById("inputzip").value;
	zip = zip.replace("\d{5}-?(\d{4})?$");


	if(zip==null || zip==" " || zip.length < 5){
		alert("Input a valid Zip Code");
		return false;
	}
	if(zip.length > 10){
		alert("Input a valid Zip Code");
		return false;
	}
	
} // Validate Form
	</script>