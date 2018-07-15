<?php 
if(isset($_GET['visitorid']))
	$visitorid=$_GET['visitorid'];
?>

<?php 
include('admintools/topfile.php');
echo "<title>Admin| Visitor Details</title>";
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
    <section class="content">
	  <div class="row">
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Visitor Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
          <!-- general form elements -->
          <div class="box box-warning">
      <!--      <div class="box-header with-border">
              <h4 class="box-title">Student Details</h4>
            </div>  -->
            <!-- /.box-header -->
            <!-- form start -->
			<form method="post" action="#" id=""class="form-horizontal">
			 <fieldset>
             <div class="box-body">
<?php 
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query =$con->query("SELECT fname,lname,dob,gender,email,contactno,addressline1,addressline2,state,district,pincode FROM visitor_details WHERE visitorid='$visitorid'");
	$res=$query->fetch();
?>
			    <legend><h5>Personal Details</h5></legend>
                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Name:</label>

                  <div class="col-xs-4">
                    <input type="text" class="form-control" id="firstname" value="<?php echo $res['fname'];?>">
                  </div>
				  <div class="col-xs-4">
                    <input type="text" class="form-control" id="lastname" value="<?php echo $res['lname'];?>">
                  </div>
                </div>
				
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Date of Birth:</span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo Date("d-m-Y",strtotime($res['dob']));?>">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label">Gender:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline2" value="<?php echo $res['gender'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="mobileno" class="col-sm-3 control-label">Contact No.:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="mobileno" value="<?php echo $res['contactno'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Email ID:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="useremail" value="<?php echo $res['email'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Address:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="useremail" value="<?php echo $res['addressline1'];?>"></br>
					<input type="text" class="form-control" id="useremail" value="<?php echo $res['addressline2'];?>"></br>
					<input type="text" class="form-control" id="useremail" value="<?php echo $res['district'];?>"></br>
					<input type="text" class="form-control" id="useremail" value="<?php echo $res['state'];?>"></br>
					<input type="text" class="form-control" id="useremail" value="<?php echo $res['pincode'];?>">
                  </div>
                </div>
               </div>
              <!-- /.box-body -->
			  </fieldset>
          </div>
          <!-- /.box -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
			</form>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
	   </div>
    </section>
    <!-- /.content -->
  </div>
      <?php 
	include('admintools/footer.php');
	include('admintools/bottomfile.php');
	?>
 </div>
 </body>
</html>