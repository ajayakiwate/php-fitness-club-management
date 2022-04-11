<?php
// Initialize the session
session_start();
// Unset all of the session variables
$_SESSION = array();
// Destroy the session.
session_destroy();
// Redirect to login page
setcookie("c_userid", "", time() - 3600,"/");
setcookie("c_admin", "", time() - 3600, '/');

echo "Successfully Loged out";

?>