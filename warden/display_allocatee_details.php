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
     <section class="content-header">
      <h1>
        Student Details
      </h1>
    </section>
    <!-- Content Header (Page header) -->
    <section class="content">
	  <div class="row">
	  
	  <br>

	  <div class="col-md-1"></div>
        <div class="col-md-10">
		  
          <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="box-title text-center">Student Details</h2>
            </div>
            
          <!-- general form elements -->
          
            <!-- form start -->
			<form class="form-horizontal">
			   <?php 
					$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$query =$con->query("SELECT*FROM student WHERE student_id='$studentid'");
					$res=$query->fetch();
                ?>
            
			  <div class="box-header">
				 <h5 class="box-title">Addmission Details</h5>
              </div>
			 
			  <div class="box-body">
				<div class="form-group">
                  <label class="col-sm-3 control-label">Admn/Reg. No.:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo $res['admnregno'];?>">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label">Admn/Reg. Date</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo Date("d-m-Y",strtotime($res['admnregdate']));?>">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label">Branch:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo $res['branch'];?>">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label">Semester:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo $res['semester'];?>">
                  </div>
                </div>
			</div>
			
		    

			  
		   
			    <div class="box-header with-border">
                   <h5 class="box-title">Basic Details</h5>
                </div>
			   <div class="box-body">
                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Name:</label>

                  <div class="col-xs-4">
                    <input type="text" class="form-control"  value="<?php echo $res['fname'];?>">
                  </div>
				  <div class="col-xs-4">
                    <input type="text" class="form-control"  value="<?php echo $res['lname'];?>">
                  </div>
                </div>
				
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Date of Birth:</span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo Date("d-m-Y",strtotime($res['dob']));?>">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label">Gender:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo $res['gender'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="mobileno" class="col-sm-3 control-label">Contact No.:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo $res['mobno'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Email ID:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo $res['emailid'];?>">
                  </div>
                </div>
			 </div>
			
			   
 
			 
		  
			  <div class="box-header with-border">
                 <h5 class="box-title">Communication Address</h5>
              </div>
			
			  <div class="box-body">
			   <div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Locality Name:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo $res['addressline1'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Landmark Name:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo $res['addressline2'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">State:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo $res['state'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">District:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo $res['district'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">PIN Code:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo $res['pincode'];?>">
                  </div>
                </div>
			</div>
		
			
			
		  
			            <div class="box-header with-border">
                             <h5 class="box-title">Social Status</h5>
                        </div>
			  <div class="box-body">
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Caste/Community:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo $res['caste'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Religion:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo $res['religon'];?>">
                  </div>
                </div>
		    </div>
		   
		  
		  
		
			            <div class="box-header with-border">
                             <h5 class="box-title">Hostel Details</h5>
                         </div>
			
			  <div class="box-body">
				<?php
					$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$query=$con->query("SELECT hostel_name FROM hostel_details WHERE hostel_id=(SELECT hostel_id FROM room_allotment WHERE allocatee_id='$studentid')");
					$res=$query->fetch();
				     $query =$con->query("SELECT room_no FROM room_allotment WHERE allocatee_id='$studentid'");
					 $result=$query->fetch();
				?>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Alloted Hostel:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control"  value="<?php echo $res['hostel_name'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Alloted Room:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" value="<?php echo $result['room_no'];?>">
                  </div>
                </div>
			  </div>
		 
			 </form>
				
				
				
				
				

			  
          
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