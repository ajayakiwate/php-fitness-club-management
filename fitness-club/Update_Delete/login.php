<?php
//var_dump($_POST);



if( isset($_POST['emailid']) && isset($_POST['password']) ){
	$eid =trim($_POST['emailid']);
	$pass=trim($_POST['password']);

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

	// check if user is present
	$sql = "SELECT * FROM customer where emailid='$eid' AND password='$pass'";

	$data["success"] = false;
	$data["message"] = "Invalid Data";

	if($result = mysqli_query($link, $sql)){
		//print_r($result);
		// Check if username exists
		if(mysqli_num_rows($result) > 0){
			session_start();
								
			// Store data in session variables
			$_SESSION["loggedin"] = true;
			$_SESSION["userid"] = $eid;
			
			$data1['admin']=false;
			$data1['session']=true;
			$data1['eid']=$eid;
			
			if(isset($_POST['remember'])){
				setcookie("c_userid", $eid, time()+3600*24*365, '/');
				$data1['cookie']=true;
			}
			else{
				$data1['cookie']=false;
			}
			
			
			$data["success"]=true;
			$data["message"]=$data1;
		}
		else{
			//check in admin table
			$sql = "SELECT * FROM admin where username='$eid' AND password='$pass'";
			
			if($result = mysqli_query($link, $sql)){
				
				// Check if username exists in admin
				if(mysqli_num_rows($result) > 0){
					
					session_start();
								
					// Store data in session variables
					$_SESSION["loggedin"] = true;
					$_SESSION["userid"] = $eid;
					
					$_SESSION["admin"]= true;
					
					$data1['admin']=true;
					$data1['session']=true;
					$data1['eid']=$eid;
					
					if(isset($_POST['remember'])){
						setcookie("c_userid", $eid, time()+3600*24*365, '/');
						setcookie("c_admin", false, time()+3600*24*365, '/');
						$data1['cookie']=true;
					}
					else{
						$data1['cookie']=false;
					}
					
					$data["success"]=true;
					$data["message"]=$data1;
					
				}
			}
		}
	}
	
	mysqli_close($link);

	echo json_encode($data);
}
else{
	$data["success"]=false;
	$data["message"]="Insuccient Data";
	echo json_encode($data);
}



?>