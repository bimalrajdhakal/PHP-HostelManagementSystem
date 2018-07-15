<?php 
$invoice_no=$_POST['invoiceno'];


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
<body onload="startTime()">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Laundry Bill
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
          Laundry & Hostel Department<br>
          College of Engineering<br>
          Vadakara<br>
          Email: laundryandhostel@gmail.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
	  
	  <?php 
	  		$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query =$con->query("SELECT * FROM laundry_invoice where invoice_no='$invoice_no'");
			 while($res=$query->fetch())
			 {
				 $invno=$res['invoice_no'];
				 $stdid=$res['customer_id'];
				 $date=$res['date'];
			 }
			 $query =$con->query("SELECT * FROM student where student_id='$stdid'");
			 while($res=$query->fetch())
			 {
				 $fname=$res['fname'];
				 $lname=$res['lname'];
				 $admnregno=$res['admnregno'];
				 $email=$res['emailid'];
				 $address1=$res['addressline1'];
				 $address2=$res['addressline2'];
				 $mobno=$res['mobno'];
			 }
	  ?>
        To
        <address>
		  <strong>Student Id:<?php echo $stdid;?></strong><br>
          <strong><?php echo $fname .$lname;?></strong><br>
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
        <b>Invoice No.:</b><?php echo $invno;?><br>
        <b>Date:</b> <?php echo $date;?><br>
        <b>Order ID:</b> <?php echo $invno;?><br>
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
            <th>Product</th>
			<th>Price (<i class="fa fa-inr"></i>)</th>
            <th>Quantity</th>
            <th>Amount(<i class="fa fa-inr"></i>)</th>
          </tr>
          </thead>
          <tbody>
		 <?php  
	
			$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query =$con->query("SELECT * FROM laundry_order where invoice_no='$invoice_no'");
			$i=1;
			while($res=$query->fetch())
			{
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$res['laundry_item']."</td>";
            echo "<td>".$res['price']."</td>";
            echo "<td>".$res['qty']."</td>";
            echo "<td><i class="."fa fa-inr></i>".$res['amount']."</td>";
            echo "</tr>";
			  $i++;
			}
			$query =$con->query("SELECT sum(amount) FROM laundry_order where invoice_no='$invoice_no'");	
              while( $sum=$query->fetch())
			  {
                     $total=$sum['sum(amount)'];
			  }
			  ?>
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

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th>Total:</th>
              <td><i class="fa fa-inr"></i> <?php echo $total;?></td>
            </tr>
          </table>
        </div>
			<div class="form-group col-sm-3">
			     <a href=osmain.php><button type="submit" name="addservice" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Back</button></a>
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
