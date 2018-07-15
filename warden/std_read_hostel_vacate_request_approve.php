<?php 
if(isset($_GET['requestno']))
{
	$reqno=$_GET['requestno'];
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST['grantrequest']))
  {
	  $roomno=$_POST['roomno'];
	  $hostelid=$_POST['hostelid'];
	  $studentid=$_POST['studentid'];
	  $vacatedate=Date("Y-m-d",strtotime($_POST['vacatedate']));
	  $vacate_status='Vacated';
	  
		  $status='Approved';
		  $req_granted_date=Date("Y-m-d");
		  
										
		   /* data updated in student_hstlvacate_request table */            
		  $updatestmt=("UPDATE student_hstlvacate_request SET status =:status ,req_granted_date =:req_granted_date  
		                WHERE requestno='$reqno'");
		  $queryupdate =$con->prepare($updatestmt);
		  $queryupdate->execute(array(
									':status'=>$status,
									':req_granted_date'=>$req_granted_date)
								);
		/* data updated in room_allotment table */  
		  $updatestmt=("UPDATE room_allotment SET room_no =:room_no, to_date =:to_date,status =:status 
		                WHERE hostel_id='$hostelid' AND allocatee_id='$studentid'");
		  $queryupdate =$con->prepare($updatestmt);
		  $queryupdate->execute(array(
		                            'room_no'=>$roomno, 
									'to_date'=>$vacatedate,
									':status'=>$vacate_status,
									)
								);
		
		
		
			$req_granted=1;
			
	  }
  }
  
?>

<?php 
include('wardentools/topfile.php');
echo "<title>Warden| Student Hostel Vacate Request</title>";
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
                <li><a href="std_hostel_vacate_request.php"><i class="fa fa-envelope-o"></i> New Request
                  <span class="label label-primary pull-right"></span></a></li>
                <li><a href="std_hostel_vacate_request_approved_list.php"><i class="fa fa-envelope-square"></i> Approved Request</a></li>
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
	$query =$con->query("SELECT fname,lname,dob,gender,emailid,mobno FROM student WHERE student_id=(SELECT student_id FROM student_hstlvacate_request WHERE requestno='$reqno')");
	$res=$query->fetch();
?>
	            <div class="alert alert-success alert-dismissible <?php if(!isset($req_granted)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Student Hostel Vacate Request Granted Sucessfully to Request No-<?php echo $reqno;?></h5>
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
			  </div>
				<legend><h5>Hostel Vacate Details</h5></legend>
		 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Vacate Grant</h3>
            </div>
				<?php
					$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$query =$con->query("SELECT *FROM student_hstlvacate_request WHERE requestno='$reqno'");
					$res=$query->fetch();
				?>
				<br>
            <form method="post" class="form-horizontal">
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Request Date:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo Date("d-m-Y",strtotime($res['request_date']));?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Room No:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="roomno" value="<?php echo $res['roomno'];?>">
                  </div>
                </div>
	         	<div class="form-group hide">
                  <label name="email" class="col-sm-3 control-label">Hostel ID:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="hostelid" value="<?php echo $res['hostel_id'];?>">
                  </div>
                </div>
	         	<div class="form-group hide">
                  <label name="email" class="col-sm-3 control-label">Student ID:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="studentid" value="<?php echo $res['student_id'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Vacate Date:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="vacatedate" value="<?php echo Date("d-m-Y",strtotime($res['vacatedate']));?>">
                  </div>
                </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
				<a href=std_hostel_vacate_request.php><button type="button" name="backbtn" class="btn btn-default"><i class="fa fa-reply"></i> Back</button></a>
              </div>
			  <button type="submit" name="grantrequest" class="btn btn-default"><i class="fa fa-share"></i>Approve Request</button>
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