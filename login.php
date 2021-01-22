<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>GROUP 404 | Login</title>
<link rel="stylesheet" href="css/style1.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="img/unt_icon.png">
<script src="js/login.js"></script>
<script src="js/base-loading.js"></script>

</head>
<body>

    <div class="content">
    <!-- student login -->
    <form id="info" action="student/scripts/student-loginCheck.php" target="_self" method="post">
        <div class="form sign-in">
            <h2>Student Login</h2>
            <!--Display error message if euid/password does not matches -->
            <?php 
                if(!empty($_GET['error'])){
                    $error=$_GET['error'];
                    if($error==1){
                        echo "<div align='center'><font color ='red'>Invalid EUID or Password！</font></div>";
                    }
                }
            ?>
            <label>
                <span>EUID</span>
                <input class="username" type="text" name="stu_euid" required autofocus />
            </label>
            <label>
                <span>Password</span>
                <input class="password1" type="password" name="stu_password" required autofocus/>
            </label>
            <p class="forgot-pass"><a href="student/student-forgotPassword.php">Forgot password？</a></p>
            <button id="login" type="submit" name="submit" class="button"><span> Login </span> </button>
        </div>
    </form>

        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <h2>Administrator？</h2>
                    <p>Login as Adminstrator here</p>
                </div>
                <div class="img__text m--in">
                    <h2>Student？</h2>
                    <p>Login as Student here</p>
                </div>
                <div class="img__btn">
                    <span class="m--up"> > </span>
                    <span class="m--in"> < </span>
                </div>
            </div>

        <!-- adminstrator login -->
        <form id="info" action="admin/scripts/admin-loginCheck.php" target="_self" method="post">
            <div class="form admin">
                <h2>Administrator Login</h2>
                <!--Display error message if euid/password does not matches -->
                <?php 
                    if(!empty($_GET['error1'])){
                        $error=$_GET['error1'];
                        if($error==1){
                            echo "<div align='center'><font color ='red'>Invalid EUID or Password！</font></div>";
                        }
                    }
                ?>
                <label>
                    <span>EUID</span>
                    <input class="username" type="text" name="admin_euid" required autofocus />
                </label>
                <label>
                    <span>Password</span>
                    <input class="password1" type="password" name="admin_password" required autofocus/>
                </label>
                <button id="login" type="submit" name="submit" class="button"><span> Login </span></button>

            </div>
        </form>
 
        </div>
    </div>

    <script src="js/script.js"></script>
    <script type="text/javascript">

    function do_login()
    {
        var euid=$("#stu_euid").val();
        var password=$("#stu_password").val();
        if(euid!="" && password!="")
        {
            $.ajax({
                type:'post',
                url:'student/scripts/student-loginCheck.php',
                data: $(this).serialize(),
                success:function(data){
  
                    if(data === 'success') //check database, if success, direct to studen-home.php
                    {
                        window.location.href="student/student-home.php";
                    }
                    else
                    {
                        alert("Wrong Credentials");
                    }
                }
            });
        }
        else
        {
            alert("Please fill all the Credentials");
        }

        return false;
    }

    function do_login2()
    {
        var euid=$("#admin_euid").val();
        var password=$("#admin_password").val();
        if(admin_euid!="" && admin_password!="")
        {
            $.ajax({
                type:'post',
                url:'admin/scripts/admin-loginCheck.php',
                data: $(this).serialize(),
                success:function(data){
                    if(data === 'success') //check database, if success, direct to admin-home.php
                    {
                        window.location.href="admin/admin-home.php";
                    }
                    else
                    {
                        alert("Wrong Details");
                    }
                } 
            });
        }
        else
        {
            alert("Please fill all the details");
        }

        return false;
    }
</script>
</body>

</html>