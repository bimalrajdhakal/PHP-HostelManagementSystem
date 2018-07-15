<?php 
if(isset($_GET['requestno']))
	$reqno=$_GET['requestno'];
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if(isset($_POST['forwardbtn']))
  {
	  if($_POST['selecthostel']=='Select hostel...')
	  {
		  echo "<script>alert('Please Select Any Hostel')</script>";
	  }
	  else
	  {
		  $hostelid=$_POST['selecthostel'];
		  $reqstatus='Forwarded';
		  $updatestmt=("UPDATE vstrrequest SET hostelid =:hostelid ,vstreqstatus =:reqstatus WHERE vstreqno='$reqno'");
		  $queryupdate =$connect->prepare($updatestmt);
		  $queryupdate->execute(array(
		                            ':hostelid'=>$hostelid,
									':reqstatus'=>$reqstatus,)
								);
			$hstlaloted=1;
		header("location:vst_newrequest.php");
	  }
  }
  
  if(isset($_POST['rjectbtn']))
  {
	  if($_POST['selectreason']=='Select Reason...')
	  {
		  echo "<script>alert('Please Select Any Reason')</script>";
	  }
	  else
	  {
		  $reason=$_POST['selectreason'];
		  $reqstatus='Rejected';
		  $updatestmt=("UPDATE vstrrequest SET rejection =:reason ,vstreqstatus =:reqstatus WHERE vstreqno='$reqno'");
		  $queryupdate =$connect->prepare($updatestmt);
		  $queryupdate->execute(array(
		                            ':reason'=>$reason,
									':reqstatus'=>$reqstatus,)
								);
			$reqrejected=1;
		header("location:vst_newrequest.php");
	  }
  }
  


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
      <!--      <div class="box-header with-border">
              <h4 class="box-title">Student Details</h4>
            </div>  -->
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
	            <div class="alert alert-success alert-dismissible <?php if(!isset($hstlaloted)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Hostel Alloted Sucessfully to Request No-<?php echo $reqno;?> with Hostel ID:<?php echo $hostelid;?></h5>
				</div>
	            <div class="alert alert-success alert-dismissible <?php if(!isset($reqrejected)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Request Rejected Sucessfully to Request No-<?php echo $reqno;?></h5>
				</div>
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
               </div>
              <!-- /.box-body -->
			  </fieldset>
          </div>
          <!-- /.box -->
            </div>
            <!-- /.box-body -->
        <div class="box-footer">
		 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Hostel Allotment </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		  <div class="box-body">
            <form method="post" class="form-horizontal">
				<div class="form-group">
                  <label class="col-sm-2 control-label">Hostel <span class="required">*</span></label>
                  <div class="col-sm-10">
					    <select class="form-control" placeholder="Select Hostel..." name="selecthostel">
						 <option value="Select hostel...">Select hostel...</option>
						<?php 
						      	$comboquery =$con->query("SELECT hostel_id,hostel_name FROM hostel_details");
								while($combodata=$comboquery->fetch()) 
								  echo "<option value=".$combodata['hostel_id'].">".$combodata['hostel_name']."</option>";
						?>
						</select>
                   </div>
		        </div>
				
				<div class="form-group">
                  <label class="col-sm-2 control-label">Rejection Reason<span class="required">*</span></label>
                  <div class="col-sm-10">
					    <select class="form-control" placeholder="Select Reason..." name="selectreason">
						 <option value="Select Reason...">Select Reason...</option>
                          <option value="Not elegible as hostel norms">Not elegible as hostel norms</option>
						  <option value="Room Not Available">Room Not Available</option>
						</select>
                   </div>
		        </div>
		    </div>
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
				<a href=vst_newrequest.php><button type="button" name="addservice" class="btn btn-default pull-right"><i class="fa fa-reply"></i> Back</button></a>
              </div>
              <button type="submit" name="rjectbtn" class="btn btn-default"><i class="fa fa-trash-o"></i> Reject</button>
			  <button type="submit" name="forwardbtn" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
            </div>
			</form>
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