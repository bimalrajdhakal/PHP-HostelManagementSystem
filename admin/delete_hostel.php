<?php 

$hostelid=$_GET['id'];
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		  $sql =("DELETE FROM hostel_details WHERE hostel_id='$hostelid'");
		  $query =$connect->query($sql);
		  $query->execute();
	    header("location:hostel_manage.php");
     
 
 ?>