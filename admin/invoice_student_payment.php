<?php 
$invoice_no=$_GET['invoiceno'];

	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)
;
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
?>
<?php 
include('admintools/topfile.php');
echo "<title>Admin| Generate Hostel Bills</title>";
?>
<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('admintools/header.php');
include('admintools/dashboard.php');
echo "<div>";
?>
  <div class="content-wrapper">
	 <section class="content-header">
      <div class="row">
       <div class="col-md-2"></div>
         <div class="col-md-8">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Payment Details</h3>
            </div>
  <!-- Invoice Section start  -->
  <section class="invoice">
    
      <!-- /.col -->
      <div>
	    <center><b>Bill No.:</b><?php echo $invoice_no;?></center> <div class="pull-right"><b>Bill Generation Date:</b><?php echo Date("d-m-Y");?></br><b>Billing Date:</b> <?php echo $billing_date; ?></div>
        <b>Bill Cycle:</b> <?php echo $bill_cycle;?><br>
		<b>Billing Status:</b><?php echo $status;?>
      </div>
      <!-- /.col -->

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
          </tbody>
        </table>
      </div> 
    </div>
    <!-- /.row -->
  </section>
  <!-- Invoice Section End  -->
          <div class="box-footer">
			<div class="form-group col-sm-3">
			     <a href=adminmain.php><button type="submit" name="addservice" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Back</button></a>
			</div>
          </div>
              <!-- /.box-footer -->
	  <!-- Form End --->
	  
  </div>
  </div>
  </div>
  </section>
  </div>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
  <?php 
	include('admintools/footer.php');
	include('admintools/bottomfile.php');
	?>
	</div>
</body>
</html>
