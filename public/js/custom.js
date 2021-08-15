$(document).ready(function(){
	alert("hello");
	$("#register").click(function(e){
			//e.preventDefault();
			resetAlerts();
			resetClass();
			var err=0;
			var firstName= $("#firstName"), lastName=$("#lastName"), contact=$("#contact"), dob=$("#dob");
			if(firstName.val()=="" || firstName.val().length<3) {
				firstName.addClass("error-border");
				err++;
			} 
			if(lastName.val()=="" || lastName.val().length<2) {
				lastName.addClass("error-border");
				err++;
			}
			if(contact.val()=="" || contact.val().length != 10) {
				contact.addClass("error-border");
				err++;
			}
			if(dob.val()=="") {
				dob.addClass("error-border");
				err++;
			}
			if(err!=0) {
				$("#postForm").before("<div class='alert alert-danger' role='alert' id='err'>Please fill the valid entires in the highlighted fields.</div>");
				return false;
			} 
	});
	function resetAlerts() {
		$("#success").remove();
		$("#err").remove();
	}

	function resetClass() {
		$("#postForm").find("input[type=text], input[type=number]").removeClass("error-border");
	}

	$("#updateStudent").click(function(e){
			//e.preventDefault();
			resetAlerts();
			resetClass();
			var err=0;
			var firstName= $("#firstName"), lastName=$("#lastName"), contact=$("#contact"), dob=$("#dob");
			if(firstName.val()=="" || firstName.val().length<3) {
				firstName.addClass("error-border");
				err++;
			}  
			if(lastName.val()=="" || lastName.val().length<2) {
				lastName.addClass("error-border");
				err++;
			}
			if(contact.val()=="" || contact.val().length != 10) {
				contact.addClass("error-border");
				err++;
			}
			if(dob.val()=="") {
				dob.addClass("error-border");
				err++;
			}
			if(err!=0) {
				$("#postForm").before("<div class='alert alert-danger' role='alert' id='err'>Please fill the valid entries in the highlighted fields.</div>");
				return false;
			} 
	});
});
		