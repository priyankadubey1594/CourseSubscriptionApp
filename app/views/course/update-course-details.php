<?php require_once APPROOT.'/views/includes/header.php';?>
	<div class="container">
		<div class="float-left" style="margin-bottom: 40px;"><span><a href="../index.php">Home</a></span></div>
		<div class="jumbotron text-center" style="margin-top: 80px;">
			<div class="header" style="padding-bottom: 30px;padding-top: 30px;">
				<h5 class="text-center"> Update Course Details</h5>
			</div>
			<div>
			<form id="courseForm" method="POST" action="update">
			<?php
			foreach($data['data'] as $res){
			  echo '<div class="row">
			  <input type="hidden" class="form-control" id="courseId" name="courseId" style="width: 70%;" value="'. $res[0].'">
			  	<div class="col-sm-5">
				    <label for="courseName">Course Name</label>
			  	</div>
			  	<div class="col-sm-7">
			  		<div class="form-group">
				    <input type="text" class="form-control" id="courseName" name="courseName" style="width: 70%;" value="'. $res[1].'" minlength="3" required>
					</div>
			  	</div>				  	
			  </div>

			  <div class="row">
			  	<div class="col-sm-5">
				    <label for="lastName">Course Details</label>
			  	</div>
			  	<div class="col-sm-7">
			  		<div class="form-group">
				    <textarea class="form-control" id="courseDetails" name = "courseDetails" style="width: 70%;" minlength = "3" maxlength="100" required>'.$res[2].'</textarea>
					</div>
			  	</div>				  	
			  </div>
			  <div class="row">
			  		<div class="col-sm-5"></div>
			  		<div class="col-sm-7">
				  		<div class="form-group">
					    <input type="submit" class="form-control btn-default" id="updateCourse" style="width: 70%;" value="Update">
						</div>
					</div>		  	
			  </div>';
			  }
			  ?>
			</form>
		</div>
		</div>
	</div>
<?php require_once APPROOT.'/views/includes/footer.php';?>