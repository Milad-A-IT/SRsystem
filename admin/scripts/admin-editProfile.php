<?
session_start();
include '../../config.php';
$aid = $_SESSION['euid'];
if(isset($_POST["euid"]))
{
    $aid = $_POST["euid"];
    $aid = stripslashes($aid);
    $aid = mysqli_real_escape_string($db, $aid);
}

if(isset($_POST["address"]))
{
    $address = $_POST["address"];
    $address = stripslashes($address);
    $address = mysqli_real_escape_string($db, $address);

    $sql = "UPDATE admin SET addr = '$address' WHERE euid = '$aid'";
    $result = mysqli_query($db, $sql);
}

if(isset($_POST["email"]))
{
    $email = $_POST["email"];
    $email = stripslashes($email);
    $email = mysqli_real_escape_string($db, $email);

    $sql = "UPDATE admin SET email = '$email' WHERE euid = '$aid'";
    $result = mysqli_query($db, $sql);
}

if(isset($_POST["phone"]))
{
    $phone = $_POST["phone"];
    $phone = stripslashes($phone);
    $phone = mysqli_real_escape_string($db, $phone);

    $sql = "UPDATE admin SET phone = '$phone' WHERE euid = '$aid'";
    $result = mysqli_query($db, $sql);
}

if(mysqli_query($db, $sql))
{
	header("Location: ../admin-profile.php");
}
else
{
	echo mysqli_error($db);
}
?>