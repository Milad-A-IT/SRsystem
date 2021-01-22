<?php 
session_start();
include '../../config.php';
$errors = array();

if(isset($_POST["admin_euid"]))
{
    $admin = $_POST["admin_euid"];
    $admin = stripslashes($admin);
    $admin = mysqli_real_escape_string($db, $admin);
}

if(isset($_POST["admin_password"]))
{
    $password = $_POST["admin_password"];
    $password = stripslashes($password);
    $password = mysqli_real_escape_string($db, $password);
}

//Errors, but the message wont display on the page
if(empty($admin)) {
    array_push($errors, "EUID is Required");
}
if(empty($password)) {
    array_push($errors, "Password is Required");
}

$sql = "SELECT * FROM admin WHERE euid = '$admin' and password = '$password'";

$result = mysqli_query($db, $sql);

if(mysqli_num_rows($result) == 1)
{
    $_SESSION["euid"] = $admin;
   // mysqli_query($db, "UPDATE student SET lastlogin = now() WHERE euid = '$student' AND password = '$password'");
    mysqli_query($db, "UPDATE admin SET updatelogin = now() WHERE euid = '$admin' AND password = '$password'");
    header("Location: ../admin-home.php");
}
else
{
    echo "Error";
    header("Location: ../../login.php?error1=1"); //pass '1' to login.php in line 19 to display error
}

if($result) {
    echo "success";
}
else
{
    echo "Error";
}

?>