<?php

//use to connect database PHPMYADMIN
$servername = "sql205.epizy.com";
$dBUsername = "epiz_27196468";
$dBPassword = "wyG5juTyrBf9";
$dBName = "epiz_27196468_registration";

$db = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
mysqli_query($db, "SET SESSION time_zone = '-5:00'"); //set to current timezone US/Central
?>