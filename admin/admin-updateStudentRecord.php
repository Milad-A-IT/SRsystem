<?php
session_start();

include '../config.php';

$euid = $_GET['id']; //get selected student id from admin-viewStudent.php

$result = mysqli_query($db,"SELECT * FROM student WHERE euid ='$euid'");

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	while ($row = mysqli_fetch_assoc($result))
	{
        $euid = $row['euid'];
		$fname = $row['first_name'];
        $lname =  $row['last_name'];
        $password =  $row['password'];
        $email =  $row['email'];
        $gpa =  $row['gpa'];
        $dob =  $row['dob'];
        $addr =  $row['addr'];
        $phone =  $row['phone'];
        $major =  $row['courseofstudy'];
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GROUP 404 | Update Student Record</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" href="../img/unt_icon.png"> <!-- show unt logo -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="../css/admin-style.css">
    <link rel="stylesheet" href="../css/adminLTE.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>	
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
</head>
    <body id="#home"> 
        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-9">
                    <div class="box box-primary">
                    <br>
                        <div class="box-header with-border">
                            <h2>Admin ID: <?php echo $_SESSION["euid"]; ?></h2>
                            <h3 class="box-title">Update Student Record</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form id="" action="scripts/admin-updateStudent.php" name="update" onsubmit="return updateStudent()" method="POST">
                          <div class="box-body">
                            <div class="form-group">
                                <label for="student_id">Student ID</label>
                                <input type="text" class="form-control" readonly id="euid" name="euid" value="<?php echo $euid; ?>">
                            </div>
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="fname" name="first_name" value="<?php echo $fname; ?>">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="last_name" value="<?php echo $lname; ?>">
                            </div>
                            <div class="form-group">
                                <label for="courseofstudy">Major</label>
                                <input type="text" class="form-control" id="cos" name="courseofstudy" value="<?php echo $major; ?>">
                            </div>   
                            <div class="form-group">
                                <label for="gpa">GPA</label>
                                <input type="text" class="form-control" id="gpa" name="gpa" value="<?php echo $gpa; ?>">
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
                            </div> 
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $addr; ?>">
                            </div>        
                          </div>
                          <!-- /.box-body -->
                          <button type="submit" class="update-button btn btn-success fas fa-save"> Update</button>
                          <a href="admin-viewStudent.php"><button type="button" class="update-button btn btn-success fas fa-times"> Cancel</button></a>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
              </div>
          </div>
      </body>
</html>
