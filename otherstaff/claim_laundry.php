<?php

$trn_id=$_GET['trnid'];
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
				$act_delidate=Date("Y-m-d");
				$status='Delivered';
			   
			   $updatestmt=("UPDATE laundry_invoice SET act_delidate =:act_delidate,status =:status
													 WHERE trn_id='$trn_id'");
	
	           $query=$connect->prepare($updatestmt);
			   			$query->execute(array (
								  ':act_delidate'=>$act_delidate,
								  ':status'=>$status)
								  );
			   
	header("location: shownewdelivery.php");

}
  catch(PDOException $e){
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;




?>