<?php
session_start();

include '../config.php';
if(!isset($_SESSION["euid"]))
{
    header("Location:../login.php");
}

$id = $_SESSION["euid"];

$sql = "SELECT * FROM sessions WHERE status = 1";
$xresult = mysqli_query($db, $sql);

$sql = "SELECT DISTINCT(r.sid) as id, COUNT(r.course_id) as totalregistered, SUM(c.unit) as total FROM course_registered r, courses c WHERE  r.sid = '$id' and c.course_id = r.course_id";
$tresult = mysqli_query($db, $sql);

$sql = "SELECT DISTINCT(r.course_id), c.title, c.unit FROM course_registered r, courses c, student s WHERE r.sid = '$id' AND r.course_id = c.course_id";
$cresult = mysqli_query($db, $sql);
$studentcount = mysqli_num_rows($cresult);

$result = mysqli_query($db, "SELECT * FROM student WHERE euid = '$id'");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result))
    {
        $sid = $row['euid'];
        $fname=$row['first_name'];
		$lname=$row['last_name'];
		$level=$row['level'];
		$department=$row['department'];
        $cos=$row['courseofstudy'];
        $profileimg=$row['profileimg'];
?>
<?php
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>GROUP 404 | Print Form</title>
        <link rel="icon" href="../img/unt_icon.png"> <!-- show unt logo -->
        <link href="../css/portalcss.css" rel="stylesheet" type="text/css"> 
        <link rel="STYLESHEET" href="../css/root.css" type="text/css">
        <link rel="STYLESHEET" href="../css/cps.css" type="text/css">
        <link rel="STYLESHEET" href="../css/innsci.css" type="text/css">
        
        <script src="../css/SpryTabbedPanels.js.download" type="text/javascript"></script>
        <link href="../css/SpryTabbedPanels.css" rel="stylesheet" type="text/css">

    </style>
    </head>
    <body leftmargin="0" topmargin="0" onload="javascript:window.print();">
    
        <table cellpadding="5" cellspacing="0" width="923">
            <tbody>
                <tr>
                <td colspan="4"><table width="100%" border="2" bordercolor="#000000">
                        <tbody><tr>
                            <td><table width="100%" border="0" cellpadding="2">
                                    <tbody>
                                        <tr>
                                        <td colspan="3" align="center">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="3">
                                            <tbody><tr>
                                                    <td width="18%" rowspan="3" align="right" valign="top"><img src="../img/logo.png" alt="LOGO" width="172" height="123" align="right" style="float:left; padding-left:2%"></td>
                                                    <td width="63%" align="center" valign="top">&nbsp;</td>
                                                    <td width="19%" rowspan="3" align="center" valign="middle">
                                                        
                                                        <img src="../profileimg/<?php echo $profileimg ?>" width="100" height="100"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top"><span class="title1">UNIVERSITY OF NORTH TEXAS </span><br></td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="middle"><span class="title2">Student's Course Registration.</span></td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </td>
                                        </tr>
                                        <tr>
                                        <td colspan="3" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                                                <tbody><tr>
                                                    <td colspan="4" align="left" valign="top" class="head1">SEMESTER INFORMATION </td>
                                                </tr>
                                                <tr>
                                                <?php
                                                if (mysqli_num_rows($xresult) > 0) {
                                                    // output data of each row
                                                    while ($row = mysqli_fetch_assoc($xresult))
                                                    {
                                                        
                                                        $sessionid=$row['sessionid'];
                                                        $semester=$row['semester'];
                                                    }}?>
                                                    <td width="16%" height="23" align="left" valign="top" class="mspmytext"><strong>YEAR</strong></td>
                                                    <td width="37%" align="left" valign="top" class="tableCellUnderline"><?php echo $sessionid ?> </td>
                                                    <td width="12%" align="left" valign="top" class="mspmytext"><strong>SEMESTER</strong></td>
                                                    <td width="35%" align="left" valign="top" class="tableCellUnderline"><?php echo $semester ?></td>
                                                  
                                                    </tr>
                                            </tbody></table></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="center" valign="top" class="bheader"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                                                <tbody><tr>
                                                    <td height="24" colspan="4" align="left" valign="top" class="head1">PERSONAL INFORMATION </td>
                                                </tr>
                                                <tr>
                                                    <td width="14%" align="left" valign="top" class="mspmytext"><strong>FULL NAME </strong></td>
                                                    <td width="36%" align="left" valign="top" class="tableCellUnderline"><?php echo strtoupper($fname." ".$lname); ?></td>
                                                    <td width="15%" align="left" valign="top" class="mspmytext"><strong>EUID </strong></td>
                                                    
                                                    <td width="35%" align="left" valign="top" class="tableCellUnderline"><?php echo strtoupper($sid); ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" class="mspmytext"><strong>DEPARTMENT</strong></td>
                                                    
                                                    <td align="left" valign="top" class="tableCellUnderline"><?php echo $department; ?></td>
                                                    <td align="left" valign="top" class="mspmytext"><strong>MAJOR </strong></td>
                                                    
                                                    <td align="left" valign="top" class="tableCellUnderline"><?php echo $cos; ?></td>
                                                </tr>
                                            </tbody></table></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="center" valign="top"><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#999999">
                                                <tbody><tr>
                                                    <td colspan="2" align="left" valign="top" class="head1">REGISTRATION INFORMATION </td>
                                                </tr>
                                                <tr>
                                                    <td width="14%" align="left" valign="top" class="tableHeader">COURSE ID </td>
                                                    <td width="51%" align="left" valign="top" class="tableHeader">COURSE TITLE </td>
                                                    <td width="27%" align="left" valign="top" class="tableHeader">CREDIT HOURS </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td colspan="3" align="left" valign="top" class="head1">COURSES </td>
                                                </tr>
                                                
                                                <?php
                                                if (mysqli_num_rows($cresult) > 0)
                                                 {
                                                     while ($srow = mysqli_fetch_assoc($cresult))
                                                     {
                                                         echo "<tr class='tableCellEven'>";
                                                         echo " <td align='left' valign='top'>" . $srow["course_id"] . "</td>";
                                                         echo "<td align='left' valign='top'>" . $srow["title"] . "</td>";
                                                         echo "<td align='left' valign='top'>" . $srow["unit"] . "</td>";
                                                         echo "</tr>";
                                                     }
                             
                                                 }
                                                 else
                                                 {
                                                     echo "<tr align='center'>
                                                     <td colspan='3' valign='top' class='red'>No Course(s) found </td>
                                                 </tr>";
                                                 }
                                                ?>
                                                <tr>
                                                    <td colspan="3" align="left" valign="top">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                <?php
                                                if (mysqli_num_rows($tresult) > 0)
                                                 {
                                                     while ($srow = mysqli_fetch_assoc($tresult))
                                                     {
                                                         echo "<tr>";
                                                         echo " <td colspan='2' align='center' valign='top'><strong>Total Credit Registered </strong></td> ";
                                                         echo "<td align='left' valign='top'><input name='tcu' type='text' class='cssInputAlt' id='tcu' size='10' readonly='' value=".$srow["total"]."></td>";
                                                         echo "</tr>";
                                                     }
                             
                                                 }
                                                 else
                                                 {
                                                    
                                                 }
                                                ?>
                                            </tbody></table></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="center" valign="top"><table width="100%" border="0" align="left">
                                                <tbody><tr>
                                                    <td align="right">&nbsp;</td>
                                                    <td align="center">&nbsp;</td>
                                                    <td align="right">&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td align="right">&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="35" align="right" valign="top"><strong>Name:</strong></td>
                                                    <td height="35" align="center" valign="bottom">......................................................................................<br>
                                                        (Candidate)</td>
                                                    <td height="35" align="right" valign="middle"><strong>Signature:</strong></td>
                                                    <td height="35" align="left" valign="middle">......................................</td>
                                                    <td height="35" align="right" valign="middle"><strong>Date:</strong></td>
                                                    <td height="35" align="left" valign="middle">..........................</td>
                                                </tr>
                        
                                                <tr>
                                                    <td height="35" align="right" valign="top"><strong>Name:</strong></td>
                                                    <td height="35" align="center" valign="bottom">......................................................................................<br>
                                                        (Head of Department)</td>
                                                    <td height="35" align="right" valign="middle"><strong>Signature:</strong></td>
                                                    <td height="35" align="left" valign="middle">......................................</td>
                                                    <td height="35" align="right" valign="middle"><strong>Date:</strong></td>
                                                    <td height="35" align="left" valign="middle">..........................</td>
                                                </tr>
                                              
                                                <tr>
                                                    <td colspan="6"><strong>Note</strong>: <strong></strong></td>
                                                </tr>
                                            </tbody></table></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="right" valign="top"><?php echo strtoupper($fname.", ".$lname); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="14%">&nbsp;</td>
                                        <td width="32%">&nbsp;</td>
                                        <td width="54%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><div align="center"><a href="javascript:print();">[ Click to Print ]</a> </div></td>
                                    </tr>
                                </tbody></table></td>
                        </tr>
                    </tbody></table></td>
            </tr>
            <tr>
                <td width="164">&nbsp;</td>
                <td width="164">&nbsp;</td>
                <td width="164">&nbsp;</td>
                <td width="389">&nbsp;</td>
            </tr>
            
        </tbody></table>
        <script type="text/javascript">
            <!--
            var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
//-->
        </script>
    <?php
	}
} else {
	echo "No data found";
}?>
</body>
</html>
<?php
mysqli_close($db);
?>