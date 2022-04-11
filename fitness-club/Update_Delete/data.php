<?php include './header.php' ?>

<?php
echo '<script src="./Update_Delete/js2.js"></script>';

$link = mysqli_connect("localhost", "root", "admin", "z_fitness_club");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
	
	echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Warning!</strong> 
		DB connection Error.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	<div>';
}



if(isset($_POST['emailid'])){
	
	$eid=$_POST['emailid'];

	// Attempt select query execution
	$sql = "SELECT e.tr_id, e.date_ts, e.height, e.weight FROM entry e INNER JOIN customer c ON (e.id = c.id) WHERE c.emailid='$eid' ORDER BY e.tr_id DESC";

	$data=<<<EOD
				<script>
					alert("No Records Found");
				</script>
EOD;

	if($result = mysqli_query($link, $sql)){
		if(mysqli_num_rows($result) > 0){
			
			$data=<<<EOD
			<div class="container-fluid m-md-4">
				<h5 class="font-weight-bold text-info m-2">User Details : $eid </h5>
				<table class="table table-sm table-striped table-hover table-responsive">

				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Date</th>
						<th scope="col">Height</th>
						<th scope="col">Weight</th>
					</tr>
				</thead>
				<tbody>
EOD;
			
			while($row = mysqli_fetch_array($result)){
				
				$id =$row['tr_id'];
				$date =date("d/M/Y",strtotime($row['date_ts']));
				$ht =$row['height'];
				$wt=$row['weight'];
				
				$data .=<<<EOD
					<tr id=$id >
						<td> $id </td>
						<td> $date </td>
						<td> $ht </td>
						<td> $wt </td>
					</tr>
EOD;
										
			}
			
			$data .=<<<EOD
				</tbody>
				</table>
			</div>
EOD;
			
			// Free result set
			mysqli_free_result($result);
		} 
		else{
			//check in admin table
			$sql = "SELECT * FROM admin where username='$eid'";
			
			if($result = mysqli_query($link, $sql)){
				// Check if username exists in admin
				if(mysqli_num_rows($result) > 0){
					$data=<<<EOD
						<script>
							$.ajax({
								type: "GET",
								url: './Update_Delete/userList.php',
								success: function(response){
									//console.log(response);
									$("#main").html(response);
									
									
							   }
							});
						</script>
EOD;

					mysqli_free_result($result);
				}
				
			}
			else{
				$temp="ERROR: Could not able to execute $sql. " . mysqli_error($link);
				$message = <<<EOD
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning!</strong> 
					$temp
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				<div>
EOD;
			}
			
			
		}
		
	} else{

		$temp="ERROR: Could not able to execute $sql. " . mysqli_error($link);
		$message = <<<EOD
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning!</strong> 
					$temp
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				<div>
EOD;
		
	}

}
else{
	$data="pass EmailID";
}
// Close connection
mysqli_close($link);

echo $data;
?>

<?php include './footer.php' ?>
