<?php
session_start();
include '../config.php'; //connect database

//get euid from login.php entered by user
if(!$_SESSION['euid']) {
    header("location: ../login.php");
}
$euid = $_SESSION["euid"];

//SQL query to pull the information from database
$result = mysqli_query($db, "SELECT * FROM student WHERE euid = '$euid'");
if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $euid = $row['euid'];
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $email = $row['email'];
        $department = $row['department'];
        $addr = $row['addr'];
        $gender = $row['gender'];
        $major = $row['courseofstudy'];
        $gpa = $row['gpa'];
        $phone = $row['phone'];
        $dob = $row['dob'];
        $password = $row['password'];
        $lastlogin = $row['lastlogin'];
        $profileimg = $row['profileimg'];
    }
}
//formatting the phone number to xxx-xxx-xxxx
if(ctype_digit($phone) && strlen($phone) == 10) {
    $phone = substr($phone, 0, 3) .'-'.substr($phone, 3, 3) .'-'.substr($phone, 6);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> GROUP 404 | Student Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="../img/unt_icon.png"> <!-- show unt logo -->
    <link rel="stylesheet" href="../css/studentbootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="../css/studentHome.css">
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/select.dataTables.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>	
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('../img/pageloader.gif') 50% 50% no-repeat rgb(249,249,249);
            opacity: .6;
        }
    </style>

</head>

<body id="#home">
<div class="loader"></div>
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" style="font-size:18px;">
                   &#9776; MENU
                </button>
                <a href="student-home.php" class="navbar-brand"> GROUP 404 | Student Profile</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li><a href="student-home.php" class="fas fa-home"> Home Page</a></li> <!-- Direct the user back to homepage -->
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href=""> Welcome <b><?php echo $fname; ?></b></a></li>
                    <li><?php echo "<a href='../logout.php'><span class='fas fa-sign-out-alt'></span> Logout</a>"; ?></li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <!-- Profile Image -->
                <div class="box box-success">
                    <div class="box-body box-profile">
                        <!--display profile img -->
                        <img class="profile-user-img img-responsive img-circle" src="../profileimg/<?php echo $profileimg ?>" alt="Student profile picture" width="150" height="150">
                        <!--display first & last name -->
                        <h3 class="profile-username text-center"><?php echo $fname." ". $lname;?></h3>
                        <!--display euid-->
                        <p class="text-muted text-center"><?php echo $euid;?></p>
                        
                        <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b class="fa fa-address-book"> Address</b> <a class="pull-right"><?php echo $addr;?></a>
                        </li>
                        <li class="list-group-item">
                            <b class="fas fa-user-alt"> Gender</b> <a class="pull-right"><?php echo $gender;?></a>
                        </li>
                        <li class="list-group-item">
                            <b class="fas fa-envelope"> Email</b><a class="pull-right glyphicon"><?php echo $email;?> </a>
                        </li>
                        <li class="list-group-item">
                            <b class="fas fa-phone"> Phone Number</b><a class="pull-right"><?php echo $phone;?> </a>
                        </li>
                        <li class="list-group-item">
                            <b class="fas fa-birthday-cake"> Date of Birth</b><a class="pull-right"><?php echo $dob;?></a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
          
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">School Information</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b class="fas fa-school"> Department</b> <a class="pull-right"><?php echo $department;?></a>
                            </li>
                            <li class="list-group-item">
                                <b class="fas fa-pencil-alt"> GPA</b> <a class="pull-right"><?php echo $gpa;?></a>
                            </li>
                            <li class="list-group-item">
                                <b class="fas fa-book-reader"> Major</b> <a class="pull-right"><?php echo $major;?></a>
                            </li>
                            <li class="list-group-item">
                                <b class="fas fa-sign-in-alt"> Last Login</b> <a class="pull-right"><?php echo $lastlogin;?></a>
                            </li>
                        </ul>
                        <a href="student-editProfile.php" class="btn btn-success btn-flat fas fa-edit "> Edit</a>
                        <a href="student-changePassword.php" class="btn btn-success btn-flat fas fa-key"> Change Password</a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                </div>
        </div>
    </div>
    <footer>    
            <section class="copyrights">
                <section class="mainWrap">
                    <span class="info">
                         <span>Phone：123-456-7899</span>
                         <span>Email：itcapstone@group404.com</span>
                         <span>Address：1155 Union Circle #311277 Denton, Texas 76203-5017 </span>
                         <span style="padding: 0 0 0 68%"><b>Copyright &#169;  IT Capstone GROUP 404</b> </span>
                    </span>
               </section>
            </section>
        
    </footer>
</body>
</html>

<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut("slow");
    });
</script>