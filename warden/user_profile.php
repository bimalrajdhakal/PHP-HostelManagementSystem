

<?php 
include('wardentools/topfile.php');
echo "<title>Warden| Profile</title>";
?>

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('wardentools/header.php');
include('wardentools/dashboard.php');
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
              <li><a href="#tab_2" data-toggle="tab">Upadte Profile</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">

   <!-- form start -->
			<form name="userupdate" class="form-horizontal">
			<fieldset>
				<?php
				    $con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql=("SELECT* FROM staff_details WHERE Staff_id='$logedin_student_staff_id'");
					$query =$con->query($sql);
					$res=$query->fetch();		 				
				?>
             <div class="box-body">
			  <!-- radio strat here-->
                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Staff Type </span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $res['stafftype'];?>">
                  </div>
				 </div>

                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">First Name </span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $res['fname'];?>">
                  </div>
				 </div>
				<div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Last Name </span></label>
				  <div class="col-xs-5">
                    <input type="text" class="form-control" name="lastname" value="<?php echo $res['lname'];?>">
                  </div>
                </div>
				
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Address </span></label>

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
                  <label name="district" class="col-sm-3 control-label">District </span></label>
                  <div class="col-xs-5">
                       <input type="text" class="form-control" name="addressline2" value="<?php echo $res['district'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="state" class="col-sm-3 control-label">State </span></label>
                  <div class="col-xs-5">
                       <input type="text" class="form-control" name="addressline2" value="<?php echo $res['state'];?>">
                  </div>
                </div>
	<!-- select end -->
	         	<div class="form-group">
                  <label name="pincode" class="col-sm-3 control-label">PIN Code </label>

                  <div class="col-xs-5">
                    <input type="number" class="form-control" name="pincode" value="<?php echo $res['pincode'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="mobileno" class="col-sm-3 control-label">Moblie No. </span></label>

                  <div class="col-xs-5">
                    <input type="number" class="form-control" name="mobileno" value="<?php echo $res['mobileno'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Email ID </label>

                  <div class="col-xs-5">
                    <input type="email" class="form-control" name="useremail" value="<?php echo $res['emailid'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="hostelname" class="col-sm-3 control-label">Hostel</label>
                  <div class="col-xs-5">
				    <input type="email" class="form-control" name="useremail" value="<?php echo $res['hostelid'];?>">
                  </div>
                </div>
               </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href=wardenmain.php><button type="button" name="addservice" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Back</button></a>
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
					$sql=("SELECT* FROM staff_details WHERE Staff_id='$logedin_student_staff_id'");
					$query =$con->query($sql);
					$res=$query->fetch();		 				
				?>
             <div class="box-body">

                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">First Name <span class="required">*</span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $res['fname'];?>">
                  </div>
				 </div>
				<div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Last Name <span class="required">*</span></label>
				  <div class="col-xs-5">
                    <input type="text" class="form-control" name="lastname" value="<?php echo $res['lname'];?>">
                  </div>
                </div>
				
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Address <span class="required">*</span></label>

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
                  <label name="pincode" class="col-sm-3 control-label">PIN Code <span class="required">*</span></label>

                  <div class="col-xs-5">
                    <input type="number" class="form-control" name="pincode" value="<?php echo $res['pincode'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="mobileno" class="col-sm-3 control-label">Moblie No. <span class="required">*</span></label>

                  <div class="col-xs-5">
                    <input type="number" class="form-control" name="mobileno" value="<?php echo $res['mobileno'];?>">
                  </div>
                </div>
				
               </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="userupdate" class="btn btn-primary">Update</button>
                <a href=wardenmain.php><button type="button" name="addservice" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Back</button></a>
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
		    $addressline1=$_POST['addressline1'];
			$addressline2=$_POST['addressline2'];
			$district=$_POST['district'];
			$state=$_POST['state'];
			$pincode=$_POST['pincode'];
			$mobileno=$_POST['mobileno'];
			
			/* update to staff_details table */
			
			$updatestmt=("UPDATE staff_details SET fname =:fname, lname =:lname, addressline1 =:addressline1,
						  addressline2 =:addressline2, district =:district, state =:state, pincode =:pincode,
						  mobileno =:mobileno WHERE Staff_id='$logedin_student_staff_id'"); 
			$queryupdate =$connect->prepare($updatestmt);
			
			$queryupdate->execute(array(
			                        ':fname'=>$fname,
									':lname'=>$lname,
									':addressline1'=>$addressline1,
									':addressline2'=>$addressline2,
									':district'=>$district,
									':state'=>$state,
									':pincode'=>$pincode,
									':mobileno'=>$mobileno)
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
	include('wardentools/footer.php');
	include('wardentools/bottomfile.php');
	?>
	</div>
</body>
</html>