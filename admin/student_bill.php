<?php 
$invoice_no=$_GET['invoiceno'];
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['view_bill']))
		{
				$stdid=$_POST['studentid'];
				$month=$_POST['month'];
			    $year=$_POST['year'];
				$date=Date("Y-m-d");
				$bill_cycle=$month."-".$year;
				$status="paid";
				
			$query =$connect->query("SELECT sum(amount) FROM laundry_invoice where customer_id='$stdid' AND bill_cycle='$bill_cycle'");	
              while( $sum=$query->fetch())
			  {
                     $total_laundry=$sum['sum(amount)'];
			  }
			$query =$connect->query("SELECT sum(amount) FROM mess_invoice where customer_id='$stdid' AND bill_cycle='$bill_cycle'");	
              while( $sum=$query->fetch())
			  {
                     $total_mess=$sum['sum(amount)'];
			  }
			 $query=$connect->query("SELECT * FROM bill_factor WHERE hostelid=(SELECT hostel_id from room_allotment where allocatee_id='$stdid')");
			     while ($res=$query->fetch())
				 {
					 $room_rent=$res['roomrent'];
					 $water_charge=$res['watercharge'];
					 $electricity_charge=$res['electricitycharge'];
					 $maintinance_charge=$res['maintinancecharge'];
					 $misc_charge=$res['misccharge'];
				 }
				 
				 $grand_total=($total_laundry+$total_mess+$room_rent+$water_charge+$electricity_charge+$maintinance_charge+$misc_charge);
		  }

		
}
  catch(PDOException $e){
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;
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
		  <strong>Student Id:<?php echo $stdid;?></strong><br>
          <strong><?php //echo $fname .$lname;?></strong><br>
          <?php 
		     // echo "Admission No.".$admnregno."<br>";
              //echo "Address:".$address1. $address2 ."<br>";
             // echo "Phone:".$mobno ."<br>";
             // echo "Email:".$email. "<br>";
		  ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice No.:</b><?php echo $invoice_no;?><br>
        <b>Billing Month amd Year:</b> <?php echo $month?><br>
        <b>Order ID:</b> <?php echo $bill_cycle;?><br>
		<b>Payment Date:</b> <?php echo Date("d-m-Y"); ?><br>
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
             <td><i class=fa fa-inr></i> <?php echo $total_mess;?></td>
           </tr>
		   <tr>
             <td>7.</td>
             <td>Laundry Charge</td>
             <td><i class=fa fa-inr></i> <?php echo $total_laundry;?></td>
           </tr>
            <tr>
			  <td></td>
              <td><b>Total:</b></td>
              <td><i class="fa fa-inr"></i> <?php echo $grand_total;?></td>
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
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
