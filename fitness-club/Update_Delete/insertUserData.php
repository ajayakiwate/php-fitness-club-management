<?php
//var_dump($_POST);

if(isset($_POST['emailid']) && isset($_POST['weight']) && isset($_POST['height'])){
	

	$eid=$_POST['emailid'];
	$weight=(int)$_POST['weight'];
	$height=(int)$_POST['height'];


	$link = mysqli_connect("localhost", "root", "admin", "z_fitness_club");
		
	$sql = "SELECT id FROM customer where emailid = '$eid'";

	$result = mysqli_query($link, $sql);
	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_array($result);
		$id=(int)$row['id'];
	

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


		// Attempt insert query execution
		$sql = "INSERT INTO entry(id, height, weight) VALUES($id, $height, $weight)";

		if(mysqli_query($link, $sql)){
			echo "User Entry inserted successfully.";
		} else {
			 echo "ERROR: Could not Insert, ".mysqli_error($link);
			//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		 
		// Close connection
		
	}
	else{
		 echo "ERROR: $eid not found";
	}
	
	mysqli_close($link);
}
else{
	echo "values missing";
}


?>