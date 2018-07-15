<?php 
if(isset($_POST['load_report']))
{
	       
			   $paid_amount=$_POST['amount'];
			   $invoice_no=$_POST['invoice_no'];

	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	/* Updating invoice status to paid in bill_master_table */
	
	          $upstatus="Paid";
			$updatestmt=("UPDATE bill_master_table SET status =:upstatus WHERE sinvno='$invoice_no'"); 
			$queryupdate =$connect->prepare($updatestmt);
			
			$queryupdate->execute(array(
									':upstatus'=>$upstatus,)
									);
	
	
	
	
	/* Fetching data from bill_master_table to generate payment receipt */
	
	$query=$connect->query("SELECT * from bill_master_table WHERE sinvno='$invoice_no' ");
			     while ($res=$query->fetch())
				 {
					 $studentid=$res['student_id'];
					 $hostel_id=$res['hostel_id'];
					 $bill_cycle =$res['bill_cycle'];
					 $billing_date =$res['billing_date'];
					 $room_rent=$res['room_rent'];
					 $water_charge=$res['water_charge'];
					 $electricity_charge=$res['elec_charge'];
					 $maintinance_charge=$res['main_charge'];
					 $misc_charge=$res['misc_charge'];
					 $mess_charge =$res['mess_charge'];
					 $laundry_charge=$res['laundry_charge'];
					 $res_status=$res['status'];
				 }
			$hstl_chrg=($room_rent+$water_charge+$electricity_charge+$maintinance_charge+$misc_charge); 
				 
			$grand_total=($room_rent+$water_charge+$electricity_charge+$maintinance_charge+$misc_charge+$mess_charge+$laundry_charge);
				
    /* 		Fetching Stuent details from student table */		
			$query=$connect->query("SELECT * from student WHERE student_id='$studentid' ");
			 while ($res=$query->fetch())
			 {
				 $fname=$res['fname'];
				 $lname=$res['lname'];
				 $admnregno=$res['admnregno'];
			     $address1=$res['addressline1'];
				 $address2=$res['addressline2'];
				 $mobno=$res['mobno'];
				 $email=$res['emailid'];
			 }
			 $balance_amount=($grand_total-$paid_amount);
			 
			 if($balance_amount<=0)
				 $status="Paid";
			 else
				 $status="Balance";
			 
			 /* Inserting student payment details into student_bill_payment_master */
			 
			$sql=("INSERT INTO student_bill_payment_master(sinvno,student_id,hostel_id,bill_cycle,billing_date,
			hostel_charge,mess_charge,laundry_charge,total_amount,payment_date,paid_bill_amount,balance_amount,status)
			VALUES (:sinvno, :student_id, :hostel_id,:bill_cycle,:billing_date,:hostel_charge,:mess_charge,:laundry_charge,:total_amount,
			             :payment_date,:paid_bill_amount,:balance_amount,:status)");
			
			$query=$connect->prepare($sql);
			$query->execute(array (
			':sinvno'=>$invoice_no,
			':student_id'=>$studentid,
			':hostel_id'=>$hostel_id,
			':bill_cycle'=>$bill_cycle,
			':billing_date'=>$billing_date,
			':hostel_charge'=>$hstl_chrg,
			':mess_charge'=>$mess_charge,
			':laundry_charge'=>$laundry_charge,
			':total_amount'=>$grand_total,
			':payment_date'=>Date("Y-m-d"),
			':paid_bill_amount'=>$paid_amount,
			':balance_amount'=>$balance_amount,
			':status'=>$status));
		 		 		 
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Other Staff | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Invoice Section start  -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-10">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Hostel Bill    <small class="pull-right">Bill Generation Date :<?php echo Date("d-m-Y");?></small>
		  <br> <center>   Invoice Details  </center> 
          
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Admin</strong><br>
          Hostel Department<br>
          College of Engineering<br>
          Vadakara<br>
          Email: hosteldepartment@gmail.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
	  
        To
        <address>
		  <strong>Student Id:<?php echo $studentid;?></strong><br>
          <strong><?php echo $fname ." ".$lname;?></strong><br>
          <?php 
		      echo "Admission No.".$admnregno."<br>";
              echo "Address:".$address1. $address2 ."<br>";
             echo "Phone:".$mobno ."<br>";
             echo "Email:".$email. "<br>";
		  ?>
        </address>
      </div>
      <!-- /.col -->
      <div>
	   <b>Bill No.:</b><?php echo $invoice_no;?></br>
	   <b>Billing Date:</b> <?php echo $billing_date; ?></br>
       <b>Bill Cycle:</b> <?php echo $bill_cycle;?><br>
	   <b>Billing Status:</b><?php echo $res_status;?></br>
      </div>
      <!-- /.col -->
	 </div>

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Sl No.</th>
            <th>Item</th>
            <th>Amount(<i class="fa fa-inr"></i>)</th>
          </tr>
          </thead>
          <tbody>
           <tr>
             <td>1.</td>
             <td>Room Rent</td>
             <td><i class=fa fa-inr></i> <?php echo $room_rent;?></td>
           </tr>
		   <tr>
             <td>2.</td>
             <td>Water Charge</td>
             <td><i class=fa fa-inr></i> <?php echo $water_charge;?></td>
           </tr>
		   <tr>
             <td>3.</td>
             <td>Electricity Charge</td>
             <td><i class=fa fa-inr></i> <?php echo $electricity_charge;?></td>
           </tr>
		   <tr>
             <td>4.</td>
             <td>Maintinance Charge</td>
             <td><i class=fa fa-inr></i> <?php echo $maintinance_charge;?></td>
           </tr>
		   <tr>
             <td>5.</td>
             <td>Misc. Charge</td>
             <td><i class=fa fa-inr></i> <?php echo $misc_charge;?></td>
           </tr>
		   <tr>
             <td>6.</td>
             <td>Mess Charge</td>
             <td><i class=fa fa-inr></i> <?php echo $mess_charge;?></td>
           </tr>
		   <tr>
             <td>7.</td>
             <td>Laundry Charge</td>
             <td><i class=fa fa-inr></i> <?php echo $laundry_charge;?></td>
           </tr>
            <tr>
			  <td></td>
              <td><b>Total Payable Amount:</b></td>
              <td><i class="fa fa-inr"></i> <?php echo $grand_total;?></td>
            </tr>
			<tr>
			  <td></td>
              <td><b>Paid Amount:</b></td>
              <td><i class="fa fa-inr"></i> <?php echo $paid_amount;?></td>
            </tr>
			<tr>
			  <td></td>
              <td><b>Balance Amount:</b></td>
              <td><i class="fa fa-inr"></i> <?php echo $balance_amount;?></td>
            </tr>
			<tr>
			  <td></td>
              <td><td>
              <td></td>
            </tr>
			<tr>
			  <td>Received By:</td>
              <td><td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row -->

	

    <div class="row">
      <!-- accepted payments column -->
      <!-- /.col -->
      <div class="col-xs-6">
			<div class="form-group col-sm-3">
			     <a href=adminmain.php><button type="submit" name="addservice" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Back</button></a>
			</div>
      </div>
      <!-- /.col -->
    </div>
	  </section>
  <!-- Invoice Section End  -->
<!-- ./wrapper -->
</div>
</body>
</html>
