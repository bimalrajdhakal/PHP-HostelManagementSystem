
<?php 
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['addfactor']))
		{
	       
		   
			   $hostelid=$_POST['hostel'];
			   $month=$_POST['month'];
			   $year=$_POST['year'];
			   $status="Unpaid";
			   $billing_date=Date("Y-m-d");
			   $bill_cycle=$month."-".$year;
			   
			  $query =$connect->query("SELECT * FROM test_table where hostel_id='$hostelid' AND bill_cycle='$bill_cycle'");
			  $res=$query->rowCount();
			  if($res>0)
			  {
				  $error=1;
			  }
			  else
			  {

			   $query2 =$connect->query("SELECT * FROM bill_factor where hostelid='$hostelid'");
			   while($res=$query2->fetch())
			     {
				  $room_rent=$res['roomrent'];
				  $water_charge=$res['watercharge'];
				  $elec_charge=$res['electricitycharge'];
				  $main_charge=$res['maintinancecharge'];
				  $misc_charge=$res['misccharge'];
			     }
			$result=$connect->query("SELECT allocatee_id FROM room_allotment WHERE hostel_id='$hostelid' and status='Alloted'"); 
			   foreach ($result as $row)
			   {
				   // fetch records from laundry_invoice table 
				   	$laundry_query =$connect->query("SELECT sum(amount) FROM laundry_invoice where customer_id='{$row['allocatee_id']}' AND bill_cycle='$bill_cycle'");	
                      while( $sum=$laundry_query->fetch())
			            {
                          $sum_laundry=$sum['sum(amount)'];
			            }
					  
					  
					  // fetch records from mess_invoice table
					  			$mess_query =$connect->query("SELECT sum(amount) FROM mess_invoice where customer_id='{$row['allocatee_id']}' AND bill_cycle='$bill_cycle'");	
                                  while( $sum=$mess_query->fetch())
			                       {
                                     $sum_mess=$sum['sum(amount)'];
			                       }
					  
					  // inserting fetched data to prepare bill for the individual student
					  
			$sql=("INSERT INTO test_table(student_id,hostel_id,bill_cycle,billing_date,room_rent,water_charge,elec_charge,main_charge,misc_charge,mess_charge,laundry_charge,status)
			VALUES (:student_id, :hostel_id,:bill_cycle, :billing_date ,:room_rent,:water_charge,:elec_charge,:main_charge,:misc_charge,:mess_charge,:laundry_charge,:status)");
				
			$query=$connect->prepare($sql);
			$query->execute(array (
			                      ':student_id'=>$row['allocatee_id'],
								  'hostel_id'=>$hostelid,
								  ':bill_cycle'=>$bill_cycle,
								  ':billing_date'=>$billing_date,
								  ':room_rent'=>$room_rent,
								  ':water_charge'=>$water_charge,
								  ':elec_charge'=>$elec_charge,
								  ':main_charge'=>$main_charge,
								  ':misc_charge'=>$misc_charge,
								  ':mess_charge'=>$sum_mess,
								  ':laundry_charge'=>$sum_laundry,
								  ':status'=>$status)
								  );
			   }
								  
					$addedfactor=1;
			  }
			  
		   
		}
}
  catch(PDOException $e)
  {
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;
?>
<?php 
include('admintools/topfile.php');
echo "<title>Admin| Generate Hostel Bills</title>";
?>

<body class="hold-transition skin-blue sidebar-mini">
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
        Generate Monthly Bills
      </h1>
 
    </section>
    <!-- Main content -->
			<br>
			<br>
    <section class="content">
      <div class="row">
       <div class="col-md-2"></div>
         <div class="col-md-8">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Bill Generation</h3>
            </div>
                
             <!-- /.box-header -->
            <!-- form start -->
			<form method="post" class="form-horizontal">
			<fieldset>
			<!-- select start -->
	            <div class="alert alert-success alert-dismissible <?php if(!isset($addedfactor)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Bill Generated for HOSTEL :<?php echo $hostelid;?></h5>
				</div>
	            <div class="alert alert-success alert-dismissible <?php if(!isset($error)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Bill already generated for HOSTEL :<?php echo $hostelid;?></h5>
				</div>
				<br>
				<br>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Hostel <span class="required"></span></label>
				  
                  <div class="col-xs-5">
				   <select class="form-control span6 m-wrap" name="hostel" required>
				  <option value="">Select Hostel.....</option>
						<?php 
						        	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
									$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$comboquery =$con->query("SELECT hostel_id,hostel_name FROM hostel_details");
									while($combodata=$comboquery->fetch()) 
									echo "<option value=".$combodata['hostel_id'].">".$combodata['hostel_name']."</option>";
						?>
                  </select>
                  </div>
                </div>
				<!-- select end -->	
             <div class="box-body">
			      
                <div class="form-group">
				  <label class="col-sm-4 control-label">Month <span class="required"></span></label>

                  <div class="col-xs-2">
                    
				     <select class="form-control span6 m-wrap" name="month" required>
					    <option value="">Select</option>
				        <option value="Jan">Jan (01)</option>
						<option value="Feb">Feb (02)</option>
						<option value="Mar">Mar (03)</option>
						<option value="Apr">Apr (04)</option>
						<option value="May">May (05)</option>
						<option value="Jun">Jun (06)</option>
						<option value="Jul">Jul (07)</option>
						<option value="Aug">Aug (08)</option>
						<option value="Sep">Sep (09)</option>
						<option value="Oct">Oct (10)</option>
						<option value="Nov">Nov (11)</option>
						<option value="Dec">Dec (12)</option>
					 </select>
						
                  </div>
				  <label class="col-sm-1 control-label">Year <span class="required"></span></label>

                  <div class="col-xs-2">
					 <select class="form-control span6 m-wrap" name="year" required>
					   <option value="">Select</option>
					   <?php 
					       
						   $i=Date("Y");
						   while($i<2028)
						   {
							  echo "<option value=".$i.">".$i."</option>";
							  $i++;
						   }
					   ?>
					   </select>
					   <?php echo $res;?>
					
                  </div>
                </div>
            </div>
				<br>
				<br>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="addfactor" class="btn btn-primary">Generate Bill</button>
				
                <button type="reset" name="reset" class="btn btn-primary pull-right">Clear</button>
              </div>
              <!-- /.box-footer -->
			  </fieldset>
            </form>
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
	