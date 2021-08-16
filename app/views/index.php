<?php require_once APPROOT.'/views/includes/header.php';?>
<body>
	<div class="container" style="margin-top: 40px">
		<div class="header" style="padding-bottom: 30px;">
				<h5 class="text-center">Course Subscription Service</h5>
		</div>
		<div style="padding-left:90px;padding-right:90px">
			<div class="row">
				<div class="col-sm-6">
					<div class="jumbotron text-center"><a href="Student/registrationForm">Register a Student</a></div>
				</div>
				<div class="col-sm-6">
					<div class="jumbotron text-center"><a href="Student/getStudents">View All Students</a></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="jumbotron text-center"><a href="Course/addCourseForm">Add a New Course</a></div>
				</div>
				<div class="col-sm-6">
					<div class="jumbotron text-center"><a href="Course/getCourses">View All courses</a></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="jumbotron text-center"><a href="Subscription/getStudentsAndCourses">Subscribe a student to a course</a></div>
				</div>
				<div class="col-sm-6">
					<div class="jumbotron text-center"><a href="Subscription/report">View Report</a></div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
