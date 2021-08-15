<?php require_once APPROOT.'/views/includes/header.php';?>
	<div class="container">
		<div class="float-left" style="margin-bottom: 40px;"><span><a href="../index.php">Home</a></span></div>
		<div class="jumbotron text-center" style="margin-top: 80px;">
			
			<div class="header" style="padding-bottom: 30px;padding-top: 30px;">
				<h5 class="text-center">Report</h5>
			</div>
			<div>
			<table class="table">
				<thead>
					<tr>
					<th>Student Name</th>
					<th>Course Name</th>
				</tr>
				</th>
				<tbody>
					<?php
					if(isset($data['data']) && gettype($data['data']) =='array') {
						foreach($data['data'] as $res) {
							echo '<tr>
							<td>'.$res[0].' '.$res[1].'</td>
							<td>'.$res[2].'</td>
							</tr>';	
						}
					} else {
						echo "<tr><td>Something went wrong while getting the data</td></tr>";
					}
					
					?>
		
				</tbody>
			</table>
		</div>
		</div>
	</div>
<?php require_once APPROOT.'/views/includes/footer.php';?>