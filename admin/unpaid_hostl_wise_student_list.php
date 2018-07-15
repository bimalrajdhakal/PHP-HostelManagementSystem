<?php 
include('admintools/topfile.php');?>
<title>Admin| Show Payments</title>

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('admintools/header.php');
include('admintools/dashboard.php');
echo "<div>";
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hostel wise student payment list
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
              <h3 class="box-title">List of Students</h3>
            </div>
                <br>
             <!-- TABLE START  -->
              <table class="table table-striped">
                <tr>
                  <th>Sl</th>
                  <th>Invoice</th>
				   <th>Student ID</th>
                  <th>Bill Cycle</th>
				  <th>Billing Date</th>
				  <th>Hostel Charge</th>
				  <th>Mess Charge</th>
				  <th>Laundry Charge</th>
				  <th>Total Amount</th>
                  <th>Status</th>
                </tr>
	  <?php 
	  	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['addfactor']))
		{
			   $hostelid=$_POST['hostel'];
			   $month=$_POST['month'];
			   $year=$_POST['year'];
			   $bill_cycle=$month."-".$year;
			
			 $sql=("SELECT * from bill_master_table WHERE hostel_id='$hostelid' and (bill_cycle='$bill_cycle' and status='Unpaid') ");
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
			   echo" <td>".$res['student_id']."</td>";
               echo "<td>".$res['bill_cycle']."</td>";
			   echo "<td>".Date("d-m-Y",strtotime($res['billing_date']))."</td>";
			   echo "<td>".($res['room_rent']+$res['water_charge']+$res['elec_charge']+$res['main_charge']+$res['misc_charge'])."</td>";
			   echo "<td>".$res['mess_charge']."</td>";
			   echo "<td>".$res['laundry_charge']."</td>";
			   echo "<td>".($res['room_rent']+$res['water_charge']+$res['elec_charge']+$res['main_charge']+$res['misc_charge']+
			                  $res['mess_charge']+$res['laundry_charge'])."</td>";
			   echo "<td><span class="."badge bg-red".">". $res['status']."</span></td>";
               echo "</tr>";
			    $i++;
			 }
			 }
		}
		?>
              </table>
		  <div class="control-group alert alert-danger text-danger <?php if(!isset($error)) echo 'hide';?>">
                  No data to display , perhaps you entered wrong criteria or hostel does not exists!
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
	include('admintools/footer.php');
	include('admintools/bottomfile.php');
	?>
	</div>
</body>
</html>
	