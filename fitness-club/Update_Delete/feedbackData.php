<?php

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


// Attempt select query execution

$data=<<<EOD
	<script>
		alert("No Records Found");
	</script>
EOD;

$sql = "SELECT * FROM feedback";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
		
		$data=<<<EOD
		<div class="container-fluid m-md-4">
			<h5 class="font-weight-bold text-info m-2">Feedback Data</h5>
			<table class="table table-sm table-striped table-hover table-responsive">
			
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Date</th>
					<th scope="col">Name</th>
					<th scope="col">EmailID</th>
					<th scope="col">MobileNo</th>
					<th scope="col">comments</th>
				</tr>
			</thead>
			<tbody>
EOD;
		
        while($row = mysqli_fetch_array($result)){
			
			$id =$row['id'];
			$nm =$row['name'];
			$eid=$row['emailid'];
			$date=$row['t_date'];
			$mob=$row['mobileno'];
			$comm=$row['comments'];
			
			
			
			$data .=<<<EOD
				<tr id=$id >
					<td> $id </td>
					<td> $date </td>
					<td> $nm </td>
					<td> $eid</td>
					<td> $mob </td>
					<td> $comm  </td>
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
    } else{
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Warning!</strong> 
			No records matching your query were found.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		<div>';
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

// Close connection
mysqli_close($link);

echo $data;
?>

<?php include './footer.php' ?>
