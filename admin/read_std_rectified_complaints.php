<?php 
if(isset($_GET['complaintno']))
{
	$complaintno=$_GET['complaintno'];  
}

?>

<?php 
include('admintools/topfile.php');
echo "<title>Admin| Student Complaints</title>";
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
                <li><a href="std_complaints_new_list.php"><i class="fa fa-envelope-o"></i> New Complaints
                  <span class="label label-primary pull-right"></span></a></li>
                <li><a href="std_complaints_rectified_list.php"><i class="fa fa-envelope-square"></i> Rectified Complaints</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-9">
          <div class="box collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Complainer Details</h3>
            </div>
			 <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
        <div class="box-body no-padding">
			<div class="form-horizontal">
             <div class="box-body">
<?php 
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query =$con->query("SELECT fname,lname,dob,gender,emailid,mobno FROM student 
	                    WHERE student_id=(SELECT complaint_by FROM student_complaints WHERE complaints_no='$complaintno')");
	$res=$query->fetch();
?>

		   <div>
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
		  </div>
		  </div>
		 </div>
		 </div>	
		 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Complaints Details </h3>
            </div>
				<?php
					$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$query =$con->query("SELECT *FROM student_complaints WHERE complaints_no='$complaintno' AND complaint_status='Rectified'");
					$res=$query->fetch();
				?>
				<br>
            <form class="form-horizontal">
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Room No:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo $res['roomno'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Complaint Date:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo Date("d-m-Y",strtotime($res['complaint_date']));?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Complaint Concern:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo $res['complaints_concern'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Description:</label>

                  <div class="col-xs-5">
                    <textarea class="form-control" rows="4" > <?php echo $res['description'];?></textarea>
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Attended Date:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo Date("d-m-Y",strtotime($res['attended_date']));?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Action Taken:</label>

                  <div class="col-xs-5">
                    <textarea class="form-control" rows="4" ><?php echo $res['action_taken'];?></textarea>
                  </div>
                </div>
				<br>
			</form>
		    <div class="box-footer">
              <div class="pull-right">
                 <a href=std_complaints_rectified_list.php><button type="button" name="addservice" class="btn btn-default pull-right"><i class="fa fa-reply"></i> Back</button></a>
              </div>
			</div>
			<!-- form End -->
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