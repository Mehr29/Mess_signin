<?php

//login.php

include('admin/db_connect.php');
session_start();


$error_mess_user_name='';

if($_POST){
  
  $query= "SELECT * FROM `mess_info` WHERE mess_username='".$_POST['mess_user_name']."' AND  mess_password='".$_POST['mess_password']."' LIMIT 1";

$result=mysqli_query($link,$query);
$row= mysqli_fetch_array($result);
 if($row){
$_SESSION['mess_id']=$row['mess_id'];

header('location:index.php');
}
else{
  $error_mess_user_name.='Invalid Credentials';     
}
//}
//else{
  //if($_POST['admin_user_name']==''){
    //$error_admin_user_name='Username required';
  //}
  //if($_POST['admin_password']==''){
    //$error_admin_password='Password required';
 // }
//}

}
//


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
 <div id="logo" style="float: left;"><img src="Images/logo.gif" alt=""></div>
 <div style="clear:both;"></div>
 <div id="heading"><h1>Mess Signin System</h1></div>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-4" style="margin-top:20px;">
      <div class="card">
        <div class="card-header">Mess Login</div>
        <div class="card-body">
          <form method="post" id="mess_login_form">
            <div class="form-group">
              <label>Enter Username</label>
              <input type="text" name="mess_user_name" id="mess_user_name" class="form-control" />
              <span id="error_mess_user_name" class="text-danger"><?php echo $error_mess_user_name ?></span>
            </div>
            <div class="form-group">
              <label>Enter Password</label>
              <input type="password" name="mess_password" id="mess_password" class="form-control" />
              <span id="error_mess_password" class="text-danger"></span>
            </div>
            <div class="form-group">
              <input type="submit" name="mess_login" id="mess_login" class="btn btn-info" value="Login" />
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

