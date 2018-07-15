<?php 
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['generate_report']))
		{
				$stdid=$_POST['studentid'];
				$fromdate=$_POST['fromdate'];
			    $todate=$_POST['todate'];	

		  }
	   	$query =$connect->query("SELECT * FROM student where student_id='$stdid'");
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
  <title>Student | Invoice List</title>
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
          <i class="fa fa-globe"></i> Laundry Expenditure From  <?php echo $fromdate;?>  To  <?php echo $todate;?>
          <small class="pull-right">Report Generation Date :<?php echo Date("d-m-Y");?></small>
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
          Email: laundryandhostel@gmail.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
	  
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
        <b>Report No.:</b><?php echo Date("dmYhis")?><br>
        <b>From Date:</b> <?php echo $fromdate?><br>
        <b>To Date:</b> <?php echo $todate;?><br>
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
            <th>Invoice No.</th>
            <th>Amount(<i class="fa fa-inr"></i>)</th>
			<th>Date</th>
			<th>Bill Cycle</th>
			<th>Expected Delivery Date</th>
			<th>Actual Delivery Date</th>
			<th>Status</th>
          </tr>
          </thead>
          <tbody>
		<?php 
			$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query =$con->query("SELECT * FROM laundry_invoice where date between '$fromdate' and '$todate' and customer_id='$stdid' ");
			$i=1;
			while($res=$query->fetch())
			   {
				   echo "<tr>";
                   echo "<td>".$i."</td>";
                   echo" <td>" ."<a href="."show_laundry_invoice.php?invoiceno=".$res['invoice_no'].">". $res['invoice_no'] ."</a></td>";
                   echo" <td>"."<i class="."fa fa-inr"."></i>". $res['amount']."</td>";
				   echo" <td>".$res['date']."</td>";
				   echo" <td>".$res['bill_cycle']."</td>";
				   echo" <td>".$res['exp_delidate']."</td>";
				   echo" <td>".$res['act_delidate']."</td>";
				   echo" <td>".$res['status']."</td>";
				   echo "</tr>";
				   $i++;
			    }
			$query =$con->query("SELECT sum(amount) FROM laundry_invoice where date between '$fromdate' and '$todate' and customer_id='$stdid' ");	
              while( $sum=$query->fetch())
			  {
                     $total=$sum['sum(amount)'];
			  }
		?> 
				   <tr>
                       <td></td>
                       <td><b>Total Amount: </b></td>
                       <td><i class="fa fa-inr"></i><b> <?php echo $total;?></b></td>
					   <td></td>
					   <td></td>
					   <td></td>
					   <td></td>
					   <td></td>
				  </tr>

          </tbody>
        </table>
      </div>
      <!-- /.col --> 
    </div>
  </section>
  <!-- /.content -->
      <!-- /.row -->
    <div class="row">
      <!-- accepted payments column -->
      <!-- /.col -->
      <div class="col-xs-6">
			<div class="form-group">
			     <a href=studentmain.php><button type="submit" name="addservice" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Back</button></a>
			</div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- ./wrapper -->
</body>
</html>
