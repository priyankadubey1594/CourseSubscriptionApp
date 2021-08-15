$(document).ready(function(){
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
		$("#postForm").find("input[type=text], input[type=number], textarea").removeClass("error-border");
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

	$("#addCourse").click(function(e){
		validateCourseDetails();
	});

	$("#updateCourse").click(function(e){
		validateCourseDetails();
	});

	function validateCourseDetails() {
			resetAlerts();
			resetClass();
			var err=0;
			var courseName= $("#courseName"), courseDetails=$("textarea#courseDetails");
			if(courseName.val()=="" || courseName.val().length<3) {
				courseName.addClass("error-border");
				err++;
			}  
			if(courseDetails.val()=="" || courseDetails.val().length<3) {
				courseDetails.addClass("error-border");
				err++;
			}
			if(err!=0) {
				$("#courseForm").before("<div class='alert alert-danger' role='alert' id='err'>Please fill the valid entries in the highlighted fields</div>");
				return false;
			} 
	}

	$("#subscribe").click(function(e){
			//e.preventDefault();
			resetAlerts();
			resetClass();
			var err=0;
			var courseId= $("#courseId"), studentId=$("#studentId");
			//console.log(courseId.find(":selected").val());
			if(courseId.find(":selected").val()=="") {
				courseId.addClass("error-border");
				err++;
			}  
			if(studentId.find(":selected").val()=="") {
				studentId.addClass("error-border");
				err++;
			}
			if(err!=0) {
				$("#subscriptionForm").before("<div class='alert alert-danger' role='alert' id='err'>Please fill/correct the highlighted fields to proceed</div>");
				return false;
			} 
	});
	$('#dob').datepicker({
		autoclose: true,
        format: "yyyy-mm-dd"
    });  
});