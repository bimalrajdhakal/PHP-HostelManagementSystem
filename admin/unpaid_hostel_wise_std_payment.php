
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
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Hostel wise Bill Unpaid Student List
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
              <h3 class="box-title">Report Generate</h3>
            </div>
                
             <!-- /.box-header -->
            <!-- form start -->
			<form method="post" action="unpaid_hostl_wise_student_list.php" class="form-horizontal">
			<fieldset>
			<!-- select start -->

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
	