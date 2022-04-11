<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page

$data["success"] = false;
$data["message"] = "Invalid Data";
	
$flag=0;
if(!isset($_COOKIE['c_userid'])){
	if( (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) ){
		$flag=1;
	}
	
}

if($flag==0){
	
	$data["success"] = true;
	$mess['cookie']=false;
	$mess['session']=false;
	$mess['eid']="";
	
	$uid="";
	
	if( isset($_COOKIE['c_admin']) || isset($_SESSION["admin"]) ){
		$mess['admin']=true;
	}
	else{
		$mess['admin']=false;
	}
	
	if( isset($_COOKIE['c_userid']) ){
		$uid = $_COOKIE['c_userid'];
		$mess['cookie']=true;
		$mess['eid']=$uid;
	}
	
	if(isset($_SESSION["userid"])){
		$uid = $_SESSION['userid'];
		$mess['session']=true;
		$mess['eid']=$uid;
	}
	
	//echo "<h1>$uid Success</h1>";
	$data['message']=$mess;
	
}

echo json_encode($data);
?>