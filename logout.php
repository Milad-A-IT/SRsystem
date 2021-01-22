<?php
include "config.php"; /*connect to database*/
session_start();
if(!$_SESSION['euid']) {
    header("location: login.php");
}
$euid = $_SESSION["euid"];
/*Update student login time */
mysqli_query($db, "UPDATE student SET lastlogin = updatelogin WHERE euid = '$euid'");

/*Update admin login time */
mysqli_query($db, "UPDATE admin SET lastlogin = updatelogin WHERE euid = '$euid'");

session_destroy();

/* User logout, direct to the login page */
header("Location: login.php");

?>