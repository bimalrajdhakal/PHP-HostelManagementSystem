

<?php 
include('studenttools/topfile.php');
echo "<title>Student| Profile</title>";
?>

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('studenttools/header.php');
include('studenttools/dashboard.php');
echo "<div>";
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          User Profile
      </h1>
 
    </section>
    <!-- Main content -->
			<br>
			<br>
    <section class="content">
      <div class="row">
       <div class="col-md-2"></div>
	   
        <div class="col-md-9">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Profile Details</a></li>
              <li><a href="#tab_2" data-toggle="tab">Update Profile</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">

   <!-- form start -->
			<form name="userupdate" class="form-horizontal">
			<fieldset>
				<?php
				    $con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql=("SELECT* FROM student WHERE student_id='$stdlogedin_stdid'");
					$query =$con->query($sql);
					$res=$query->fetch();		 				
				?>
             <div class="box-body">
			  <!-- radio strat here-->
                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Admn/Reg No.:</span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $res['admnregno'];?>">
                  </div>
				 </div>
                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Admn/Reg Date:</span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $res['admnregdate'];?>">
                  </div>
				 </div>
                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Branch:</span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $res['branch'];?>">
                  </div>
				 </div>
                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Semester:</span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $res['semester'];?>">
                  </div>
				 </div>
                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">First Name:</span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $res['fname'];?>">
                  </div>
				 </div>
				<div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Last Name:</span></label>
				  <div class="col-xs-5">
                    <input type="text" class="form-control" name="lastname" value="<?php echo $res['lname'];?>">
                  </div>
                </div>
				<div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Date of Birth:</span></label>
				  <div class="col-xs-5">
                    <input type="text" class="form-control" name="lastname" value="<?php echo $res['dob'];?>">
                  </div>
                </div>
				<div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Gender:</span></label>
				  <div class="col-xs-5">
                    <input type="text" class="form-control" name="lastname" value="<?php echo $res['gender'];?>">
                  </div>
                </div>
				<div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Email Id:</span></label>
				  <div class="col-xs-5">
                    <input type="text" class="form-control" name="lastname" value="<?php echo $res['emailid'];?>">
                  </div>
                </div>
				<div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Mobile No.:</span></label>
				  <div class="col-xs-5">
                    <input type="text" class="form-control" name="lastname" value="<?php echo $res['mobno'];?>">
                  </div>
                </div>
				
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Address:</span></label>

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
                  <label name="district" class="col-sm-3 control-label">District:</span></label>
                  <div class="col-xs-5">
                       <input type="text" class="form-control" name="addressline2" value="<?php echo $res['district'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="state" class="col-sm-3 control-label">State:</span></label>
                  <div class="col-xs-5">
                       <input type="text" class="form-control" name="addressline2" value="<?php echo $res['state'];?>">
                  </div>
                </div>
	<!-- select end -->
	         	<div class="form-group">
                  <label name="pincode" class="col-sm-3 control-label">PIN Code:</label>

                  <div class="col-xs-5">
                    <input type="number" class="form-control" name="pincode" value="<?php echo $res['pincode'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="mobileno" class="col-sm-3 control-label">Caste:</span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="mobileno" value="<?php echo $res['caste'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Religon:</label>

                  <div class="col-xs-5">
                    <input type="email" class="form-control" name="useremail" value="<?php echo $res['religon'];?>">
                  </div>
                </div>
               </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href=studentmain.php><button type="button" name="addservice" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Back</button></a>
              </div>
              <!-- /.box-footer -->
			  </fieldset>
            </form>
			

              </div>
              <!-- /.tab-pane -->
			  
              <div class="tab-pane" id="tab_2">
   <!-- form start -->
			<form name="userupdate" method="post" class="form-horizontal">
			<fieldset>
				<?php
				    $con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql=("SELECT* FROM student WHERE student_id='$stdlogedin_stdid'");
					$query =$con->query($sql);
					$res=$query->fetch();		 				
				?>
             <div class="box-body">
                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">First Name:</span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $res['fname'];?>">
                  </div>
				 </div>
				<div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Last Name:</span></label>
				  <div class="col-xs-5">
                    <input type="text" class="form-control" name="lastname" value="<?php echo $res['lname'];?>">
                  </div>
                </div>
				<div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Date of Birth:</span></label>
				  <div class="col-xs-5">
                    <input type="date" class="form-control" name="dob" value="<?php echo $res['dob'];?>">
                  </div>
                </div>
				<div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Gender:</span></label>
				  <div class="col-xs-5">
                   <select class="form-control span6 m-wrap" name="gender">	
					    <option value="<?php echo $res['gender']; ?>"><?php echo $res['gender'];?></option>															
						<option value="Thiruvananthapuram">Male</option>
						<option value="Kollam">Female</option>
					</select>
                  </div>
                </div>
				<div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Mobile No.:</span></label>
				  <div class="col-xs-5">
                    <input type="text" class="form-control" name="mobno" value="<?php echo $res['mobno'];?>">
                  </div>
                </div>
				
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Address:</span></label>

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
                  <label name="district" class="col-sm-3 control-label">District <span class="required">*</span></label>
                  <div class="col-xs-5">
                   <select class="form-control span6 m-wrap" name="district">	
					    <option value="<?php echo $res['district']; ?>"><?php echo $res['district'];?></option>															
						<option value="Thiruvananthapuram">Thiruvananthapuram</option>
						<option value="Kollam">Kollam</option>
						<option value="Alappuzha">Alappuzha</option>
						<option value="Pathanamthitta">Pathanamthitta</option>
						<option value="Kottayam">Kottayam</option>
						<option value="Idukki">Idukki</option>
						<option value="Ernakulam">Ernakulam</option>
						<option value="Thrissur">Thrissur</option>
						<option value="Palakkad">Palakkad</option>
						<option value="Malappuram">Malappuram</option>
						<option value="Kozhikode">Kozhikode</option>
						<option value="Wayanadu">Wayanadu</option>
						<option value="Kannur">Kannur</option>
						<option value="Kasaragod">Kasaragod</option>
					</select>
                  </div>
                </div>
	   <!-- select start -->
	         	<div class="form-group">
                  <label name="state" class="col-sm-3 control-label">State <span class="required">*</span></label>
                  <div class="col-xs-5">
                   <select class="form-control span6 m-wrap" name="state">	
					<option value="<?php echo $res['state'];?>"><?php echo $res['state']; ?></option>											
					<option value="Andhra Pradesh">Andhra Pradesh</option>
					<option value="Arunachal Pradesh">Arunachal Pradesh</option>
					<option value="Bihar">Bihar</option>
					<option value="Chhattisgarh">Chhattisgarh</option>
					<option value="Goa">Goa</option>
					<option value="Gujarat">Gujarat</option>
					<option value="Haryana">Haryana</option>
					<option value="Himachal Pradesh">Himachal Pradesh</option>
					<option value="Jammu & Kashmir">Jammu & Kashmir</option>
					<option value="Jharkhand">Jharkhand</option>
					<option value="Karnataka">Karnataka</option>
					<option value="Kerala">Kerala</option>
					<option value="Madhya Pradesh">Madhya Pradesh</option>
					<option value="Maharashtra">Maharashtra</option>
					<option value="Manipur">Manipur</option>
					<option value="Meghalaya">Meghalaya</option>
					<option value="Mizoram">Mizoram</option>
					<option value="Nagaland">Nagaland</option>
					<option value="Odisha (Orissa)">Odisha (Orissa)</option>
					<option value="Punjab">Punjab</option>
					<option value="Rajasthan">Rajasthan</option>
					<option value="Sikkim">Sikkim</option>
					<option value="Tamil Nadu">Tamil Nadu</option>
					<option value="Telangana">Telangana</option>
					<option value="Tripura">Tripura</option>
					 <option value="Uttar Pradesh">Uttar Pradesh</option>
					 <option value="Uttarakhand">Uttarakhand</option>
					<option value="West Bengal">West Bengal</option>
					 <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
					 <option value="Chandigarh">Chandigarh</option>
					 <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
					 <option value="Daman and Diu">Daman and Diu</option>
					 <option value="Lakshadweep">Lakshadweep</option>
					 <option value="Delhi-NCR">Delhi-NCR</option>
					 <option value="Puducherry(Pondicherry)">Puducherry(Pondicherry)</option>																												
					</select>
                  </div>
                </div>
	<!-- select end -->
	         	<div class="form-group">
                  <label name="pincode" class="col-sm-3 control-label">PIN Code:</label>

                  <div class="col-xs-5">
                    <input type="number" class="form-control" name="pincode" value="<?php echo $res['pincode'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="mobileno" class="col-sm-3 control-label">Caste/Community:</span></label>

                  <div class="col-xs-5">
                   <select class="form-control span6 m-wrap" name="caste">	
					<option value="<?php echo $res['caste'];?>"><?php echo $res['caste']; ?></option>											
					<option value="Andhra Pradesh">General</option>
					<option value="Arunachal Pradesh">OBC</option>
					<option value="Bihar">SC</option>
					<option value="Bihar">ST</option>
                   </select>
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Religon:</label>

                  <div class="col-xs-5">
                   <select class="form-control span6 m-wrap" name="religon">	
					<option value="<?php echo $res['religon'];?>"><?php echo $res['religon']; ?></option>											
					<option value="Andhra Pradesh">Hindu</option>
					<option value="Arunachal Pradesh">Muslim</option>
					<option value="Bihar">Christian</option>
                   </select>
                  </div>
                </div>
               </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="userupdate" class="btn btn-primary">Update</button>
                <a href=studentmain.php><button type="button" name="addservice" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Back</button></a>
              </div>
              <!-- /.box-footer -->
			  </fieldset>
            </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
 <?php
 
 if(isset($_POST['userupdate']))
 {
	 
 try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$fname=$_POST['firstname'];
			$lname=$_POST['lastname'];
			$dob=$_POST['dob'];
			$gender=$_POST['gender'];
			$mobno=$_POST['mobno'];
		    $addressline1=$_POST['addressline1'];
			$addressline2=$_POST['addressline2'];
			$district=$_POST['district'];
			$state=$_POST['state'];
			$pincode=$_POST['pincode'];
			$caste=$_POST['caste'];
			$religon=$_POST['religon'];
			
			/* update to Student table */
			
			$updatestmt=("UPDATE student SET fname =:fname, lname =:lname, dob=:dob,gender=:gender,mobno=:mobno,addressline1 =:addressline1,
						  addressline2 =:addressline2, district =:district, state =:state, pincode =:pincode,
						  caste =:caste,religon=:religon WHERE student_id='$stdlogedin_stdid'"); 
			$queryupdate =$connect->prepare($updatestmt);
			
			$queryupdate->execute(array(
			                        ':fname'=>$fname,
									':lname'=>$lname,
									'dob'=>$dob,
									'gender'=>$gender,
									'mobno'=>$mobno,
									':addressline1'=>$addressline1,
									':addressline2'=>$addressline2,
									':district'=>$district,
									':state'=>$state,
									':pincode'=>$pincode,
									':caste'=>$caste,
									':religon'=>$religon)
									);								

	echo "<script>alert('Profile Updated Successfully !!!!')</script>";
 }
 
   catch(PDOException $e){
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;
 } 
?>
	   

        </div>
        <!--/.col (right) -->
      <!-- /.row -->
    </section>
	<!-- Sectin .content End -->
	</div>
	<!-- /.content-wrapper  end here--> 
  <?php 
	include('studenttools/footer.php');
	include('studenttools/bottomfile.php');
	?>
	</div>
</body>
</html>