<?php
$hostelid=$_GET['id'];
?>
<?php 
include('admintools/topfile.php');
echo "<title>Admin| Hostel Update</title>";
?>

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('admintools/header.php');
include('admintools/dashboard.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hostel Management
      </h1>
 
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
	    <div class="col-md-3"></div>
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">View Hostel Details</h3>
            </div>
		  <div class="box-body">
   <!-- form start -->
			<form name="hostelupdate" method="post" class="form-horizontal">
			<fieldset>
				<?php
				    $con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql=("SELECT* FROM hostel_details WHERE hostel_id='$hostelid'");
					$query =$con->query($sql);
					$res=$query->fetch();		 				
				?>
             <div class="box-body">
                <div class="form-group">
				  <label class="col-sm-3 control-label">Hostel Name </label>
                  <div class="col-xs-6">
						<input name="hostelname" type="text" class="form-control" value="<?php echo $res['hostel_name'];?>">
                  </div>
                </div>
                <div class="form-group">
				  <label class="col-sm-3 control-label">Address </label>

                  <div class="col-xs-6">
					<input name="addressline1" type="text"class="form-control" value="<?php echo $res['addressline1'];?>">
                  </div>
                </div>
				<div class="form-group">
				  <label class="col-sm-3 control-label"></label>

                  <div class="col-xs-6">
					<input name="addressline2" type="text" class="form-control"value="<?php echo $res['addressline2'];?>">
                  </div>
                </div>
				<div class="form-group">
				  <label class="col-sm-3 control-label">District </label>

                  <div class="col-xs-6">
					<input name="district" type="text" class="form-control" value="<?php echo $res['district'];?>">
                  </div>
                </div>
	   <!-- select start -->
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">State </label>
                  <div class="col-xs-6">
					<input name="district" type="text" class="form-control" value="<?php echo $res['state'];?>">
                  </div>
                </div>
	<!-- select end -->
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">PIN Code </label>

                  <div class="col-xs-6">
					<input name="pincode" type="number" class="form-control" value="<?php echo $res['pincode'];?>">
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">Contact No. </label>

                  <div class="col-xs-6">
					 <input name="contactno" type="number" class="form-control" value="<?php echo $res['contactno'];?>">
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">No.of Room </label>

                  <div class="col-xs-6">
					<input name="noofroom" type="number" class="form-control" value="<?php echo $res['noofroom'];?>">
                  </div>
                </div>
	   <!-- select start -->
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">Hostel Type </label>
                  <div class="col-xs-6">
					<input name="noofroom" type="text" class="form-control" value="<?php echo $res['hosteltype'];?>">
                  </div>
                </div>
	<!-- select end -->
            </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href=hostel_manage.php><button type="button" name="addservice" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Back</button></a>
              </div>
              <!-- /.box-footer -->
			  </fieldset>
            </form>
		   </div>
		</div>
         </div>
          
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