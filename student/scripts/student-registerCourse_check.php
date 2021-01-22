<?php
session_start();

if(!isset($_SESSION['euid'])) {
    header("location: ../../login.php");
    exit();
}

$sid= $_SESSION['euid'];
$course_id = $_POST['id'];


//Create connection
include '../../config.php';

$result = mysqli_query($db,"SELECT sessionid from sessions where semester = 'FALL'");

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
		$sessionid = $row["sessionid"];
	}
}

	foreach( $course_id as $v ) {
		//add selected courses into shopping cart table
		$result = mysqli_query($db,"INSERT INTO cart VALUES ('$sid','$v','$sessionid',0)");
	
		if($result)	{
			echo "success";
		} else {
			echo "error";
		}
	}

?>