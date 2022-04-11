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


// Attempt select query execution
$sql = "SELECT id, firstname, lastname, emailid, dob, doj, mobileno, password FROM customer ORDER BY id DESC";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
		
		$data=<<<EOD
		<div class="container-fluid m-md-4">
			<h5 class="font-weight-bold text-info m-2">Customer List</h5>
			<table class="table table-sm table-striped table-hover table-responsive">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">FirstName</th>
					<th scope="col">LastName</th>
					<th scope="col">EmailID</th>
					<th scope="col">DOB</th>
					<th scope="col">DOJ</th>
					<th scope="col">MobileNo</th>
					<th scope="col">Password</th>
				</tr>
			</thead>
			<tbody>
EOD;
		
        while($row = mysqli_fetch_array($result)){
			
			$id =$row['id'];
			$fn =$row['firstname'];
			$ln =$row['lastname'];
			$eid=$row['emailid'];
			$dob=$row['dob'];
			$doj=$row['doj'];
			$mob=$row['mobileno'];
			$pass=$row['password'];
			
			
			
			$data .=<<<EOD
				<tr id=$id >
					<td> $id   </td>
					<td> $fn   </td>
					<td> $ln   </td>
					<td> $eid  </td>
					<td> $dob  </td>
					<td> $doj  </td>
					<td> $mob  </td>
					<td> $pass </td>
					<td>
						<button type="button" class="btn btn-primary btn-sm user-update" >Update</button>
					</td>
					<td>
						<button type="button" class="btn btn-danger btn-sm user-delete" >Delete</button>
					</td>
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
