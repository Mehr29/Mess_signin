<?php

include('mess_page.php');

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

    
    });

</script>