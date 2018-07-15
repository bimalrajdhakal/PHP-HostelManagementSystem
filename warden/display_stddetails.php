<?php 
if(isset($_GET['studentid']))
	$studentid=$_GET['studentid'];
?>

<?php 
include('wardentools/topfile.php');
echo "<title>Warden| Student Details</title>";
?>

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('wardentools/header.php');
include('wardentools/dashboard.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
	  <div class="row">
	  <div class="col-md-1"></div>
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Student Details</h3>
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
	$query =$con->query("SELECT*FROM student WHERE student_id='$studentid'");
	$res=$query->fetch();
?>
				<legend><h5>Addmission Details</h5></legend>
				<div class="form-group">
                  <label class="col-sm-3 control-label">Admn/Reg. No.:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline2" value="<?php echo $res['admnregno'];?>">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label">Admn/Reg. Date</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline2" value="<?php echo Date("d-m-Y",strtotime($res['admnregdate']));?>">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label">Branch:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline2" value="<?php echo $res['branch'];?>">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label">Semester:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline2" value="<?php echo $res['semester'];?>">
                  </div>
                </div>
			    <legend><h5>Basic Details</h5></legend>
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
                <legend><h5>Contact Details</h5></legend>
	         	<div class="form-group">
                  <label name="mobileno" class="col-sm-3 control-label">Contact No.:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="mobileno" value="<?php echo $res['mobno'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Email ID:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="useremail" value="<?php echo $res['emailid'];?>">
                  </div>
                </div>
				<legend><h5>Communication Address</h5></legend>
			   <div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Locality Name:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="useremail" value="<?php echo $res['addressline1'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Landmark Name:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="useremail" value="<?php echo $res['addressline2'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">State:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="useremail" value="<?php echo $res['state'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">District:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="useremail" value="<?php echo $res['district'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">PIN Code:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="useremail" value="<?php echo $res['pincode'];?>">
                  </div>
                </div>
				<legend><h5>Social Status</h5></legend>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Caste/Community:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="useremail" value="<?php echo $res['caste'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Religion:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="useremail" value="<?php echo $res['religon'];?>">
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
	include('wardentools/footer.php');
	include('wardentools/bottomfile.php');
	?>
 </div>
 </body>
</html>