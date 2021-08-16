<?php require_once APPROOT.'/views/includes/header.php';?>
	<div class="container">
		<div class="float-left home-style" style="margin-bottom: 40px;"><span><a href="../index.php">Home</a></span></div>
		<div class="jumbotron text-center" style="margin-top: 80px;">
			<div class="header" style="padding-bottom: 30px;padding-top: 30px;">
				<h5 class="text-center">Student Details</h5>
			</div>
			<div>
			<form id="postForm" method="POST" action="update">
			<?php
			if(isset($data['data']) && gettype($data['data']) == 'array'){
				foreach($data['data'] as $res){
				  echo '<div class="row">
				  <input type="hidden" class="form-control" id="studentId" name="studentId" style="width: 70%;" value="'. $res[0].'" >
				  	<div class="col-sm-5">
					    <label for="firstName">First Name</label>
				  	</div>
				  	<div class="col-sm-7">
				  		<div class="form-group">
					    <input type="text" class="form-control" id="firstName" name="firstName" style="width: 70%;" value="'. $res[1].'" minlength="3" maxlength="20">
						</div>
				  	</div>				  	
				  </div>

				  <div class="row">
				  	<div class="col-sm-5">
					    <label for="lastName">Last Name</label>
				  	</div>
				  	<div class="col-sm-7">
				  		<div class="form-group">
					    <input type="text" class="form-control" id="lastName" name = "lastName" style="width: 70%;" value=" '.$res[2].'" minlength="2" maxlength="20">
						</div>
				  	</div>				  	
				  </div>
				  <div class="row">
				  	<div class="col-sm-5">
					    <label for="dob">DOB</label>
				  	</div>
				  	<div class="col-sm-7">
				  		<div class="form-group">
					    <input type="text" class="form-control" id="dob" name = "dob" style="width: 70%;" value="'.$res[3].'">
						</div>
				  	</div>		  	
				  </div>
				  <div class="row">
				  	<div class="col-sm-5">
					    <label for="contact">Contact Number</label>
				  	</div>
				  	<div class="col-sm-7">
				  		<div class="form-group">
					    <input type="number" class="form-control" id="contact" name = "contact" style="width: 70%;" value="'.$res[4].'" maxlength="10">
						</div>
				  	</div>			  	
				  </div>
				  <div class="row">
				  		<div class="col-sm-5"></div>
				  		<div class="col-sm-7">
					  		<div class="form-group">
						    <input type="submit" class="form-control btn-default" id="updateStudent" style="width: 70%;" value="Update">
							</div>
						</div>		  	
				  </div>';
				  }
				} else echo '<div>Something went wrong</div>';
			  ?>
			</form>
		</div>
		</div>
	</div>
<?php require_once APPROOT.'/views/includes/footer.php';?>