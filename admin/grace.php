<?php

include('admin_page.php')

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
      
      $result=$link->query("SELECT * FROM `grace_info`") or die(mysqli_error());
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