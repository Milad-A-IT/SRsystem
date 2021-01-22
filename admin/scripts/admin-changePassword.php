<?php
session_start();
include '../../config.php';
$aid = $_SESSION['euid'];

if(isset($_POST["euid"]))
{
	$aid = $_POST["euid"];
    $aid = stripslashes($aid);
	$aid = mysqli_real_escape_string($db, $aid);
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

$csql = "SELECT password FROM admin WHERE euid = '$aid'";
$cresult = mysqli_query($db, $csql);

$row = mysqli_fetch_assoc($cresult);
$password = $row['password']; //get password from database;

if($oldpass != $password)
{
    header("Location: ../admin-changePassword.php?error1=1");
}
else if($newpass != $cpass)
{
    header("Location: ../admin-changePassword.php?error2=1");
}
else
{
    $sql = "UPDATE admin SET password = '$newpass' WHERE euid = '$aid' AND password = '$oldpass'";
    $result = mysqli_query($db, $sql);
    if(mysqli_query($db, $sql))
    {
        header("Location: ../admin-profile.php");
    }
}
?>