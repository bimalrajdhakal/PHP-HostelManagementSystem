<?php 
if(isset($_GET['requestno']))
	$reqno=$_GET['requestno'];
?>

<?php 
include('admintools/topfile.php');
echo "<title>Admin| Student Request</title>";
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
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Category</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="std_newrequest.php"><i class="fa fa-envelope-o"></i> New Request
                  <span class="label label-primary pull-right"></span></a></li>
                <li><a href="std_acceptedrequest.php"><i class="fa fa-envelope-square"></i> Accepted Request</a></li>
                <li><a href="std_rejectedrequest.php"><i class="fa fa-close"></i> Rejected Request</a></li>
				<li><a href="std_forwardedrequest.php"><i class="fa fa-mail-forward"></i> Forwarded Request</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Request Details</h3>
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
			<form action="#" id=""class="form-horizontal">
			 <fieldset>
             <div class="box-body">
<?php 
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query =$con->query("SELECT admnregno,admnregdate,branch,semester,fname,lname,dob,gender,emailid,mobno FROM student WHERE student_id=(SELECT stdudent_id FROM stdrequest WHERE requestno='$reqno')");
	$res=$query->fetch();
?>
			 <legend><h5>Addmission Details</h5></legend>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Admn/Reg No:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo $res['admnregno'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Admn/Reg Date:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo Date("d-m-Y",strtotime($res['admnregdate']));?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Branch:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo $res['branch'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Semester:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo $res['semester']; ?>">
                  </div>
                </div>
				<legend><h5>Personal Details</h5></legend>
                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Name:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="firstname" value="<?php echo $res['fname']." ".$res['lname'];?>">
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
                    <input type="text" class="form-control" id="mobileno" value="<?php echo $res['mobno'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Email ID:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="useremail" value="<?php echo $res['emailid'];?>">
                  </div>
                </div>
				<legend><h5>Request Status</h5></legend>
				<?php
					$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$query =$con->query("SELECT req_status,rejection FROM stdrequest WHERE requestno='$reqno'");
				     $res=$query->fetch();
				?>
				
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Status:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="useremail" value="<?php echo $res['req_status'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Reason:</label>

                  <div class="col-xs-5">
                    <textarea type="text" class="form-control" rows="4"><?php echo $res['rejection'];?></textarea>
                  </div>
                </div>
               </div>
              <!-- /.box-body -->
			  </fieldset>
            </form>
			<!-- form End -->
          </div>
          <!-- /.box -->
		    <div class="box-footer">
              <div class="pull-right">
                 <a href=std_rejectedrequest.php><button type="button" name="addservice" class="btn btn-default pull-right"><i class="fa fa-reply"></i> Back</button></a>
              </div>
			</div>
            </div>
            <!-- /.box-body -->
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