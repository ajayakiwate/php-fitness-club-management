<?php
//var_dump($_POST);

if( isset($_POST['firstname']) &&  isset($_POST['lastname']) &&  isset($_POST['emailid']) &&  isset($_POST['mobilenumber']) &&  isset($_POST['dob']) &&  isset($_POST['password1']) &&  isset($_POST['password2']) ){
	
	$fn =$_POST['firstname'];
	$ln =$_POST['lastname'];
	$eid=$_POST['emailid'];
	$dob=$_POST['dob'];
	$mob=(int)$_POST['mobilenumber'];
	$pass=$_POST['password1'];


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


	// Attempt insert query execution
	$sql = "INSERT INTO customer(firstname, lastname, emailid, dob, mobileno, password) VALUES('$fn', '$ln', '$eid', '$dob', $mob, '$pass')";

	if(mysqli_query($link, $sql)){
		echo "User Created successfully.";
	} else {
		 echo "ERROR: Could not Create new User, ".mysqli_error($link);
		//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	 
	// Close connection
	mysqli_close($link);

}
else{
	echo "values missing";
}
?>