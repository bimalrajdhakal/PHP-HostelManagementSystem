<?php 

$staff_id=$_GET['id'];

	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		  $sql =("DELETE FROM staff_details WHERE Staff_id='$staff_id'");
		  $query =$connect->query($sql);
		  $query->execute();
		  $delsql=("DELETE FROM userdetails WHERE student_staff_id='$staff_id'");
		  $query =$connect->query($delsql);
		  $query->execute();
		  echo "<script>alert('Staff and User Id Deleted Successfully !!!!')</script>";
		  header("location:user_manage");


 ?>