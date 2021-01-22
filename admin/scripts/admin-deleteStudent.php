<?php
session_start();

$euid = $_POST['id'];

//Create connection
include '../../config.php';

foreach ($euid as $v) {
    $result = mysqli_query($db,"DELETE FROM student WHERE euid = '$v'");
	
	if($result)	{
		echo "success";
	} else {
		echo "error";
	}
}

?>