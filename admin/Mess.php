<?php

include('admin_page.php');

?>

<div class="container" style="margin-top:30px">
  <div class="card">
   <div class="card-header">
      <div class="row">
        <div class="col-md-9">Mess List</div>
        <!--<div class="col-md-3" align="right">
          <button type="button" id="add_button" class="btn btn-info btn-sm">Add</button>
        </div>-->
      </div>
    </div>
   <div class="card-body">
    <div class="table-responsive">
        <span id="message_operation"></span>
     <table class="table table-striped table-bordered" id="mess_table">
      <thead>
       <tr>
        <th>Mess Name</th>
        <!--<th>Edit</th>-->
        <!--<th>Delete</th>-->
       </tr>
      </thead>
      <tbody>
      <?php 
      
      $result=$link->query("SELECT * FROM `mess_info`") or die(mysqli_error());
      while($row = $result->fetch_array()){   
      ?>
      <tr>
      <td><?php echo $row['mess_name'] ?></td>
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
 var dataTable = $('#mess_table').DataTable({
  /*"processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"grade_action.php",
   type:"POST",
   data:{action:'fetch'}
  },
  "columnDefs":[
   {
    "targets":[0, 1, 2],
    "orderable":false,
   },
  ],
 });*/

 

});
</script>