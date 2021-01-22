<?php
session_start();

include '../config.php';

$course_id = $_GET['id']; //get selected student id from admin-viewStudent.php

$result = mysqli_query($db,"SELECT * FROM courses WHERE course_id ='$course_id'");

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	while ($row = mysqli_fetch_assoc($result))
	{
        $course_id = $row['course_id'];
		$title = $row['title'];
        $unit =  $row['unit'];
        $department =  $row['department'];
        $course_lecturer =  $row['course_lecturer'];
        $semester =  $row['semester'];
        $time =  $row['time'];
        $location = $row['location'];
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GROUP 404 | Update Course Detail</title>
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
                            <h3 class="box-title">Update Course Detail</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form id="" action="scripts/admin-updateCourse.php" name="update" onsubmit="return updateStudent()" method="POST">
                          <div class="box-body">
                            <div class="form-group">
                                <label for="course_id">Course ID</label>
                                <input type="text" class="form-control" readonly id="course_id" name="course_id" value="<?php echo $course_id; ?>">
                            </div>
                            <div class="form-group">
                                <label for="coursetitle">Course Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>">
                            </div>
                            <div class="form-group">
                                <label for="courseunit">Credit Hours</label>
                                <input type="text" class="form-control" id="unit" name="unit" value="<?php echo $unit; ?>">
                            </div>
                            <div class="form-group">
                                <label for="department">Department</label>
                                <input type="text" class="form-control" id="department" name="department" value="<?php echo $department; ?>">
                            </div>   
                            <div class="form-group">
                                <label for="courselecturer">Lecturer</label>
                                <input type="text" class="form-control" id="course_lecturer" name="course_lecturer" value="<?php echo $course_lecturer; ?>">
                            </div>
                            <div class="form-group">
                                <label for="coursesemester">Semester</label>
                                <input type="text" class="form-control" id="semester" name="semester" value="<?php echo $semester; ?>">
                            </div>
                            <div class="form-group">
                                <label for="time">Class Time</label>
                                <input type="text" class="form-control" id="time" name="time" value="<?php echo $time; ?>">
                            </div>      
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location" value="<?php echo $location; ?>">
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