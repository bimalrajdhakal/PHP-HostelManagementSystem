<?php 
include('admintools/topfile.php');?>
<title>Admin| Check Payments</title>

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
        Ckeck Student Payments
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
              <h3 class="box-title">Generate Records</h3>
            </div>
                <br>
             <!-- /.box-header -->
            <!-- form start -->

			<form method="post" action="show_student_payment_history.php" class="form-horizontal">
			<fieldset>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Student ID: <span class="required"></span></label>
                  <div class="col-xs-5">
				    <input name="studentid" type="text"class="form-control span6 m-wrap" required/>
                  </div>
                </div>
	            <br>
              <div class="box-footer">
                <button type="submit" name="load_report" class="btn btn-primary">Submit</button>
				
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
	