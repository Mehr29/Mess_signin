<?php

include('mess_page.php')

?>

<div class="container" style="margin-top:30px">
  <div class="card">
   <div class="card-header">
      <div class="row">
        <div class="col-md-9">Student List</div>
        <div class="col-md-3" align="right">
          <!--<button type="button" id="add_button" class="btn btn-info btn-sm">Add</button>-->
        </div>
      </div>
    </div>
   <div class="card-body">
    <div class="table-responsive">
        <span id="message_operation"></span>
     <table class="table table-striped table-bordered" id="student_table">
      <thead>
       <tr>
        <th>Student Name</th>
        <th>ID</th>
              <th>Total graces</th>
       <!-- <th>Edit</th>
        <th>Delete</th>-->
       </tr>
      </thead>
      <tbody>
      <?php 
      
      $result=$link->query("SELECT * FROM `student_info`INNER JOIN `mess_info` ON student_info.MESS= mess_info.mess_name WHERE mess_id='".$_SESSION['mess_id']."'" ) or die(mysqli_error());
      while($row = $result->fetch_array()){   
      ?>
      <tr>
      <td><?php echo $row['Name'] ?></td>
      <td><?php echo $row['ID'] ?></td>
      <td><?php echo $row['Total remaining Graces'] ?></td>
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
 var dataTable = $('#student_table').DataTable({
  "processing":true,
 /* "serverSide":true,
  "order":[],
  "ajax":{
   url:"student_action.php",
   type:"POST",
   data:{action:'fetch'}
  },
  "columnDefs":[
   {
    "targets":[4, 5],
    "orderable":false,
   },
  ],*/
  
});

 
});
</script>