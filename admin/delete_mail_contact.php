<?php 

$msgid=$_GET['id'];

	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		  $sql =("DELETE FROM contact_us where messageid='$msgid'");
		  $query =$connect->query($sql);
		  $query->execute();
		  header("location:public_mail_contact.php");


 ?>