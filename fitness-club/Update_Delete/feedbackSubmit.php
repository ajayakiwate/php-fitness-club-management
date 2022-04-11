<?php
//var_dump($_POST);



if( isset($_POST['name']) && isset($_POST['mobile']) && isset($_POST['emailid']) && isset($_POST['comments']) ){
	
	$nm= $_POST['name'];
	$nm = preg_replace("/[^a-zA-Z]/", "", $nm);
	$mob= (int)$_POST['mobile'];
	$eid= $_POST['emailid'];
	$comm= $_POST['comments'];
	$comm = preg_replace("/[^A-Za-z0-9]/", " ", $comm);

	$link = mysqli_connect("localhost", "root", "admin", "z_fitness_club");

	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
		
		echo 'DB connection Error.';
	}


	$sql = "INSERT INTO feedback(name, emailid, mobileno, comments) VALUES('$nm', '$eid', $mob, '$comm')";

	if(mysqli_query($link, $sql)){
		echo "Feedback Submitted";
	} else {
		 echo "ERROR: Could not Submit Feedback, ".mysqli_error($link);
		//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	 
	// Close connection
	mysqli_close($link);

}
else{
	echo "Missing Data";
}
?>