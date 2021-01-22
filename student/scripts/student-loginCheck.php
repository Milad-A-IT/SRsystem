<?php 
session_start();
include '../../config.php';
$errors = array();

if(isset($_POST["stu_euid"]))
{
    $student = $_POST["stu_euid"];
    $student = stripslashes($student);
    $student = mysqli_real_escape_string($db, $student);
}

if(isset($_POST["stu_password"]))
{
    $password = $_POST["stu_password"];
    $password = stripslashes($password);
    $password = mysqli_real_escape_string($db, $password);
}

//Errors, but the message wont display on the page
if(empty($student)) {
    array_push($errors, "Student ID is Required");
}
if(empty($password)) {
    array_push($errors, "Password is Required");
}

$sql = "SELECT * FROM student WHERE euid = '$student' and password = '$password'";

$result = mysqli_query($db, $sql);

if(mysqli_num_rows($result) == 1)
{
    $_SESSION["euid"] = $student;
    mysqli_query($db, "UPDATE student SET updatelogin = now() WHERE euid = '$student' AND password = '$password'");
    header("Location: ../student-home.php");
}
else
{
    echo "Error";
    header("Location: ../../login.php?error=1"); //pass '1' to login.php in line 19 to display error
}

if($result) {
    echo "success";
}
else
{
    echo "Error";
}

?>