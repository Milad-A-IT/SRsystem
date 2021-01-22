<?php
session_start();
include '../../config.php';

if(!isset($_SESSION["euid"]))
{
	header("Location: ../../login.php");
}

$id = $_SESSION["euid"];
$sql = "SELECT * FROM student WHERE euid = '$id'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);

  $csql = "SELECT c.course_id as id, c.title as coursename, c.unit as unit, c.course_lecturer as lecturer, c.location as location, c.semester as semester, c.time as classTime FROM courses c, department d WHERE c.course_id NOT IN ( SELECT course_id FROM cart WHERE sid='$id' ) AND c.course_id NOT IN ( SELECT course_id FROM course_registered WHERE sid='$id') AND d.dept_name = 'MATHEMATICS' AND c.department = d.dept_id AND c.semester = 'FALL'";
  $cresult = mysqli_query($db, $csql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GROUP 404 | Register Course</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" href="../../img/unt_icon.png"> <!-- show unt logo -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="../../css/studentHome.css">
    <link rel="stylesheet" href="../../css/adminLTE.css">
    <link rel="stylesheet" href="../../css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../css/select.dataTables.min.css">
    <link type="text/css" href="../../css/dataTables.checkboxes.css" rel="stylesheet" />
    <script src="../../js/dataTables.checkboxes.min.js"></script>
    <script src="../../js/jquery.min.js"></script>
		<script src="../../js/jquery-1.12.4.js"></script>
    <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/dataTables.select.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>  
    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('../../img/pageloader.gif') 50% 50% no-repeat rgb(249,249,249);
            opacity: .6;
        }
    </style> 

    
</head>
  <body id="#home">     
    <div class="loader"></div>
    <?php
      if(mysqli_num_rows($cresult) > 0)
      {
    ?>
        <div class="container-fluid">
          <div class="box box-primary">
          <br>
          <br>
          <br>
          <table id='theTable' class="display" style='width:100%;'>
          <thead>
			      <tr>
              <th></th>
				      <th class='col-6'>Course ID</th>
				      <th class='col-6'>Course Title</th>
				      <th class='col-6'>Credit</th>
              <th class='col-6'>Course Lecturer</th>
              <th class='col-6'>Class Time</th>
              <th class='col-6'>Location</th>
            </tr>
          </thead>
            <?php
              while($crow = mysqli_fetch_array($cresult))
              {
            ?>
                <tr id="<?php echo $crow["id"]; ?>]">
                    <td><input type="checkbox" name="course_id[]" class="addcourse" value="<?php echo $crow["id"];?>"/></td>
                    <td><?php echo $crow["id"];?></td>
                    <td><?php echo $crow["coursename"];?></td>
                    <td><?php echo $crow["unit"];?></td>
                    <td><?php echo $crow["lecturer"];?></td>
                    <td><?php echo $crow["classTime"];?></td>
                    <td><?php echo $crow["location"];?></td>
                </tr>
            <?php
              }
            ?>
            <tfoot>
            </tfoot>
          </table>
          <br>
		      <br>
		      <button type="button" class="btn btn-success" name="btn_add" id="btn_add">Add to Shopping Cart</button>	
      </div>
    </div>
    <?php
      }
      else
      {
    ?>
          <div class="container-fluid">
          <div class="box box-primary">
          <br>
          <br>
          <br>
          <table id='theTable' class="display" style='width:100%;'>
          <thead>
			      <tr>
              <th></th>
				      <th class='col-6'>Course ID</th>
				      <th class='col-6'>Course Title</th>
				      <th class='col-6'>Credit</th>
              <th class='col-6'>Course Lecturer</th>
              <th class='col-6'>Class Time</th>
              <th class='col-6'>Location</th>
            </tr>
          </thead>
          </table>
          <br>
		      <br>
		      <button type="button" class="btn btn-success" name="btn_add" id="btn_add">Add to Shopping Cart</button>	
      </div>
    </div>
    <?php
      }
    ?>

  </div>
  </body>
</html>
<!---Scripts-->
<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut("slow");
    });
  var table;
  $( document ).ready(function(){
    table = $('#theTable').DataTable({
      "footerCallback": function (row, data, start, end, display ) {
        var api = this.api(), data;
 
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ?
            i.replace(/[\$,]/g, '')*1 :
              typeof i === 'number' ?
                i : 0;
        };
 
        // Total over all pages
        total = api
            .column( 2 )
            .data()
            .reduce( function (a, b) {
              return intVal(a) + intVal(b);
        }, 0 );
 
        // Total over this page
        pageTotal = api
              .column( 2, { page: 'current'} )
              .data()
              .reduce( function (a, b) {
                return intVal(a) + intVal(b);
              }, 0 );

          // Update footer
          $( api.column( 2 ).footer() ).html(
              pageTotal +' ('+ total +' units)'
          );
      }
      
    });

$('#btn_add').click(function(){

var id = []; //use to store the courses selected

//store the courses into array
$(':checkbox:checked').each(function(i){
  id[i] = $(this).val();
});

if(id.length === 0) //tell you if the array is empty
{
    alert("Please select at least one course");
}
else if(confirm("Confirm to add the course to shopping cart?"))
{
  $.post("../scripts/student-registerCourse_check.php",
    {
      "id" : id
    },
		function(result){
		  if($.trim(result) == "error"){
			  alert("Fail to Add Course to Shopping Cart");
	  	} else {
			  alert("Course Added Successfull");
		  }
      document.location="student-registerCourse-math.php";
    }
    );
}
else
{
  return false;
}
});
  });

</script>