<?php
//var_dump($_POST);


$id =(int)$_POST['uid'];
$fn =$_POST['firstname'];
$ln =$_POST['lastname'];
$eid=$_POST['emailid'];
$dob=$_POST['dob'];
$mob=$_POST['mobilenumber'];
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
$sql = "UPDATE customer set firstname='$fn', lastname='$ln', emailid='$eid', dob='$dob', mobileno='$mob', password='$pass' WHERE id=$id";

if(mysqli_query($link, $sql)){
    echo "Record updated successfully.";
} else {
	 echo "ERROR: Could not Update, ".mysqli_error($link);
    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);


?>