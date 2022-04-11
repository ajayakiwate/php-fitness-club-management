
<?php

if((!isset($_POST['keyword'])) || empty($_SERVER['HTTP_X_REQUESTED_WITH']) || (!(strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'))){
    /* This is not ajax call */
	exit("!!!Warning!!! security alert");
}

$eid = $_POST["keyword"];
$link = mysqli_connect("localhost", "root", "admin", "z_fitness_club");
	
$sql = "SELECT emailid FROM customer where emailid LIKE '$eid%'";

$a[]="0";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
		
        while($row = mysqli_fetch_array($result)){
			$a[]=$row['emailid'];
		}
	}
}

// get the q parameter from URL
$q = $_POST["keyword"];

// lookup all hints from array if $q is different from ""
?>
<ul id="uid-list" class="list-group">
<?php
$count =5;
$i=0;
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len)) && $i < $count) {
		$i+=1;
?>      
		<li  class="list-group-item list-group-item-secondary" onClick="selectUid('<?php echo $name; ?>');"><?php echo $name; ?></li>
<?php      
    }
  }
}
?>
</ul>