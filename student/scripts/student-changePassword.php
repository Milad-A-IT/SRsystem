<?php
session_start();
include '../../config.php';
$sid = $_SESSION['euid'];

if(isset($_POST["euid"]))
{
	$sid = $_POST["euid"];
    $sid = stripslashes($sid);
	$sid = mysqli_real_escape_string($db, $sid);
}

if(isset($_POST["oldpass"]))
{
	$oldpass = $_POST["oldpass"];
    $oldpass = stripslashes($oldpass);
	$oldpass = mysqli_real_escape_string($db, $oldpass);
}

if(isset($_POST["newpass"]))
{
	$newpass = $_POST["newpass"];
    $newpass = stripslashes($newpass);
	$newpass = mysqli_real_escape_string($db, $newpass);
}

if(isset($_POST["cpass"]))
{
	$cpass = $_POST["cpass"];
    $cpass = stripslashes($cpass);
	$cpass = mysqli_real_escape_string($db, $cpass);
}

$csql = "SELECT password FROM student WHERE euid = '$sid'";
$cresult = mysqli_query($db, $csql);

$row = mysqli_fetch_assoc($cresult);
$password = $row['password']; //get password from database;

if($oldpass != $password)
{
    header("Location: ../student-changePassword.php?error1=1");
}
else if($newpass != $cpass)
{
    header("Location: ../student-changePassword.php?error2=1");
}
else
{
    $sql = "UPDATE student SET password = '$newpass' WHERE euid = '$sid' AND password = '$oldpass'";
    $result = mysqli_query($db, $sql);
    if(mysqli_query($db, $sql))
    {
        header("Location: ../student-profile.php");
    }
}
?>