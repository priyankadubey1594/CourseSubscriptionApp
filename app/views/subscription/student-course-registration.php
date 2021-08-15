<?php require_once APPROOT.'/views/includes/header.php';?>
	<div class="container">
		<div class="float-left" style="margin-bottom: 40px;"><span><a href="../index.php">Home</a></span></div>
		<div class="jumbotron text-center" style="margin-top: 80px;">
			<?php
			if(isset($data['message']) && $data['message']=='subscribed') {
				echo "<div class='alert alert-success' role='alert' id='success'>Student has been subscribed for the selcted course.</div>";
			}
			?>
			<div class="header" style="padding-bottom: 30px;padding-top: 30px;">
				<h5 class="text-center">Student Course Subcription</h5>
			</div>
			<div>
			<form id="subscriptionForm" method="POST" action="subscribe">
			  <div class="row">
			  	<div class="col-sm-5">
				    <label for="courseName">Student Name</label>
			  	</div>
			  	<div class="col-sm-7">
			  		<div class="form-group">
					    <select class="form-control" id="studentId" name="studentId" style="width: 70%;">
					    	<option value="">Select a students</option>
					    	<?php
					    	foreach ($data['students'] as $student) {
					    		echo '<option value="'.$student[0].'">'.$student[1].' '.$student[2].'</option>';
					    	}
					    	
					    	?>
					    </select>
					</div>
			  	</div>				  	
			  </div>

			  <div class="row">
			  	<div class="col-sm-5">
				    <label for="courseDetails">Course Name</label>
			  	</div>
			  	<div class="col-sm-7">
			  		<div class="form-group">
					    <select class="form-control" id="courseId" name="courseId" style="width: 70%;">
					    	<option value="">Select a course</option>
					    	<?php
					    	foreach ($data['courses'] as $course) {
					    		echo '<option value="'.$course[0].'">'.$course[1].'</option>';
					    	}
					    	
					    	?>
					    </select>
					</div>
			  	</div>				  	
			  </div>
			  <div class="row">
			  		<div class="col-sm-5"></div>
			  		<div class="col-sm-7">
				  		<div class="form-group">
					    <input type="submit" class="form-control btn-default" id="subscribe" style="width: 70%;" value="Subscribe">
						</div>
					</div>		  	
			  </div>
			</form>
		</div>
		</div>
	</div>
<?php require_once APPROOT.'/views/includes/footer.php';?>