<?php

$delitem=$_GET['id'];
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
	$sql=("DELETE FROM event_entry_table where id=$delitem ");
	$connect->exec($sql);
	header("location: notification_event_home.php");

}
  catch(PDOException $e){
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;




?>