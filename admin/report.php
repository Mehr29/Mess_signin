<?php
require_once "dompdf/autoload.inc.php";
use Dompdf\Dompdf;

//report.php
if(isset($_GET["action"]))
{
 include('db_connect.php');
 session_start();
 $output = '';
 if($_GET["action"] == "student_report")
 {
  if(isset($_GET["student_id"], $_GET["from_date"], $_GET["to_date"]))
  {   
   $pdf = new Dompdf();
   $query = "SELECT * FROM `mess_attendance` WHERE ID = '".$_GET["student_id"]."'";
   $result1=mysqli_query($link,$query) or die("Error");
   $result= mysqli_fetch_array($result1);
   
   foreach($result as $row)
   {
    $output .= '
    <style>
    @page { margin: 20px; }
    
    </style>
    <p>&nbsp;</p>
    <h3 align="center">Mess Attendance Report</h3><br /><br />
    <table width="100%" border="0" cellpadding="5" cellspacing="0">
           <tr>
               <td width="25%"><b>Student Name</b></td>
               <td width="75%">'.$row["student_name"].'</td>
           </tr>
           <tr>
               <td width="25%"><b>ID</b></td>
               <td width="75%">'.$row["ID"].'</td>
           </tr>
           <tr>
               <td width="25%"><b>MESS</b></td>
               <td width="75%">'.$row["Mess"].'</td>
           </tr>
           <tr>
            <td colspan="2" height="5">
             <h3 align="center">Attendance Details</h3>
            </td>
           </tr>
           <tr>
            <td colspan="2">
             <table width="100%" border="1" cellpadding="5" cellspacing="0">
              <tr>
               <td><b>Date</b></td>
               <td><b>Type</b></td>
               
              </tr>
    ';
    $sub_query = "SELECT * FROM `mess_attendance` WHERE ID = '".$_GET["student_id"]."' AND (`date` BETWEEN '".$_GET["from_date"]."' AND '".$_GET["to_date"]."')  ORDER BY `date`";
    $result1=mysqli_query($link,$sub_query);
    $sub_result= mysqli_fetch_array($result1);
   
    foreach($sub_result as $sub_row)
    {
     $output .= '
      <tr>
       <td>'.$sub_row["date"].'</td>
            
       <td>'.$sub_row["type"].'</td>
      </tr>
     ';
    }
    $output .= '
      </table>
     </td>
     </tr>
    </table>
    ';
    $file_name = 'Mess Report.pdf';
    $pdf->loadHtml($output);
    $pdf->render();
    $pdf->stream($file_name);
    exit(0);
   }
  }
 }

 
}

?>
