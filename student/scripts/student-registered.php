<?php
session_start();

if(!isset($_SESSION['euid'])) {
    header("location: ../../login.php");
    exit();
}

$sid = $_SESSION['euid'];
$course_id = $_POST['id'];

include '../../config.php';

$result = mysqli_query($db,"SELECT sessionid from sessions where semester = 'FALL'");

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
		$sessionid = $row["sessionid"];
	}
}

foreach( $course_id as $v ) {
    $result = mysqli_query($db, "INSERT INTO course_registered VALUE ('$sid','$v','$sessionid',0)");
    if($result) {
        $result = mysqli_query($db, "DELETE FROM cart WHERE course_id = '$v'");
    } else {
        $result = false;
    }
    
    if($result)	{
        echo "success";
    } else {
        echo "error";
    }
}

?>