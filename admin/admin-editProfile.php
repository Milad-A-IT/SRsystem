<?php
session_start();
include '../config.php'; //connect database

//get euid from login.php entered by user
if(!$_SESSION['euid']) {
    header("location: ../login.php");
}
$euid = $_SESSION["euid"];

//SQL query to pull the information from database
$result = mysqli_query($db, "SELECT * FROM admin WHERE euid = '$euid'");
if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $euid = $row['euid'];
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $email = $row['email'];
        $addr = $row['addr'];
        $gender = $row['gender'];
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
    <title> GROUP 404 | Edit Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="../img/unt_icon.png"> <!-- show unt logo -->
    <link rel="stylesheet" href="../css/bootstrap2.min.css">
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
    <script src="../js/base-loading.js"></script>  

</head>

<body id="#home">
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    MENU
                </button>
                <a href="admin-home.php" class="navbar-brand"> GROUP 404 | Edit Profile</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li><a href="admin-home.php" class="fas fa-home"> Home Page</a></li> <!-- Direct the user back to homepage -->
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
        <form action="scripts/admin-editProfile.php" name="update" onsubmit="return CheckPasswordStudent()" method="POST">
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
                        <b class="fa fa-address-book"> Address</b> <input type="text" name="address" class="form-control" value="<?php echo $addr;?>"/>
                        </li>
                        <li class="list-group-item">
                            <b class="fas fa-user-alt"> Gender</b> <a class="pull-right"><?php echo $gender;?></a>
                        </li>
                        <li class="list-group-item">
                            <b class="fas fa-envelope"> Email</b><input type="text" name="email" class="form-control" value="<?php echo $email;?>"/>
                        </li>
                        <li class="list-group-item">
                            <b class="fas fa-phone"> Phone Number</b><input type="text" name="phone" class="form-control" value="<?php echo $phone;?>"/>
                        </li>
                        <li class="list-group-item">
                            <b class="fas fa-birthday-cake"> Date of Birth</b><a class="pull-right"><?php echo $dob;?></a>
                        </li>
                        <li class="list-group-item">
                            <b class="fas fa-sign-in-alt"> Last Login</b> <a class="pull-right"><?php echo $lastlogin;?></a>
                        </li>
                        </ul>
                            <button type="submit" class="update-button btn btn-success fas fa-save"> Update</button>
                            <a href="admin-profile.php"><button type="button" class="update-button btn btn-success fas fa-times"> Cancel</button></a>
                    </div>
                </div>
            </div>
        </form>
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