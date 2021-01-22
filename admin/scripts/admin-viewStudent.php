<?php
session_start();

$param1 = $_GET['param1'];

// Create connection
include '../../config.php';

if($param1 != "" && $param1 != "All"){
	$result = mysqli_query($db,"SELECT euid as id, first_name as firstname, last_name as lastname, gender as gender, courseofstudy as major, gpa as gpa, dob as dob, email as email, phone as phone, addr as addr, lastlogin as last_login FROM student");
} else {
    $result = mysqli_query($db,"SELECT euid as id, first_name as firstname, last_name as lastname, gender as gender, courseofstudy as major, gpa as gpa, dob as dob, email as email, phone as phone, addr as addr, lastlogin as last_login FROM student");
    $json = array();
}


if (mysqli_num_rows($result) > 0) {
	$json = array();
	 while ($row = mysqli_fetch_assoc($result))
        {
		 $json[] = $row; 
        }
	$response = array(
		"data" => $json
	);

	echo json_encode($response);
} else {
    $json = array();
	$response = array(
		"data" => $json
	);
	echo json_encode($response);
}

mysqli_close($db);

?>