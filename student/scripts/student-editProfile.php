<?
session_start();
include '../../config.php';
$sid = $_SESSION['euid'];
if(isset($_POST["euid"]))
{
    $sid = $_POST["euid"];
    $sid = stripslashes($sid);
    $sid = mysqli_real_escape_string($db, $sid);
}

if(isset($_POST["address"]))
{
    $address = $_POST["address"];
    $address = stripslashes($address);
    $address = mysqli_real_escape_string($db, $address);

    $sql = "UPDATE student SET addr = '$address' WHERE euid = '$sid'";
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
	header("Location: ../student-profile.php");
}
else
{
	echo mysqli_error($db);
}
?>