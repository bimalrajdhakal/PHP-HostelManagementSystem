<?php 
include('studenttools/topfile.php');
echo "<title>Student| Mess</title>";
?>
<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('studenttools/header.php');
include('studenttools/dashboard.php');
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laundry Expenditure
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

			<form method="post" action="show_laundry_bill_list.php" class="form-horizontal">
			<fieldset>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label"><span class="required"></span></label>
                  <div class="col-xs-7">
				    <input name="studentid" type="hidden"class="form-control span6 m-wrap" value="<?php echo $stdlogedin_stdid;?>"/>
                  </div>
                </div>
                <div class="form-group">
				  <label class="col-sm-4 control-label">From: <span class="required"></span></label>
                  <div class="col-xs-3">
				    <input name="fromdate" type="date"class="form-control span6 m-wrap" required/>
                  </div>
				  
				  <label class="col-sm-1 control-label">To: <span class="required"></span></label>
                  <div class="col-xs-3">
				    <input name="todate" type="date"class="form-control span6 m-wrap" required/>
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
include('studenttools/footer.php');
include('studenttools/bottomfile.php');
?>
	</div>
</body>
</html>
	