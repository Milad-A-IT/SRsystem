<?php
include '../config.php';

if(isset($_GET['password'])){
    $password = mysqli_real_escape_string($db, $_GET['password']);
    $query = "SELECT * FROM student WHERE password='$password'";
    $run = mysqli_query($db, $query);

    if(mysqli_num_rows($run)>0) {
        $row = mysqli_fetch_array($run);
        $password = $row['password'];
        $email = $row['email'];
    }else{
        //if the link error, direct user back to login page
        header("location:../login.php");
    }
}

if(isset($_POST['submit'])){ 
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $newpass = $password;

    if($password != $confirmpassword) {
        $msg = "<div> Sorry, passwords did not matched</div>";
    }else {
        $query = "UPDATE student SET password='$newpass' WHERE email='$email'";
        mysqli_query($db, $query);
        $msg = "<div>Password Updated</div>";
        header("location:../login.php"); //password updated, direct user back to login page.
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GROUP 404 | Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/unt_icon.png">
    <link rel="stylesheet" href="../css/login.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/login.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<div class="form">
    <div class="title">Reset Password
        <div align='center'><font color ='red' size = '3px;'><?php if(isset($msg)){ echo $msg; }?></div>
    </div>
    <div class="content">
        <form action="" method="post">
            <div class="user">
                <div class="icon"><img src="../icons/email.png" height="200" width="190"/></div>
                <div class="text"><input class="username" type="text" readonly name="" value="<?php echo $email ?>"/></div>
            </div>
            <p class="username_text"></p>
            <div class="password">
                <div class="text"><input class="password1" type="password" name="password" placeholder="Enter password" required autofocus/></div>
            </div>
            <div class="password">
                <div class="text"><input class="password1" type="password" name="confirmpassword" placeholder="Enter confirm password" required autofocus/></div>
            </div>
            <p class="password_text"></p>
            <div class="submit">
                <button id="login" type="submit" name="submit">Reset Password</button> 
            </div>
        </form>
    </div>
</div>
</head>
</body>
</html>