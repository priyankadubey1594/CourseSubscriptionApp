<?php require_once APPROOT.'/views/includes/header.php';?>
	<div class="container">
		<div class="float-left home-style" style="margin-bottom: 40px;"><span><a href="../index.php">Home</a></span></div>
		<div class="jumbotron text-center" style="margin-top: 80px;">
			
			<div class="header" style="padding-bottom: 30px;padding-top: 30px;">
				<h5 class="text-center">Report</h5>
			</div>
			<div>
			<?php
			if(isset($data['data']) && gettype($data['data']) =='array') { ?>
			<table class="table">
				<thead>
					<tr>
					<th>Student Name</th>
					<th>Course Name</th>
				</tr>
				</th>
				<tbody>
					<?php
						foreach($data['data']['row'] as $res) {
							echo '<tr>
							<td>'.$res[0].' '.$res[1].'</td>
							<td>'.$res[2].'</td>
							</tr>';	
						}
					?>
				</tbody>
			</table>
			<?php
				require_once APPROOT.'/views/includes/pagination.php';
			} 
			else {
				echo "<tr><td>Something went wrong while getting the data</td></tr>";
			}		
			?>
		</div>
		</div>
	</div>
<?php require_once APPROOT.'/views/includes/footer.php';?>