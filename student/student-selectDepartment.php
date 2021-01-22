<!DOCTYPE html>
<html lang="en">
<head>
    <title>GROUP 404 | Select Department</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" href="../img/unt_icon.png"> <!-- show unt logo -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="../css/main-style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/base-loading.js"></script>
    
    <style>
        body
        {
            background-image: url("../img/bgImg .jpg");;
        }
        footer
        {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
    <body id="#home">
        <br>
        <br>   
        <div id="login-section">
        
            <h1 id="login-head">Course Department</h1>
            <br />
            <div class="form-group">
                <select onchange="javascript:location.href = this.value;">
                    <option value=""><strong>Choose Below:</strong></option>
                    <option name="ACCOUNTING" value="dept/student-registerCourse-acct.php">ACCOUNTING</option>
                    <option name="COMPUTER SCIENCE" value="dept/student-registerCourse-csce.php">COMPUTER SCIENCE</option>
                    <option name="ENTREPRENEURSHIP" value="dept/student-registerCourse-entre.php">ENTREPRENEURSHIP</option>
                    <option name="MATHEMATICS" value="dept/student-registerCourse-math.php">MATHEMATICS</option>
                    <option name="PHYSICS" value="dept/student-registerCourse-phys.php">PHYSICS</option>
                </select>
            </div>
        </div>        
	</body>
</html>
