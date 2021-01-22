<?php
session_start();

$param1 = $_GET['param1'];

// Create connection
include '../../config.php';

if($param1 != "" && $param1 != "All"){
	$result = mysqli_query($db,"SELECT r.course_id as cid, c.title as title, COUNT(*) as total FROM courses c, course_registered r WHERE r.course_id = c.course_id GROUP BY cid");
} else {
    $result = mysqli_query($db,"SELECT r.course_id as cid, c.title as title, COUNT(*) as total FROM courses c, course_registered r WHERE r.course_id = c.course_id GROUP BY cid");
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