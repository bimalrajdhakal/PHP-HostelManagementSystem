<?php 

include('database.php');

session_start();

$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($con,"SELECT * FROM `userdetails` WHERE username='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session=$row['username'];
$user_id=$row['userid'];
$logedin_student_staff_id=$row['student_staff_id'];


$sql=mysqli_query($con,"SELECT * FROM room_allotment WHERE allocatee_id='$logedin_student_staff_id'");
$res=mysqli_fetch_array($sql,MYSQLI_ASSOC);
$stdlogedin_stdid=$res['allocatee_id'];
$stdlogedin_hostel_id=$res['hostel_id'];
$stdlogedin_room_no=$res['room_no'];

$sql=mysqli_query($con,"SELECT * FROM staff_details WHERE Staff_id='$logedin_student_staff_id'");
$result=mysqli_fetch_array($sql,MYSQLI_ASSOC);
$stafflogedin_staffid=$result['Staff_id'];
$stafflogedin_hostel_id=$result['hostelid'];

date_default_timezone_set('Asia/Kolkata');

  if(!isset($_SESSION['login_user']))
  {
	  header("location:login.php");
  }
  ?>