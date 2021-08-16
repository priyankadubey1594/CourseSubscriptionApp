<?php require_once APPROOT.'/views/includes/header.php';?>
	<div class="container">
		<div class="float-left home-style" style="margin-bottom: 40px;"><span><a href="../index.php">Home</a></span></div>
		<div class="jumbotron text-center" style="margin-top: 80px;">
			<?php
			if( isset($data['message'])) {
				if($data['message']=='deleted'){
					echo "<div class='alert alert-success' role='alert' id='success'>Course deleted successfully.</div>";
				} else if($data['message']=='not deleted'){
					echo "<div class='alert alert-danger' role='alert' id='success'>Something went wrong while deleting the course.</div>";
				}else if($data['message']=='updated'){
					echo "<div class='alert alert-success' role='alert' id='success'>Course details updated successfully.</div>";
				} else if($data['message']=='not updated'){
					echo "<div class='alert alert-danger' role='alert' id='success'>Something went wrong while updating the course.</div>";
				}
				
			}
			?>
			<div class="header" style="padding-bottom: 30px;padding-top: 30px;">
				<h5 class="text-center">Course Listing</h5>
			</div>
			<div>
			<table class="table">
				<thead>
					<tr>
					<th></th>
					<th>Course</th>
					<th></th>
				</tr>
				</th>
				<tbody>
					<?php
					if(isset($data['data']) && gettype($data['data']) =='array'){
						foreach($data['data'] as $res) {
							echo '<tr>
							<td><a href="updateCourseForm?courseId='.$res[0].'">Edit</a></td>
							<td>'.$res[1].'</td>
							<td><a href="delete?courseId='.$res[0].'">Delete</a></td>
							</tr>';					
						}
					} else {
						echo '<tr>Somethig went wrong while retrieving the data</tr>';
					}
					?>
					<tr></tr>
				</tbody>
			</table>
		</div>
		</div>
	</div>
<?php require_once APPROOT.'/views/includes/footer.php';?>