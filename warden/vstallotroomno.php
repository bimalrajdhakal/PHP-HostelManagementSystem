<?php 
if(isset($_GET['requestno']))
{
	$reqno=$_GET['requestno'];
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query =$con->query("SELECT visitorid,fname,lname,email,contactno FROM visitor_details
	                     WHERE visitorid=(SELECT visitorid FROM vstrrequest WHERE vstreqno='$reqno')");
	$res=$query->fetch();
    $query =$con->query("SELECT checkindate,checkoutdate FROM vstrrequest WHERE vstreqno='$reqno'");
	$data=$query->fetch();	
	$visitorid=$res['visitorid'];
	$firstname=$res['fname'];
	$lastname=$res['lname'];
	$emailid=$res['email'];
	$mobileno=$res['contactno'];
	$checkindate=$data['checkindate'];
	$checkoutdate=$data['checkoutdate'];
	
  if(isset($_POST['allotroombtn']))
  {
	  if($_POST['allotroomno']=="")
	  {
		  echo "<script>alert('Please Enter Room No.')</script>";
	  }
	  else
	  {
		  $hostelid=$_POST['hostelid'];
		  $roomno=$_POST['allotroomno'];
		  $reqstatus='Accepted';
		  $roomstatus='Alloted';
		  $reqgrantdate=Date("Y-m-d");
		  
		  /* data inserted to visitor_room table and room is assigned to student */
		  
		  $insertstmt=("INSERT INTO visitor_room (hostelid,allocatee_id,room_no,reqgrantdate,checkindate,checkoutdate,status) 
		                VALUES (:hostelid, :allocatee_id, :room_no, :reqgrantdate, :checkindate, :checkoutdate, :status)");
		   $queryinsert=$con->prepare($insertstmt);
		   $queryinsert->execute(array (
		                                ':hostelid'=>$hostelid,
										':allocatee_id'=>$visitorid,
										':room_no'=>$roomno,
										':reqgrantdate'=>$reqgrantdate,
										':checkindate'=>$checkindate,
										':checkoutdate'=>$checkoutdate,
										':status'=>$roomstatus)
								);
										
		   /* request status updated in vstrrequestrquest table */            
		  $updatestmt=("UPDATE vstrrequest SET vstreqstatus =:reqstatus WHERE vstreqno='$reqno'");
		  $queryupdate =$con->prepare($updatestmt);
		  $queryupdate->execute(array(
									':reqstatus'=>$reqstatus)
								);
									
                $roomalloted=1;
				header("location:vstallothostel.php");
			
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
		  $queryupdate =$con->prepare($updatestmt);
		  $queryupdate->execute(array(
		                            ':reason'=>$reason,
									':reqstatus'=>$reqstatus,)
								);
			$reqrejected=1;
			header("location:vstallothostel.php");
	  }
  }
}

?>

<?php 
include('wardentools/topfile.php');
echo "<title>Warden| Visitor Request</title>";
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
                <li><a href="vstallothostel.php"><i class="fa fa-envelope-o"></i> Forwarded Request
                  <span class="label label-primary pull-right"></span></a></li>
                <li><a href="vst_acceptedrequest.php"><i class="fa fa-envelope-square"></i> Accepted Request</a></li>
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
         <div class="box-body no-padding">
			<div class="form-horizontal">
             <div class="box-body">
<?php 
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query =$con->query("SELECT purpose,wardid,fname,lname,dob,gender,email,contactno FROM visitor_details WHERE visitorid=(SELECT visitorid FROM vstrrequest WHERE vstreqno='$reqno')");
	$res=$query->fetch();
	$query =$con->query("SELECT checkindate,checkoutdate FROM vstrrequest WHERE vstreqno='$reqno'");
	$result=$query->fetch();
?>
	            <div class="alert alert-success alert-dismissible <?php if(!isset($roomalloted)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Hostel Room Alloted Sucessfully to Request No-<?php echo $reqno;?> with Hostel ID:<?php echo $hostelid;?></h5>
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
				<legend><h5></h5></legend>
		 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Hostel Room Allotment </h3>
            </div>
				<?php
					$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$query =$con->query("SELECT vstreqstatus,hostelid FROM vstrrequest WHERE vstreqno='$reqno'");
					$res=$query->fetch();
					$query=$con->query("SELECT hostel_name FROM hostel_details WHERE hostel_id=(SELECT hostelid FROM vstrrequest WHERE vstreqno='$reqno')");
				     $result=$query->fetch();
				?>
				<br>
			 <form method="post" class="form-horizontal">
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Alloted Hostel:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="hostelname" value="<?php echo $result['hostel_name'];?>">
                  </div>
                </div>
	         	<div class="form-group hidden">
                  <label name="email" class="col-sm-3 control-label">Hostel ID:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="hostelid" value="<?php echo $res['hostelid'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Alloted Room:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="allotroomno">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label">Rejection Reason<span class="required">*</span></label>
                  <div class="col-sm-8">
					    <select class="form-control" placeholder="Select Reason..." name="selectreason">
						 <option value="Select Reason...">Select Reason...</option>
                          <option value="Not elegible as hostel norms">Not elegible as hostel norms</option>
						  <option value="Room Not Available">Room Not Available</option>
						</select>
                   </div>
		        </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
				<a href=vstallothostel.php><button type="button" name="backbtn" class="btn btn-default"><i class="fa fa-reply"></i> Back</button></a>
              </div>
              <button type="submit" name="rjectbtn" class="btn btn-default"><i class="fa fa-trash-o"></i> Reject</button>
			  <button type="submit" name="allotroombtn" class="btn btn-default"><i class="fa fa-share"></i> Allot Room</button>
            </div>
			</form>
			<!-- form End -->
            </div>
	 	  </div>
	     </div>
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