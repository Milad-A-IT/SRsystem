<?php
session_start();
include '../config.php';

if(!isset($_SESSION["euid"]))
{
	header("Location: ../login.php");
}

$aid = $_SESSION["euid"];

$sql = "SELECT * FROM admin WHERE euid = '$aid'";
$sresult = mysqli_query($db, $sql);
$srow = mysqli_fetch_assoc($sresult);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GROUP 404 | Change Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/unt_icon.png"> <!-- show unt logo -->

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="../css/studentHome.css">
    
    <script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/password-validation.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="../js/base-loading.js"></script>
</head>
    <body>
        
        <nav class="navbar navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
						MENU                        
					</button>
					<a href="home.php" class="navbar-brand"> GROUP 404 | Change Password</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav">
						
                        <li><?php echo "<a href=admin-profile.php?euid=" . $srow["euid"] . "><span class='glyphicon glyphicon-user'></span> Profile</a>"; ?></li>
				        
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><?php echo "<a href='../logout.php'><span class='fas fa-sign-out-alt'></span> Logout</a>"; ?></li>
					</ul>
				</div>
			</div>
		</nav>
        
        <div class="container">
        <br>
        <br>
            <div id="settings-section"><br />
                <div class="row">
                    <div class="col-sm-3">
                        <div class="panel">
                            <div class="panel-heading">Menu</div>
                            <div class="panel-body">   
                                    <li><a href="admin-home.php">Home Page</a></li>
                                    <li><a href="admin-profile.php">Profile</a></li> 
                            </div>
                        </div> 
                    </div>
                    
                    <div class="col-sm-9">
                        <div class="well">
                            <div class="settings">
                                <h2 id="white" style="text-decoration:underline;"><?php echo $srow["first_name"]; ?>'s Password</h2>
                                    <form action="scripts/admin-changePassword.php" name="newpassform" onsubmit="return CheckPasswordStudent()" method="POST">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="student" value="<?php echo $_SESSION["euid"]; ?>">
                                    </div>
                                    <?php 
                                        //diplay error message if no data input or input wrong current password
                                        if(!empty($_GET['error1'])){
                                            $error=$_GET['error1'];
                                            if($error==1){
                                                echo "<div align='center'><font color ='red'>Invalid Current Password！</font></div>";
                                            }
                                        }
                                    ?>
                                    <div class="form-group">                                     
                                    <label for="oldpassword">Current Password</label>
                                        <input type="password" class="form-control" name="oldpass" placeholder="Current Password" required>
                                    <p id="opval" style="color: #FFFFFF;"></p>
                                    </div>
                                    <?php 
                                        //diplay error message if no data input or new password and confirm password not matches
                                        if(!empty($_GET['error2'])){
                                            $error=$_GET['error2'];
                                            if($error==1){
                                                echo "<div align='center'><font color ='red'>Password not matched！</font></div>";
                                            }
                                        }
                                    ?>

                                    <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" class="form-control" name="newpass" placeholder="New Password" required>
                                    <p id="npval" style="color: #FFFFFF;"></p>
                                    </div>
                                        
                                     <div class="form-group">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="password" class="form-control" name="cpass" placeholder="Confirm Password" required>
                                    <p id="cpval" style="color: #FFFFFF;"></p>
                                    <p id="pmval" style="color: #FFFFFF;"></p>
                                    </div>
                                        
                                    <br />
                                    <button type="submit" class="update-button btn btn-danger fas fa-save"> Update</button>
                                    <a href="admin-profile.php"><button type="button" class="update-button btn btn-warning fas fa-times">Cancel</button></a>
                                    </form>
                            </div>
                        </div> 
                    </div>
                    
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