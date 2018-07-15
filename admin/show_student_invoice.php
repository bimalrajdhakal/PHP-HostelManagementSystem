<?php 
$invoice_no=$_GET['invoiceno'];

	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			 $query=$connect->query("SELECT * from bill_master_table WHERE sinvno='$invoice_no' ");
			     while ($res=$query->fetch())
				 {
					 $studentid=$res['student_id'];
					 $bill_cycle =$res['bill_cycle'];
					 $billing_date =$res['billing_date'];
					 $room_rent=$res['room_rent'];
					 $water_charge=$res['water_charge'];
					 $electricity_charge=$res['elec_charge'];
					 $maintinance_charge=$res['main_charge'];
					 $misc_charge=$res['misc_charge'];
					 $mess_charge =$res['mess_charge'];
					 $laundry_charge=$res['laundry_charge'];
					 $status=$res['status'];
				 }
				 
				 $grand_total=($room_rent+$water_charge+$electricity_charge+$maintinance_charge+$misc_charge+$mess_charge+$laundry_charge);
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
				 	 
 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Invoice</title>
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
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Hostel Bill
          <small class="pull-right">Bill Generation Date :<?php echo Date("d-m-Y");?></small>
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
      <div class="col-sm-4 invoice-col">
        <b>Invoice No.:</b><?php echo $invoice_no;?><br>
        <b>Bill Cycle:</b> <?php echo $bill_cycle;?><br>
		<b>Billing Date:</b> <?php echo $billing_date; ?><br>
		<b>Billing Status:</b><?php echo $status;?><br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

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
              <td><b>Total:</b></td>
              <td><i class="fa fa-inr"></i> <?php echo $grand_total;?></td>
            </tr>
          </tbody>
        </table>
		<br>
	    <br>
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
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
