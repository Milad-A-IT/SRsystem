<?php
session_start();
include '../config.php';

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
 
    <script src="../js/jquery.min.js"></script>
	<script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.select.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>   
    <script src="https://kit.fontawesome.com/yourcode.js"></script>


    
</head>
  <body id="#home">     
    <div class="container-fluid">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Course Registered Student</h3>
            </div>
        <br>
        <br>
        <table id='theTable' class="display" style='width:100%;'>
			<thead>
			<tr>
				<th class='col-6'>Course ID</th>
				<th class='col-6'>Course Title</th>
				<th class='col-6'>Total Students</th>
			</tr>
			</thead>
      <tfoot></tfoot>
		</table>
    <br>
    <br>
        <a href="adminHome.php"><button type="button" class="update-button btn btn-success fas fa-angle-left"> Cancel</button></a>
    </div>
  </div>
</div>
<!---Scripts-->
<script type="text/javascript">
var table;
$( document ).ready(function() {
	
    $('#level').change(function(){
    
       $('#theTable').dataTable({
       "ajax": {
           url: 'scripts/admin-viewRegisteredStudent.php',
           data: { param1: $(this).val()},
           type: "GET",
           context: document.body
       },
       
       "columns": [
			    {"data": "course_id"},
			    {"data": "title"},
			    {"data": "total"},
       ],
        });
    })
	
	  table = $('#theTable').DataTable({
	  "ajax": {
		    url: 'scripts/admin-viewRegisteredStudent.php',
        data: { param1: ""},
        type: "GET",
	  },
	  select: true,
	  destroy: true,
		  "columns": [
			    {"data": "cid"},
			    {"data": "title"},
			    {"data": "total"},
		  ],
      "footerCallback": function ( row, data, start, end, display ) {
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

      }
    });
	
	$('#theTable tbody').on( 'click', 'tr', function () {
		clickedId = $(this).find("td").eq(0).text();
        console.log(clickedId);
	});
});

</script>
</body>
</html>