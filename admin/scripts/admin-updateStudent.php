<?php
session_start();
include '../../config.php';
$sid = $_SESSION['id'];

if(isset($_POST["euid"]))
{
    $sid = $_POST["euid"];
    $sid = stripslashes($sid);
    $sid = mysqli_real_escape_string($db, $sid);
}

if(isset($_POST["first_name"]))
{
    $fname = $_POST["first_name"];
    $fname = stripslashes($fname);
    $fname = mysqli_real_escape_string($db, $fname);

    $sql = "UPDATE student SET first_name = '$fname' WHERE euid = '$sid'";
    $result = mysqli_query($db, $sql);
}

if(isset($_POST["last_name"]))
{
    $lname = $_POST["last_name"];
    $lname = stripslashes($lname);
    $lname = mysqli_real_escape_string($db, $lname);

    $sql = "UPDATE student SET last_name = '$lname' WHERE euid = '$sid'";
    $result = mysqli_query($db, $sql);
}

if(isset($_POST["courseofstudy"]))
{
    $cos = $_POST["courseofstudy"];
    $cos = stripslashes($cos);
    $cos = mysqli_real_escape_string($db, $cos);

    $sql = "UPDATE student SET courseofstudy = '$cos' WHERE euid = '$sid'";
    $result = mysqli_query($db, $sql);
}

if(isset($_POST["gpa"]))
{
    $gpa = $_POST["gpa"];
    $gpa = stripslashes($gpa);
    $gpa = mysqli_real_escape_string($db, $gpa);

    $sql = "UPDATE student SET gpa = '$gpa' WHERE euid = '$sid'";
    $result = mysqli_query($db, $sql);
}

if(isset($_POST["dob"]))
{
    $dob = $_POST["dob"];
    $dob = stripslashes($dob);
    $dob = mysqli_real_escape_string($db, $dob);

    $sql = "UPDATE student SET dob = '$dob' WHERE euid = '$sid'";
    $result = mysqli_query($db, $sql);
}

if(isset($_POST["email"]))
{
    $email = $_POST["email"];
    $email = stripslashes($email);
    $email = mysqli_real_escape_string($db, $email);

    $sql = "UPDATE student SET email = '$email' WHERE euid = '$sid'";
    $result = mysqli_query($db, $sql);
}

if(isset($_POST["address"]))
{
    $address = $_POST["address"];
    $address = stripslashes($address);
    $address = mysqli_real_escape_string($db, $address);

    $sql = "UPDATE student SET addr = '$address' WHERE euid = '$sid'";
    $result = mysqli_query($db, $sql);
}

if(isset($_POST["phone"]))
{
    $phone = $_POST["phone"];
    $phone = stripslashes($phone);
    $phone = mysqli_real_escape_string($db, $phone);

    $sql = "UPDATE student SET phone = '$phone' WHERE euid = '$sid'";
    $result = mysqli_query($db, $sql);
}

if(mysqli_query($db, $sql))
{
	header("Location: ../admin-viewStudent.php");
}
else
{
	echo mysqli_error($db);
}
?>