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
        <th>Student Name</th>
        <th>ID</th>
        <th>Registered Mess</th>
        <th>Total graces</th>
        <th>Report</th>
        
       </tr>
      </thead>
      <tbody>
      <?php 
      
      $result=$link->query("SELECT * FROM `student_info`") or die(mysqli_error());
      while($row = $result->fetch_array()){   
      ?>
      <tr>
      <td><?php echo $row['Name'] ?></td>
      <td><?php echo $row['ID'] ?></td>
      <td><?php echo $row['Mess'] ?></td>
      <td><?php echo $row['Total remaining Graces'] ?></td>
      <td><?php echo '<button type="button" name="report_button" id="'.$row["ID"].'" class="btn btn-info btn-sm report_button">Make Report</button>' ?></td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">


<div class="modal" id="formModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Make Report</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
          <select name="report_action" id="report_action" class="form-control">
            <option value="pdf_report">PDF Report</option>
            
          </select>
        </div>
        <div class="form-group">
          <div class="input-daterange">
            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
            <span id="error_from_date" class="text-danger"></span>
            <br />
            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
            <span id="error_to_date" class="text-danger"></span>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="hidden" name="student_id" id="student_id" />
        <button type="button" name="create_report" id="create_report" class="btn btn-success btn-sm">Create Report</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



<script>
$(document).ready(function(){
 var dataTable = $('#student_table').DataTable();
 $('#from_date').datepicker({
  todayBtn:"linked",
    format:'yyyy-mm-dd',
    autoclose:true
 });
 $('#to_date').datepicker({
    format:'yyyy-mm-dd',
    autoclose:true
 });

   $(document).on('click', '.report_button', function(){
    var student_id = $(this).attr('id');
    $('#student_id').val(student_id);
    $('#formModal').modal('show');
   });

   $('#create_report').click(function(){
    var student_id = $('#student_id').val();
    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();
    var error = 0;
    var action = $('#report_action').val();
    if(from_date == '')
    {
      $('#error_from_date').text('From Date is Required');
      error++;
    }
    else
    {
      $('#error_from_date').text('');
    }
    if(to_date == '')
    {
      $('#error_to_date').text("To Date is Required");
      error++;
    }
    else
    {
      $('#error_to_date').text('');
    }

    if(error == 0)
    {
      $('#from_date').val('');
      $('#to_date').val('');
      $('#formModal').modal('hide');
      window.open("report.php?action=student_report&student_id="+student_id+"&from_date="+from_date+"&to_date="+to_date);
      
      
    }

   });
 


 
});
</script>