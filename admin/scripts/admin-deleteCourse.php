<?php
session_start();

$course_id = $_POST['id'];

//Create connection
include '../../config.php';

foreach ($course_id as $v) {
    $result = mysqli_query($db,"DELETE FROM courses WHERE course_id = '$v'");
	
	if($result)	{
		echo "success";
	} else {
		echo "error";
	}
}

?>