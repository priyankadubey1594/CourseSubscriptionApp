<?php require_once APPROOT.'/views/includes/header.php';?>
	<div class="container">
		<div class="float-left home-style"><span><a href="../index.php">Home</a></span></div>
		<div class="jumbotron text-center" style="margin-top: 80px;">
			<?php
			if(isset($data['message'])) {
				if($data['message']=='added') {
					echo "<div class='alert alert-success' role='alert' id='success'>Course Added successfully.</div>";
				} else {
					echo "<div class='alert alert-danger' role='alert' id='fail'>Something went wrong while adding the course.</div>";
				}
				
			}
			?>
			<div class="header" style="padding-bottom: 30px;padding-top: 30px;">
				<h5 class="text-center">Course Details</h5>
			</div>
			<div>
			<form id="courseForm" method="POST" action="addCourse">
			  <div class="row">
			  	<div class="col-sm-5">
				    <label for="courseName">Course Name</label>
			  	</div>
			  	<div class="col-sm-7">
			  		<div class="form-group">
				    <input type="text" class="form-control" id="courseName" name="courseName" style="width: 70%;" required minlength="3" maxlength="30" placeholder="Enter the course name" required>
					</div>
			  	</div>				  	
			  </div>

			  <div class="row">
			  	<div class="col-sm-5">
				    <label for="courseDetails">Course Details</label>
			  	</div>
			  	<div class="col-sm-7">
			  		<div class="form-group">
				    <textarea name="courseDetails" id="courseDetails" class="form-control" style="width: 70%;" required minlength="3" maxlength="100" placeholder="Enter the course details" required></textarea> 
					</div>
			  	</div>				  	
			  </div>
			  <div class="row">
			  		<div class="col-sm-5"></div>
			  		<div class="col-sm-7">
				  		<div class="form-group">
					    <input type="submit" class="form-control btn-default" id="addCourse" style="width: 70%;">
						</div>
					</div>		  	
			  </div>
			</form>
		</div>
		</div>
	</div>
<?php require_once APPROOT.'/views/includes/footer.php';?>