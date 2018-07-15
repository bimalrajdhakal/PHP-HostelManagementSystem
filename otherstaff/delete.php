<?php

$delitem=$_GET['trnid'];
$invno=$_GET['invoiceno'];
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
	$sql=("DELETE FROM mess_order where trn_id=$delitem ");
	$connect->exec($sql);
	header("location: messservice.php?invoiceno=$invno");

}
  catch(PDOException $e){
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;




?>