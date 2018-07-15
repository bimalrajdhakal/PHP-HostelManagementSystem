<?php 

$feedid=$_GET['id'];

	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		  $sql =("DELETE FROM publicfeed WHERE feedbackid='$feedid'");
		  $query =$connect->query($sql);
		  $query->execute();
		  header("location:public_feedback.php");


 ?>