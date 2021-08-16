<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Course Subscription App</title>
	<script type="text/javascript" src="../public/js/jquery.min.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../public/css/custom.style.css">
</head>
<body>
	<div class="container">
		<div class="jumbotron text-center" style="margin-top: 80px;">
			<?php
			if($data==true) {
				echo '<div>';
			}
			?>
			<div class="header" style="padding-bottom: 30px;padding-top: 30px;">
				<h5 class="text-center">Student Details</h5>
			</div>
			<div>
			<form id="postForm" method="POST" action="register">
			  <div class="row">
			  	<div class="col-sm-5">
				    <label for="firstName">First Name</label>
			  	</div>
			  	<div class="col-sm-7">
			  		<div class="form-group">
				    <input type="text" class="form-control" id="firstName" name="firstName" style="width: 70%;">
					</div>
			  	</div>				  	
			  </div>

			  <div class="row">
			  	<div class="col-sm-5">
				    <label for="lastName">Last Name</label>
			  	</div>
			  	<div class="col-sm-7">
			  		<div class="form-group">
				    <input type="text" class="form-control" id="lastName" name = "lastName" style="width: 70%;">
					</div>
			  	</div>				  	
			  </div>
			  <div class="row">
			  	<div class="col-sm-5">
				    <label for="dob">DOB</label>
			  	</div>
			  	<div class="col-sm-7">
			  		<div class="form-group">
				    <input type="text" class="form-control" id="dob" name = "dob" style="width: 70%;">
					</div>
			  	</div>		  	
			  </div>
			  <div class="row">
			  	<div class="col-sm-5">
				    <label for="contact">Contact Number</label>
			  	</div>
			  	<div class="col-sm-7">
			  		<div class="form-group">
				    <input type="number" class="form-control" id="contact" name = "contact" style="width: 70%;">
					</div>
			  	</div>			  	
			  </div>
			  <div class="row">
			  		<div class="col-sm-5"></div>
			  		<div class="col-sm-7">
				  		<div class="form-group">
					    <input type="submit" class="form-control btn-default" id="submit" style="width: 70%;">
						</div>
					</div>		  	
			  </div>
			</form>
		</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="../public/js/custom.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$("#submit").click(function(e){
			//e.preventDefault();
			resetAlerts();
			resetClass();
			var err=0;
			var firstName= $("#firstName"), lastName=$("#lastName"), contact=$("#contact"), dob=$("#dob");
			if(firstName.val()=="") {
				firstName.addClass("error-border");
				err++;
			}  
			if(lastName.val()=="") {
				lastName.addClass("error-border");
				err++;
			}
			if(contact.val()=="") {
				contact.addClass("error-border");
				err++;
			}
			if(dob.val()=="") {
				dob.addClass("error-border");
				err++;
			}
			if(err!=0) {
				$("#postForm").before("<div class='alert alert-danger' role='alert' id='err'>Please fill/correct the highlighted fields to proceed</div>");
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
});
</script>
</html>