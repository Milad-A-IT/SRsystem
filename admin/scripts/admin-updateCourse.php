<?php
session_start();
include '../../config.php';
$cid = $_SESSION['course_id'];

if(isset($_POST["course_id"]))
{
    $cid = $_POST["course_id"];
    $cid = stripslashes($cid);
    $cid = mysqli_real_escape_string($db, $cid);
}

if(isset($_POST["title"]))
{
    $title = $_POST["title"];
    $title = stripslashes($title);
    $title = mysqli_real_escape_string($db, $title);

    $sql = "UPDATE courses SET title = '$title' WHERE course_id = '$cid'";
    $result = mysqli_query($db, $sql);
}

if(isset($_POST["unit"]))
{
    $unit = $_POST["unit"];
    $unit = stripslashes($unit);
    $unit = mysqli_real_escape_string($db, $unit);

    $sql = "UPDATE courses SET unit = '$unit' WHERE course_id = '$cid'";
    $result = mysqli_query($db, $sql);
}

if(isset($_POST["department"]))
{
    $department = $_POST["department"];
    $department = stripslashes($department);
    $department = mysqli_real_escape_string($db, $department);

    $sql = "UPDATE courses SET department = '$department' WHERE course_id = '$cid'";
    $result = mysqli_query($db, $sql);
}

if(isset($_POST["course_lecturer"]))
{
    $course_lecturer = $_POST["course_lecturer"];
    $course_lecturer = stripslashes($course_lecturer);
    $course_lecturer = mysqli_real_escape_string($db, $course_lecturer);

    $sql = "UPDATE courses SET course_lecturer = '$course_lecturer' WHERE course_id = '$cid'";
    $result = mysqli_query($db, $sql);
}

if(isset($_POST["semester"]))
{
    $semester = $_POST["semester"];
    $semester = stripslashes($semester);
    $semester = mysqli_real_escape_string($db, $semester);

    $sql = "UPDATE courses SET semester = '$semester' WHERE course_id = '$cid'";
    $result = mysqli_query($db, $sql);
}

if(isset($_POST["time"]))
{
    $time = $_POST["time"];
    $time = stripslashes($time);
    $time = mysqli_real_escape_string($db, $time);

    $sql = "UPDATE courses SET time = '$time' WHERE course_id = '$cid'";
    $result = mysqli_query($db, $sql);
}

if(isset($_POST["location"]))
{
    $location = $_POST["location"];
    $location = stripslashes($location);
    $location = mysqli_real_escape_string($db, $location);

    $sql = "UPDATE courses SET location = '$location' WHERE course_id = '$cid'";
    $result = mysqli_query($db, $sql);
}

if(mysqli_query($db, $sql))
{
	header("Location: ../admin-viewCourse.php");
}
else
{
	echo mysqli_error($db);
}
?>