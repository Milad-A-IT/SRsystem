<?php
session_start();
include '../config.php';

$cresult = mysqli_query($db,"SELECT euid as id, first_name as firstname, last_name as lastname, gender as gender, courseofstudy as major, gpa as gpa, dob as dob, email as email, phone as phone, addr as addr, lastlogin as last_login FROM student");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>GROUP 404 | Students</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" href="../img/unt_icon.png"> <!-- show unt logo -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="../css/studentHome.css">
    <link rel="stylesheet" href="../css/adminLTE.css">
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/select.dataTables.min.css">
    <link type="text/css" href="../css/dataTables.checkboxes.css" rel="stylesheet" />
    <script src="../js/dataTables.checkboxes.min.js"></script>
    <script src="../js/jquery.min.js"></script>
		<script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.select.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>   
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
    <?php
      if(mysqli_num_rows($cresult) > 0)
      {
    ?>
        <div class="container-fluid">
          <div class="box box-primary">
          <br>
          <br>
          <div class="box-header with-border">
                <h3 class="box-title">All Students</h3>
          </div>
          <table id='theTable' class="display" style='width:100%;'>
          <thead>
			      <tr>
              <th></th>
				      <th class='col-6'>Student ID</th>
				      <th class='col-6'>First Name</th>
				      <th class='col-6'>Last Name</th>
              <th class='col-6'>Gender</th>
              <th class='col-6'>Major</th>
              <th class='col-6'>GPA</th>
              <th class='col-6'>Date of Birth</th>
              <th class='col-6'>Email</th>
              <th class='col-6'>Phone</th>
              <th class='col-6'>Address</th>
              <th class='col-6'>Last Login</th>
            </tr>
          </thead>
            <?php
              while($crow = mysqli_fetch_array($cresult))
              {
                $phone = $crow['phone'];
                //formatting the phone number to xxx-xxx-xxxx
                if(ctype_digit($phone) && strlen($phone) == 10) {
                  $phone = substr($phone, 0, 3) .'-'.substr($phone, 3, 3) .'-'.substr($phone, 6);
                }
            ?>
                <tr id="<?php echo $crow["id"]; ?>]">
                    <td><input type="checkbox" name="student_id[]" class="viewstudent" value="<?php echo $crow["id"];?>"/></td>
                    <td><?php echo $crow["id"];?></td>
                    <td><?php echo $crow["firstname"];?></td>
                    <td><?php echo $crow["lastname"];?></td>
                    <td><?php echo $crow["gender"];?></td>
                    <td><?php echo $crow["major"];?></td>
                    <td><?php echo $crow["gpa"];?></td>
                    <td><?php echo $crow["dob"];?></td>
                    <td><?php echo $crow["email"];?></td>
                    <td><?php echo $phone;?></td>
                    <td><?php echo $crow["addr"];?></td>
                    <td><?php echo $crow["last_login"];?></td>
                </tr>
            <?php
              }
            ?>
            <tfoot>
            </tfoot>
          </table>
          <br>
		      <br>
          <button type="button" class="btn btn-danger" name="btn_update" id="btn_update">Update</button>
          <button type="button" class="btn btn-success" name="btn_delete" id="btn_delete">Delete</button>	
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

//only allow user to check one checkbox
$(function () {
  $("input").change(function (e) {
    e.preventDefault();
    if ($(this).is(":checked")) {
      $("input").prop("checked", false);
      $(this).prop("checked", true);
    }  
  });
});


$('#btn_delete').click(function(){

var id = []; //use to store the courses selected

//store the courses into array
$(':checkbox:checked').each(function(i){
  id[i] = $(this).val();
});

if(id.length === 0) //tell you if the array is empty
{
    alert("Please select at least one student");
}
else if(confirm("Confirm to delete?"))
{
    $.post("scripts/admin-deleteStudent.php",
    {
      "id" : id
    },
		function(result){
		  if($.trim(result) == "error"){
			  alert("Fail to delete");
	  	} else {
			  alert("Student deleted");
		  }
      document.location="admin-viewStudent.php";
    }
    );
}
else
{
  return false;
}
});


$('#btn_update').click(function(){

var id = []; //use to store the courses selected

//store the courses into array
$(':checkbox:checked').each(function(i){
  id[i] = $(this).val();
});

if(id.length === 0) //tell you if the array is empty
{
    alert("Please select at least one student");
}
else if(confirm("Confirm to update?"))
{
  $.ajax({
      url:'admin-updateStudentRecord.php',
      method:'POST',
      data:{id:id},
      success:function(data)
      {
        window.location = "admin-updateStudentRecord.php?id="+id;
      }
      
    });

}
});
});

</script>