<?php

//login.php

include('db_connect.php');
session_start();
$error_admin_user_name='';

if($_POST){
  
//if($_POST['admin_user_name'] != '' and $_POST['admin_password'] != ''){
  $query= "SELECT * FROM `admin_info` WHERE username='".$_POST['admin_user_name']."' AND  password='".$_POST['admin_password']."' LIMIT 1";

$result=mysqli_query($link,$query);
$row= mysqli_fetch_array($result);
 if($row){
$_SESSION['admin_id']=$row['admin_id'];
//echo $_SESSION['id'];
header('location:admin_page.php');
}
else{
  $error_admin_user_name.='Invalid Credentials';     
}

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BPHC Mess Signin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
 <div id="logo" style="float: left;"><img src="../Images/logo.gif" alt=""></div>
 <div style="clear:both;"></div>
 <div id="heading"><h1>Mess Signin System</h1></div>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-4" style="margin-top:20px;">
      <div class="card">
        <div class="card-header">Admin Login</div>
        <div class="card-body">
          <form method="post" id="admin_login_form">
            <div class="form-group">
              <label>Enter Username</label>
              <input type="text" name="admin_user_name" id="admin_user_name" class="form-control" />
              <span id="error_admin_user_name" class="text-danger"><?php echo $error_admin_user_name ?></span>
            </div>
            <div class="form-group">
              <label>Enter Password</label>
              <input type="password" name="admin_password" id="admin_password" class="form-control" />
              <span id="error_admin_password" class="text-danger"></span>
            </div>
            <div class="form-group">
              <input type="submit" name="admin_login" id="admin_login" class="btn btn-info" value="Login" />
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-4">

    </div>
  </div>
</div>

</body>
</html>

<!--
  <script>
$(document).ready(function(){
  $('#admin_login_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"check_admin.php",
      method:"POST",
      data:$(this).serialize(),
      dataType:"json",
      beforeSend:function(){
        $('#admin_login').val('Validate...');
        $('#admin_login').attr('disabled', 'disabled');
      },
      success:function(data)
      {
        if(data.success)
        {
          location.href = "admin_page.php";
        }
        if(data.error)
        {
          $('#admin_login').val('Login');
          $('#admin_login').attr('disabled', false);
          if(data.error_admin_user_name != '')
          {
            $('#error_admin_user_name').text(data.error_admin_user_name);
          }
          else
          {
            $('#error_admin_user_name').text('');
          }
          if(data.error_admin_password != '')
          {
            $('#error_admin_password').text(data.error_admin_password);
          }
          else
          {
            $('#error_admin_password').text('');
          }
        }
      }
    });
  });
});
</script>
--!>