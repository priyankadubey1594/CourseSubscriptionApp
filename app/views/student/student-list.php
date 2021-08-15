<?php require_once APPROOT.'/views/includes/header.php';?>
	<div class="container">
		<div class="float-left" style="margin-bottom: 40px;"><span><a href="../index.php">Home</a></span></div>
		<div class="jumbotron text-center" style="margin-top: 80px;">
			<?php
			if($data['message']=='deleted') {
				echo "<div class='alert alert-success' role='alert' id='success'>Student deleted successfully.</div>";
			}
			if($data['message']=='updated') {
				echo "<div class='alert alert-success' role='alert' id='success'>Student details updated successfully.</div>";
			}
			?>
			<div class="header" style="padding-bottom: 30px;padding-top: 30px;">
				<h5 class="text-center">Student Listing</h5>
			</div>
			<div>
			<table class="table">
				<thead>
					<tr>
					<th></th>
					<th>First Name</th>
					<th>Last Name</th>
					<th></th>
				</tr>
				</th>
				<tbody>
					<?php
					foreach($data['data'] as $res) {
						
							echo '<tr>
							<td><a href="updateForm?studentId='.$res[0].'">Edit</a></td>
							<td>'.$res[1].'</td>
							<td>'.$res[2].'</td>
							<td><a href="delete?studentId='.$res[0].'">Delete</a></td>
							</tr>';
						
					}
					?>
					<tr></tr>
				</tbody>
			</table>
		</div>
		</div>
	</div>
<?php require_once APPROOT.'/views/includes/footer.php';?>
