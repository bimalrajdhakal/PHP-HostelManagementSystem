<?php 
include('othstafftool/topfile.php');
echo "<title>Staff| Mess</title>";
?>
<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('othstafftool/header.php');
include('othstafftool/dashboard.php');
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Individual Mess Bill 
      </h1>
    </section>
	<br>
	<br>
	<br>
	<br>
    <!-- Main content -->
    <section class="content">
      <div class="row">
       <div class="col-md-1"></div>
         <div class="col-md-9">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Generate Report</h3>
            </div>
                <br>
             <!-- /.box-header -->
            <!-- form start -->

			<form method="post" action="show_laundry_invoice_single.php" class="form-horizontal">
			<fieldset>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Select Invoice No: <span class="required"></span></label>
                  <div class="col-xs-3">
					 <select class="form-control span6 m-wrap" name="invoiceno" required>
					   <option value="">Select Invoice No.</option>
					   <?php 
						        	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
									$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$comboquery =$con->query("SELECT trn_id,invoice_no FROM laundry_invoice order by(trn_id) DESC");
									while($combodata=$comboquery->fetch()) 
									  echo "<option value=".$combodata['invoice_no'].">".$combodata['invoice_no']."</option>";
					   ?>
					   </select>
					
                  </div>
                </div>
	            <br>
              <div class="box-footer">
                <button type="submit" name="generate_report" class="btn btn-primary">Generate</button>
				
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
include('othstafftool/footer.php');
include('othstafftool/bottomfile.php');
?>
	</div>
</body>
</html>
	