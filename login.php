<?php
    session_start();
    include('admin/db_connect.php');
    
    if(!isset($_SESSION["mess_id"]))
   {
     header('location:mess_login.php');
   }

    $err="";
    if($_POST){
    $studentname = $_POST['student_user_name'];
    $studentpassword= $_POST['student_password'];
    $idcheck=$_SESSION['mess_id'];

    $date= date('Y-m-d', strtotime("+5 hours 30 min"));
	$query="SELECT * FROM `student_info` WHERE  uid = '$studentname' AND Mess ='$studentpassword'";
  $query2="SELECT * FROM `mess_info` WHERE mess_id='$idcheck'";
  $result = mysqli_query($link,$query) or die(mysqli_error());
  $result2 = mysqli_query($link,$query2);
  $row2= mysqli_fetch_array($result2);
  $row= mysqli_fetch_array($result);
	if($row>0){
        if($studentpassword==$row2['mess_name']){
        $result3=$link->query("SELECT * FROM `grace_info` WHERE `uid` = '$studentname' AND `Date`='$date'")  or die(mysqli_error());
        $row1 = mysqli_fetch_array($result3);
        if($row1>0){
        $err.="<div class='alert alert-danger' id='err'>Applied for grace</div>";}
        else{
          $type="";
          
          $time = date("H:i", strtotime("+5 hours 30 min"));
          $date1 = date("Y-m-d", strtotime("+5 hours 30 min"));
          
            if(strtotime("+5 hours 30 min")>=strtotime("07:00:00") and strtotime("+5 hours 30 min")<=strtotime("10:00:00")){
                $type.="Breakfast";
            }
              
           else if(strtotime("+5 hours 30 min")>=strtotime("12:00:00") and strtotime("+5 hours 30 min")<=strtotime("14:30:00")){
                $type.="Lunch";
            }
           else if(strtotime("+5 hours 30 min")>=strtotime("16:30:00") and strtotime("+5 hours 30 min")<=strtotime("18:00:00")){
                $type.="Snacks";
            }
            else if(strtotime("+5 hours 30 min")>=strtotime("19:00:00") and strtotime("+5 hours 30 min")<=strtotime("23:50:00")){
                $type.="Dinner";
            }
            
            
            $result1 = $link->query("SELECT * FROM `student_info` WHERE `uid` = '$studentname'") or die(mysqli_error());
          $row1 = $result1->fetch_array();
          $name=$row1['uid'];
          $name1=$row1['Name'];
          $id=$row1['ID'];  
          if(isset($_COOKIE[$name])){
                $err.= "<div class='alert alert-danger'>You Have already taken your meal</div>";
            }
          else{
              setcookie("$name","1234",strtotime("+5 hours 30 min")+60*60*2);
              $query1="INSERT INTO `mess_attendance` VALUES('','$name1','$id','$type','$date1', '$time','$studentpassword')";
              mysqli_query($link,$query1)or die(mysqli_error());
            $err.= "<div class='alert alert-sucess' id ='err'> ".$row1['Name']." <label class = 'text-info'> ,You have entered in at  ".date("h:m:s a", strtotime($time))."</label></div>";
            }
  }}
else
$err.= "<div class='alert alert-danger' id='err'>You are not registered here</div>";
}
else if($row == 0){
		$err.= "<div class='alert alert-danger' id='err'>Invalid credentials</div>";
  }
//if(){
  //header('location:index.php');
//}
}?>

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
 <div id="heading"><h1>Student Signin System</h1></div>
</div>

<?php echo $err  ?>

<div class="container">
  <div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-4" style="margin-top:20px;">
      <div class="card">
        <div class="card-header">Student Login</div>
        <div class="card-body">
          <form method="post" id="student_login_form">
            <div class="form-group">
            <span id="error_student_user_name" class="text-danger"></span>
           
              <label>Enter Uid</label>
              <input type="text" name="student_user_name" id="student_user_name" class="form-control" />
              
            </div>
            <div class="form-group">
              <label>Enter Password</label>
              <input type="password" name="student_password" id="student_password" class="form-control" />
              <span id="error_student_password" class="text-danger"></span>
            </div>
            <div class="form-group">
              <input type="submit" name="student_login" id="student_login" class="btn btn-info" value="Login" />
              <button name="close" id="close" class="btn btn-danger ml-md-10" ><a id="link" href="index.php">Close</a></button>
            
              
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-4">

    </div>
  </div>
</div>
<style>
  #link{
    text-decoration:none;
    color:white;
  }
</style>

</body>
</html>


<script>
$(document).ready(function(){
  
$('#student_login').click(setTimeout(divremoval,4000))
function divremoval(){
  $('#err').remove();

}


});
</script>