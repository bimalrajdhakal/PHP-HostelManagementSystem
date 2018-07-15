<?php 
include('studenttools/topfile.php');?>
<title>Student| Show Payments</title>

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('studenttools/header.php');
include('studenttools/dashboard.php');
echo "<div>";
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student Payments History
      </h1>
    </section>
	<br>
	<br>
	<br>
	<br>
    <!-- Main content -->
    <section class="content">
      <div class="row">
         <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Payments History</h3>
            </div>
                <br>
             <!-- TABLE START  -->
              <table class="table table-striped">
                <tr>
                  <th>Sl</th>
                  <th>Invoice</th>
                  <th>Bill Cycle</th>
				  <th>Billing Date</th>
				  <th>Hostel Charge</th>
				  <th>Mess Charge</th>
				  <th>Laundry Charge</th>
				  <th>Total Amount</th>
				  <th>Paid Amount</th>
				  <th>Payment Date</th>
                  <th>Status</th>
                </tr>
	  <?php 
	  	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stdid=$stdlogedin_stdid;
			 $sql=("SELECT * from student_bill_payment_master WHERE student_id='$stdid'");
			 $query =$con->query($sql);
			 if($query->rowCount()==0)
				 $error=1;
			 else
			 {
			 $i=1;
			 while($res=$query->fetch())
			 { 
               echo "<tr>";
               echo "<td>".$i."</td>";
			   echo" <td>"."<a href="."invoice_student_payment.php?invoiceno=".$res['sinvno'].">". $res['sinvno'] ."</a></td>";
               echo "<td>".$res['bill_cycle']."</td>";
			   echo "<td>".Date("d-m-Y",strtotime($res['billing_date']))."</td>";
			   echo "<td>".$res['hostel_charge']."</td>";
			   echo "<td>".$res['mess_charge']."</td>";
			   echo "<td>".$res['laundry_charge']."</td>";
			   echo "<td>".$res['total_amount']."</td>";
			   echo "<td>".$res['paid_bill_amount']."</td>";
			   echo "<td>".Date("d-m-Y",strtotime($res['payment_date']))."</td>";
			   echo "<td><span class="."badge bg-red".">". $res['status']."</span></td>";
               echo "</tr>";
			    $i++;
			 }
		   }
		?>
              </table>
		  <div class="control-group alert alert-danger text-danger <?php if(!isset($error)) echo 'hide';?>">
                  No data to display , perhaps Student doesn't have any Transation Record!
          </div>
			 
			 
			 
            <!-- form start -->
			<!-- form End -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      <!-- /.row -->
    </section>
	<!-- Sectin .content End -->
	</div>
	<!-- /.content-wrapper  end here--> 

  <?php 
	include('studenttools/footer.php');
	include('studenttools/bottomfile.php');
	?>
	</div>
</body>
</html>
	