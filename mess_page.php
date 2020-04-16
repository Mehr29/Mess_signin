<?php

//header.php

include('admin/db_connect.php');

session_start();

//if(isset($_SESSION["admin_id"]))
{
  //header('location:admin_login.php');
}
$query="SELECT * FROM `mess_info` WHERE mess_id='".$_SESSION['mess_id']."'";
$result=mysqli_query($link,$query);
$row=mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BPHC Mess Signin System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>!
  <!--<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/dataTables.bootstrap4.min.js"></script> -->
</head>
<body>

<div class="jumbotron-small text-center" style="margin-bottom:0">
  <div align="left"></div>
  <h1>Mess Attendance System</h1>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      
      <li class="nav-item m-l-3">
        <a class="nav-link" href="student.php">Registered Students</a>
      </li>
      <li class="nav-item m-l-3">
        <a class="nav-link" href="attendance.php">Attendance</a>
      </li>
      <li class="nav-item m-l-3">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <li class="nav-item ml-xl-3" >
      <a class="nav-link " href="#">Signed In- <?php echo $row['mess_name'] ?></a>
        
      </li>  
    </ul>
  </div>  
</nav>