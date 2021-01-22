<?php
require '../PHPMailer/PHPMailerAutoload.php';
require_once '../PHPMailer/class.phpmailer.php';
require_once '../PHPMailer/class.smtp.php';
include '../config.php';

/*Sender email address and password*/
$crendentials = array(
    'email' => 'unt.group404@gmail.com',
    'password' => 'UNTgroup404'
);

/* Set gmail SMTP */

$smtp = array(
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'user_name' => $crendentials['email'],
    'password' => $crendentials['password'],
    'secure' => 'tls'
);

if(isset($_POST) & !empty($_POST)){
    $input = $_POST['email'];
    $password = md5(rand(999, 99999));
    $sql = "SELECT * FROM `student` WHERE ";

      if(filter_var($input, FILTER_VALIDATE_EMAIL)){
        $sql .= "email='$input'";
      }else{
        $sql .= "euid='$input'";
      }

    $res = mysqli_query($db, $sql);
    $count = mysqli_num_rows($res);

    if($count == 1){
        $usql = "UPDATE student SET password = '$password' WHERE email = '$input'";
        $result = mysqli_query($db, $usql);


        if($result){
            /* TO, SUBJECT, CONTENT */
            $to         = $input; //email entered by user
            $subject    = 'Reset password';
        //    $content    = "Your Password is $password";
            $content    = "Click on the <a href='http://it-capstone.rf.gd//ClassRegistration/student/student-resetPassword.php?password=$password'> link </a> to reset the password.";

            $mailer = new PHPMailer();

            //SMTP Configuration
            $mailer->isSMTP();
            $mailer->SMTPAuth   = true; //We need to authenticate
            $mailer->Host       = $smtp['host'];
            $mailer->Port       = $smtp['port'];
            $mailer->Username   = $smtp['user_name'];
            $mailer->Password   = $smtp['password'];
            $mailer->SMTPSecure = $smtp['secure']; 
        
            //Now, send mail :
            //From - To :
            $mailer->From       = $crendentials['email'];
            $mailer->FromName   = 'GROUP 404'; //Optional
            $mailer->addAddress($to);  // Add a recipient
        
            //Subject - Body :
            $mailer->Subject        = $subject;
            $mailer->Body           = $content;
            $mailer->isHTML(true); //Mail body contains HTML tags
        
            //Check if mail is sent :
            if(!$mailer->send()) {
                $msg = "<div>Error sending the link to email</div>";
            } else {
                $msg = "<div>Password reset link has been sent to the email.</div>";
              //  header("Location: login.php"); //message sent, direct user back to login page
            }
        }else{
            $msg = "<div>Invalid email.</div>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GROUP 404 | Forget Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/unt_icon.png">
    <link rel="stylesheet" href="../css/login.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<div class="form">
    <div class="title">Forget Password
    <div align='center'><font color ='red' size = '3px;'><?php if(isset($msg)){ echo $msg; }?></div>
    </div>
        <div class="content">
        <form action="student-forgotPassword.php" method="post">
            <div class="user">
                <div class="icon"><img src="../icons/email.png" height="200" width="190"/></div>
                <div class="text"><input class="username" type="email" name="email" placeholder="Enter Email" required autofocus/></div>
            </div>
            <p class="username_text"></p>
            <div class="submit">
                <button type="submit" name="submit">submit</button> 
            </div>
        </form>
    </div>
</div>

</head>
<body>
</body>
</html>