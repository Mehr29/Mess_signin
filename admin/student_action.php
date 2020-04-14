<?php

//student_action.php

include('db_connect.php');
session_start();
$output = '';
if(isset($_POST["action"]))
{
 if($_POST["action"] == 'fetch')
 {
  $query = "
  SELECT * FROM `student_info` ";
  if(isset($_POST["search"]["value"]))
  {
   $query .= 'WHERE student_info.Name LIKE "%'.$_POST["search"]["value"].'%" 
      OR student_info.uid LIKE "%'.$_POST["search"]["value"].'%" 
      OR student_info.ID LIKE "%'.$_POST["search"]["value"].'%" ';
  }
  //if(isset($_POST["order"]))
  {
  // $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
  }
  else
  {
   $query .= 'ORDER BY student_info.uid ';
  }
  if($_POST["length"] != -1)
  {
   $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
  }}

  $statement = $link->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $data = array();
  $filtered_rows = $statement->rowCount();
  foreach($result as $row)
  {
   $sub_array = array();
   $sub_array[] = $row["Name"];
   $sub_array[] = $row["ID"];
   $sub_array[] = $row["Mess"];
   $sub_array[] = $row["Total remaining Graces"];
   /*$sub_array[] = '<button type="button" name="edit_student" class="btn btn-primary btn-sm edit_student" id="'.$row["student_id"].'">Edit</button>';
   $sub_array[] = '<button type="button" name="delete_student" class="btn btn-danger btn-sm delete_student" id="'.$row["student_id"].'">Delete</button>';*/
   $data[] = $sub_array;
  }

  $output = array(
   "draw"    => intval($_POST["draw"]),
   "recordsTotal"  =>  $filtered_rows,
   "recordsFiltered" => get_total_records($link, 'student_info'),
   "data"    => $data
  );
  echo json_encode($output);
 }
 ?>