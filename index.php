<?php

include('mess_page.php');
$result1=$link->query("SELECT * FROM `mess_info` WHERE mess_id='".$_SESSION['mess_id']."'");
$row1=mysqli_fetch_array($result1);
$messname=$row1['mess_name'];
$date= date('Y-m-d', strtotime("+5 hours 30 min"));
?>

<div class="container" style="margin-top:30px">
  <div class="card">
   <div class="card-header">
      <div class="row">
        <div class="col-md-9">Take Attendance</div>
        <div class="col-md-3" align="right">
         <!-- <button type="button" id="report_button" class="btn btn-danger btn-sm">Report</button>
          <button type="button" id="add_button" class="btn btn-info btn-sm">Add</button>-->
          <div class="col-md-9" id="time"></div>
        </div>
      </div>
    </div>
   <div class="card-body">
    
    <button type="button" class="btn btn-primary btn-lg btn-block" id="start">START ATTTENDANCE</button>

  
   </div>
  </div>
  <br>
  <div class="card">
   <div class="card-header">
      <div class="row">
        <div class="col-md-9">STUDENT APPLIED FOR GRACE TODAY</div>
        
      </div>
    </div>
   <div class="card-body">
    <div class="table-responsive">
        <span id="message_operation"></span>
     <table class="table table-striped table-bordered" id="student_table">
      <thead>
       <tr>
       <th>Grace ID</th>
        <th>Requested By</th>
        <th>Requested for(Date)</th>
        <th>ID</th>
              
       <!-- <th>Edit</th>
        <th>Delete</th>-->
       </tr>
      </thead>
      <tbody>
      <?php 
      
      $result=$link->query("SELECT * FROM `grace_info` INNER JOIN `student_info` ON grace_info.id=student_info.ID WHERE Mess='$messname' AND Date='$date'") or die(mysqli_error());
      while($row = $result->fetch_array()){   
      ?>
      <tr>
      <td><?php echo $row['Grace_id'] ?></td>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['Date'] ?></td>
      <td><?php echo $row['id'] ?></td>
      </tr>
      <?php
      }
      ?>

      </tbody>
     </table>
    </div>
   </div>
  </div>



</div>

</body>
</html>

<script>

$(document).ready(function(){
         function getdate(){
                var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
             if(s<10){
                 s = "0"+s;
             }
             if (m < 10) {
                m = "0" + m;
            }
            $("#time").text(h+" : "+m+" : "+s);
             setTimeout(function(){getdate()}, 500);
            }

      getdate();
       
        $('#start').click(function(){
    document.location.href="login.php";
})
var dataTable = $('#student_table').DataTable();
    
    });

</script>