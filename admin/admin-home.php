<?php
session_start();
include '../config.php'; //connect database

//get euid from login.php entered by user
if(!$_SESSION['euid']) {
    header("location: login.php");
}

//store the euid, use to search in sql query in line 12
$euid = $_SESSION["euid"];
$result = mysqli_query($db, "SELECT * FROM admin WHERE euid = '$euid'");

if(mysqli_num_rows($result) > 0) {
    //get data from database
    while ($row = mysqli_fetch_assoc($result)) {
        $euid = $row['euid'];
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $profileimg = $row['profileimg'];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GROUP 404 | Admin Home Page</title>
    <link rel="icon" href="../img/unt_icon.png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="../css/studentHome.css">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap1.min.css">
    <link rel="stylesheet" type="text/css" href="../css/menuBox.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="../js/base-loading.js"></script>
</head>

<body>

<nav class="navbar navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" style="font-size:18px;">
            &#9776; MENU       
        </button>
        <div class="cloud1" id="cloud1">
            <div class="box1">
                <img src="../img/unt_icon2.png" alt="cloud1" class="logo"> Admin
            </div>
            <a href="#" id="mynav-taggle"><span class="glyphicon glyphicon-align-justify" ></span></a>
        </div>
    </div>
    <!--    <div class="right-bar"> -->
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="admin-profile.php" style='color:white'><span class="glyphicon glyphicon-user"></span> Profile</a></li>
            <li><?php echo "<a href='../logout.php' style='color:white'><span class='glyphicon glyphicon-log-out' ></span> Logout</a>"; ?></li>
        <ul>
    </div>
</nav>

    <div class="main-menu">
        <div id="themenu" class="big-menu">
            <div class="leftbox">
                <div id="left-menu" class="list-group show-nav colorWhite">
                    <div class="hand">
                        <div class="handCenter">
                            <div class="radiusPhoto">
                                <a href="admin-profile.php"> <img src="../profileimg/<?php echo $profileimg ?>"> </a>
                                <p>Welcome <a href="admin-profile.php"><b><?php echo $fname." ". $lname;?></b></a></p>
                            </div>

                            <div class="logined">
                                <span class="fas fa-id-card"></span><?php echo $euid;?>
                            </div>
                        </div>
                    </div>
                    <ul>
                        <li><a href="adminHome.php" target="iframe_right" class="list-group-item menu-li"><i class="glyphicon glyphicon-home" style="margin-right:50px;"></i>Home Page</a></li>
                        <li><a href="admin-viewStudent.php" target="iframe_right" class="list-group-item"><i class="fas fa-user-graduate" style="margin-right:50px;"></i>Students</a></li>
                        <li><a href="admin-viewCourse.php" target="iframe_right" class="list-group-item"><i class="fas fa-book-open" style="margin-right:50px;"></i>Courses</a></li>
                    </ul>
                </div>
                <div id="right-menu" class="list-group hide-nav2 colorWhite">
                    <ul>
                        <li><a href="adminHome.php" target="iframe_right" class="list-group-item menu-li"><i class="glyphicon glyphicon-home" style="margin-right:50px;"></i></a></li>
                        <li><a href="admin-viewStudent.php" target="iframe_right" class="list-group-item"><i class="fas fa-user-graduate" style="margin-right:50px;"></i></a></li>
                        <li><a href="admin-viewCourse.php" target="iframe_right" class="list-group-item"><i class="fas fa-book-open" style="margin-right:50px;"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="right-box small-box " id="right-box"><iframe src="adminHome.php" name="iframe_right" class="iframe-box"></iframe></div>
    </div>

    <script src="../js/jquery-3.4.1.min.js"></script>
    <script>
        /*left menu*/
        $("#color-bar").click(function() {
            var tools = $("#tools")
            if (tools.hasClass("showBlock")) {
                tools.addClass("noneBlock").removeClass("showBlock");
            } else if (tools.hasClass("noneBlock")) {
                tools.addClass("showBlock").removeClass("noneBlock");
            }
        })
        $("#mynav-taggle").click(function() {
                var MenuLeft = $("#left-menu");
                var MenuRight = $("#right-menu");
                var MenuCloud = $("#cloud1");
                var rightBox = $("#right-box");
                var TheMenu = $("#themenu");
                if (MenuLeft.hasClass("show-nav")) {
                    setTimeout(function() {
                        MenuLeft.addClass("hide-nav").removeClass("show-nav");
                        MenuCloud.addClass("hide-nav3").removeClass("show-nav");
                        MenuRight.addClass("show-nav").removeClass("hide-nav2");
                        rightBox.addClass("big-box").removeClass("small-box");
                        TheMenu.addClass("small-menu").removeClass("big-menu");
                    }, 100)
                } else {
                    setTimeout(function() {
                        MenuLeft.addClass("show-nav").removeClass("hide-nav");
                        MenuCloud.addClass("show-nav").removeClass("hide-nav3");
                        MenuRight.addClass("hide-nav2").removeClass("show-nav");
                        rightBox.addClass("small-box").removeClass("big-box");
                        TheMenu.addClass("big-menu").removeClass("small-menu");
                    }, 100)
                }
            })
    </script>
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