<?php 
if(isset($_GET['requestno']))
	$reqno=$_GET['requestno'];
?>

<?php 
include('admintools/topfile.php');
echo "<title>Admin| Visitor Request</title>";
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
                <li><a href="vst_newrequest.php"><i class="fa fa-envelope-o"></i> New Request
                  <span class="label label-primary pull-right"></span></a></li>
                <li><a href="vst_acceptedrequest.php"><i class="fa fa-envelope-square"></i> Accepted Request</a></li>
                <li><a href="vst_rejectedrequest.php"><i class="fa fa-close"></i> Rejected Request</a></li>
				<li><a href="vst_forwardedrequest.php"><i class="fa fa-mail-forward"></i> Forwarded Request</a></li>
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
            <!-- /.box-header -->
            <!-- form start -->
			<div class="form-horizontal">
			 <fieldset>
             <div class="box-body">
<?php 
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query =$con->query("SELECT purpose,wardid,fname,lname,dob,gender,email,contactno FROM visitor_details WHERE visitorid=(SELECT visitorid FROM vstrrequest WHERE vstreqno='$reqno')");
	$res=$query->fetch();
	$query =$con->query("SELECT checkindate,checkoutdate FROM vstrrequest WHERE vstreqno='$reqno'");
	$result=$query->fetch();
?>
			 <legend><h5>Visiting Purpose</h5></legend>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Visiting Purpose:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo $res['purpose'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Check In Date:</span></label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo Date("d-m-Y",strtotime($result['checkindate']));?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Check Out Date:</span></label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo Date("d-m-Y",strtotime($result['checkoutdate']));?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Ward Details:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo $res['wardid'];?>">
					<label class="control-label"><?php echo "<a href="."display_stddetails.php?studentid=".$res['wardid']." target="."_blank".">";?>Show Ward Details</a></label>
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
                    <input type="text" class="form-control" id="mobileno" value="<?php echo $res['contactno'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Email ID:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="useremail" value="<?php echo $res['email'];?>">
                  </div>
                </div>
				<legend><h5>Request Status</h5></legend>
				<?php
					$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$query =$con->query("SELECT vstreqstatus,rejection FROM vstrrequest WHERE vstreqno='$reqno'");
					$res=$query->fetch();
				?>
				
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Status:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="useremail" value="<?php echo $res['vstreqstatus'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Reason:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="useremail" value="<?php echo $res['rejection'];?>">
                  </div>
                </div>
              <!-- /.box-body -->
			  </div>
			  </fieldset>
		    <div class="box-footer">
              <div class="pull-right">
                 <a href=vst_rejectedrequest.php><button type="button" name="addservice" class="btn btn-default pull-right"><i class="fa fa-reply"></i> Back</button></a>
              </div>
			</div>
          </div>
          <!-- /.box -->
            </div>
            <!-- /.box-body -->
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