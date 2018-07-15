<?php 
$staffid=$_GET['id'];
?>
<?php 
include('admintools/topfile.php');
echo "<title>Admin| User Create</title>";
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
        User Management
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
              <h3 class="box-title">View Staff/User Details</h3>
            </div>

   <!-- form start -->
			<form name="userupdate" method="post" class="form-horizontal">
			<fieldset>
				<?php
				    $con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql=("SELECT* FROM staff_details WHERE Staff_id='$staffid'");
					$query =$con->query($sql);
					$res=$query->fetch();		 				
				?>
             <div class="box-body">
			  <!-- radio strat here-->
                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Staff Type </span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $res['stafftype'];?>">
                  </div>
				 </div>

                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">First Name </span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $res['fname'];?>">
                  </div>
				 </div>
				<div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Last Name </span></label>
				  <div class="col-xs-5">
                    <input type="text" class="form-control" name="lastname" value="<?php echo $res['lname'];?>">
                  </div>
                </div>
				
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Address </span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="addressline1" value="<?php echo $res['addressline1'];?>">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label"> </label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="addressline2" value="<?php echo $res['addressline2'];?>">
                  </div>
                </div>
				<div class="form-group">
                  <label name="district" class="col-sm-3 control-label">District </span></label>
                  <div class="col-xs-5">
                       <input type="text" class="form-control" name="addressline2" value="<?php echo $res['district'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="state" class="col-sm-3 control-label">State </span></label>
                  <div class="col-xs-5">
                       <input type="text" class="form-control" name="addressline2" value="<?php echo $res['state'];?>">
                  </div>
                </div>
	<!-- select end -->
	         	<div class="form-group">
                  <label name="pincode" class="col-sm-3 control-label">PIN Code </label>

                  <div class="col-xs-5">
                    <input type="number" class="form-control" name="pincode" value="<?php echo $res['pincode'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="mobileno" class="col-sm-3 control-label">Moblie No. </span></label>

                  <div class="col-xs-5">
                    <input type="number" class="form-control" name="mobileno" value="<?php echo $res['mobileno'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Email ID </label>

                  <div class="col-xs-5">
                    <input type="email" class="form-control" name="useremail" value="<?php echo $res['emailid'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="hostelname" class="col-sm-3 control-label">Hostel</label>
                  <div class="col-xs-5">
				    <input type="email" class="form-control" name="useremail" value="<?php echo $res['hostelid'];?>">
                  </div>
                </div>
               </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href=user_manage.php><button type="button" name="addservice" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Back</button></a>
              </div>
              <!-- /.box-footer -->
			  </fieldset>
            </form>
		</div>
         </div>
          
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      <!-- /.row -->
    </section>
	<!-- Sectin .content End -->
	</div>
	<?php 
	include('admintools/footer.php');
	include('admintools/bottomfile.php');
	?>
	</div>
</body>
</html>
	