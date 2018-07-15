<?php 
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['createuser']))
		{
			$stafftype=$_POST['usertypeRadios'];
			$fname=$_POST['firstname'];
			$lname=$_POST['lastname'];
		    $addressline1=$_POST['addressline1'];
			$addressline2=$_POST['addressline2'];
			$district=$_POST['district'];
			$state=$_POST['state'];
			$pincode=$_POST['pincode'];
			$mobileno=$_POST['mobileno'];
			$emailid=$_POST['useremail'];
			$hostelid=$_POST['selecthostel'];
			
			$sql=("INSERT INTO staff_details(fname,lname,addressline1,addressline2,district,state,pincode,mobileno,emailid,stafftype,hostelid)
			VALUES (:fname, :lname, :addressline1,:addressline2,:district,:state,:pincode,:mobileno,:emailid, :stafftype,:hostelid)");
			
			$query=$connect->prepare($sql);
			$query->execute(array (
			':fname'=>$fname,
			':lname'=>$lname,
			':addressline1'=>$addressline1,
			':addressline2'=>$addressline2,
			':district'=>$district,
			':state'=>$state,
			':pincode'=>$pincode,
			':mobileno'=>$mobileno,
			':emailid'=>$emailid,
			':stafftype'=>$stafftype,
			':hostelid'=>$hostelid));
		
			$staffinsert=1;
			$staffid=$connect->lastInsertId();
			
			/* data insert into userdetails table to create user */
			$sql=("INSERT INTO userdetails(username,password,user_flag,student_staff_id)
			VALUES (:username, :password, :user_flag,:student_staff_id)");
			$query=$connect->prepare($sql);
			$query->execute(array (
			  ':username'=>$emailid,
			  ':password'=>$mobileno,
			  'user_flag'=>$stafftype,
			  'student_staff_id'=>$staffid));
	/* SENDING USER LOGIN DETAILS VIA EMAIL    START */



require '../PHPMailer/PHPMailerAutoload.php';


$mail = new PHPMailer;


$mail->isSMTP();


//$mail->Debugoutput = 'html';


$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;


$mail->SMTPSecure = 'tls';


$mail->SMTPAuth = true;


$mail->Username = "hms.minis4@gmail.com";


$mail->Password = "hmsmini@s4";


$mail->setFrom('hms.minis4@gmail.com', 'Admin HMS CEV');

$mail->addAddress($emailid, $fname." ". $lname);


$mail->Subject = 'User Details';

$body ="Your User Login Details to HMS System is as follows:<br><br>"."<table>
           <thead>
             <tr>
                <th>User Name/ Login ID</th>
                <th>Password</th>
              </tr>
          </thead>
          <tbody>
             <tr>
               <td>".$emailid."</td>
               <td>".$mobileno."</td>
             </tr>
		   </tbody>
		 </table>";

//$mail->msgHTML($body);
$mail->Body=$body;
$mail->AltBody='';



//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} 

				
/* sending mail code ends here */
	
		}
}
  catch(PDOException $e){
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;
?>
<?php 
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 if(isset($_POST['updatedelbtn']))
 {

	$staffid=$_POST['selectuser'];
     $action=$_POST['actionradio'];
	  if($action=='update')
	  {
		  $updateaction=1;
	  }
	  if($action=='delete')
	  {
		  $sql =("DELETE FROM staff_details WHERE Staff_id='$staffid'");
		  $query =$connect->query($sql);
		  $query->execute();
		  $delsql=("DELETE FROM userdetails WHERE student_staff_id='$staffid'");
		  $query =$connect->query($delsql);
		  $query->execute();
		  
		  $staffdel=1;
	  }  
   	  
 }
 ?>

 <?php
 
 if(isset($_POST['userupdate']))
 {



	        $staffid=$_POST['staffid'];
			$stafftype=$_POST['usertypeRadios'];
			$fname=$_POST['firstname'];
			$lname=$_POST['lastname'];
		    $addressline1=$_POST['addressline1'];
			$addressline2=$_POST['addressline2'];
			$district=$_POST['district'];
			$state=$_POST['state'];
			$pincode=$_POST['pincode'];
			$mobileno=$_POST['mobileno'];
			$emailid=$_POST['useremail'];
			$hostelid=$_POST['selecthostel'];
			
			$updatestmt=("UPDATE staff_details SET fname =:fname, lname =:lname, addressline1 =:addressline1,
						  addressline2 =:addressline2, district =:district, state =:state, pincode =:pincode,
						  mobileno =:mobileno, emailid =:emailid, stafftype =:stafftype, hostelid =:hostelid WHERE Staff_id='$staffid'"); 
			$queryupdate =$connect->prepare($updatestmt);
			
			$queryupdate->execute(array(
			                        ':fname'=>$fname,
									':lname'=>$lname,
									':addressline1'=>$addressline1,
									':addressline2'=>$addressline2,
									':district'=>$district,
									':state'=>$state,
									':pincode'=>$pincode,
									':mobileno'=>$mobileno,
									':emailid'=>$emailid,
									':stafftype'=>$stafftype,
									':hostelid'=>$hostelid)
									); 
		  
		  $updatesucess=1;
	 
 } 
?>

<?php 
include('admintools/topfile.php');
echo "<title>Admin| User Create</title>";
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
include('admintools/header.php');
include('admintools/dashboard.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Management
      </h1>
 
    </section>
   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Create User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<form method="post" class="form-horizontal">
			 <fieldset>
				<div class="alert alert-info">
					<button class="close" data-dismiss="alert">&times;</button>
					<strong>*</strong> Fields are mandatory to fill.
				 </div>
	            <div class="alert alert-success alert-dismissible <?php if(!isset($staffinsert)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Staff and User ID Created Sucessfully with Staff ID:<?php echo $staffid;?></h5>
				</div>
				
				
             <div class="box-body">
			  <!-- radio strat here-->
                <div class="form-group">
				<label name="usertype" class="col-sm-3 control-label">User Type <span class="required">*</span></label>
                  <div class="radio col-sm-3">
                    <label class="control-label">
                      <input type="radio" name="usertypeRadios"  value="ADMN" required="required">
                      Admin
                    </label>
                  </div>
                  <div class="radio col-sm-3">
                    <label class="control-label">
                      <input type="radio" name="usertypeRadios"  value="WRDN" required="required">
                      Warden
                    </label>
                  </div>
                  <div class="radio col-sm-3">
                    <label class="control-label">
                      <input type="radio" name="usertypeRadios"  value="OTHS" required="required">
                      Other Staff
                    </label>
                  </div>
                </div>
				<!-- radio end here-->

                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">First Name <span class="required">*</span></label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                  </div>
				  </div>
                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">First Name <span class="required">*</span></label>
				  <div class="col-xs-5">
                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                  </div>
                </div>
				
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Address <span class="required">*</span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="addressline1" placeholder="Address Line 1" required>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label"> </label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="addressline2" placeholder="Address Line 2" required>
                  </div>
                </div>
				<div class="form-group">
                  <label name="district" class="col-sm-3 control-label">District <span class="required">*</span></label>
                  <div class="col-xs-5">
                   <select class="form-control span6 m-wrap" name="district" required>	
					    <option value="">Select...</option>															
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
                   <select class="form-control span6 m-wrap" name="state" required>	
					<option value="">Select...</option>											
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
                    <input type="number" class="form-control" name="pincode" placeholder="PIN Code" required>
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="mobileno" class="col-sm-3 control-label">Moblie No. <span class="required">*</span></label>

                  <div class="col-xs-5">
                    <input type="number" class="form-control" name="mobileno" placeholder="Moblie No." required>
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Email ID <span class="required">*</span></label>

                  <div class="col-xs-5">
                    <input type="email" class="form-control" name="useremail" placeholder="Email ID" required>
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="hostelname" class="col-sm-3 control-label">Hostel <span class="required">*</span></label>
                  <div class="col-xs-5">
				   <select class="form-control span6 m-wrap" name="selecthostel" required>
				  <option value="">Select Hostel.....</option>
						<?php 
						        	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
									$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$comboquery =$con->query("SELECT hostel_id,hostel_name FROM hostel_details");
									while($combodata=$comboquery->fetch()) 
									echo "<option value=".$combodata['hostel_id'].">".$combodata['hostel_name']."</option>";
						?>
                  </select>
                  </div>
                </div>
               </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="createuser" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary pull-right">Clear</button>
              </div>
              <!-- /.box-footer -->
			  </fieldset>
            </form>
			<!-- form End -->
			
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update/Delete User</h3>
            </div>
			
				<div class="alert alert-success <?php if(!isset($updatesucess)) echo 'hide';?>">
				   <button class="close" data-dismiss="alert"></button>
					 Staff and User Details updated successfully  !
				</div>
				
				<div class="alert alert-success <?php if(!isset($staffdel)) echo 'hide';?>">
				   <button class="close" data-dismiss="alert"></button>
					 Staff and User Details Deleted successfully !with Staff ID:<?php echo $staffid;?>
				</div>
			
            <!-- /.box-header -->
            <!-- form start -->
		  <div class="box-body">
            <form method="post" name="updatedelfrm" class="form-horizontal">
				<div class="form-group">
                  <label name="search" class="col-sm-2 control-label">Search <span class="required">*</span></label>
                  <div class="col-sm-10">
				    <select class="form-control" placeholder="Select User...." name="selectuser" required>
					<option value="">Select User....</option>
					<?php
					     	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
							$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$comboquery =$con->query("SELECT Staff_id,fname,lname,emailid FROM staff_details");
								while($combodata=$comboquery->fetch()) 
								  echo "<option value=".$combodata['Staff_id'].">".$combodata['fname']." ".$combodata['lname']." "." ".$combodata['emailid']."</option>";
					?>
					</select>
                  </div>
                </div>
			  <!-- radio strat here-->
                <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Action <span class="required">*</span></label>
                  <div class="radio col-sm-2">
                    <label class="control-label">
                      <input type="radio" name="actionradio"  value="update" required="required">
                      Update
                    </label>
                  </div>
                  <div class="radio col-sm-2">
                    <label class="control-label">
                      <input type="radio" name="actionradio"  value="delete" required="required">
                      Delete
                    </label>
                  </div>
                </div>
				<!-- radio end here-->
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="updatedelbtn" class="btn btn-primary">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
   <!-- form start -->
			<form name="userupdate" method="post" class="form-horizontal <?php if(!isset($updateaction)) echo 'hide';?>">
			<fieldset>
	            <div class="alert alert-success alert-dismissible <?php if(!isset($updatesucess)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>User data updated Sucessfully with User ID:<?php echo $staffid;?></h5>
				</div>
				<?php
				    $con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql=("SELECT* FROM staff_details WHERE Staff_id='$staffid'");
					$query =$con->query($sql);
					$res=$query->fetch();		 				
				?>
             <div class="box-body">
                <div class="form-group hide">
                  <label name="staffid" class="col-sm-3 control-label">Staff Id <span class="required">*</span></label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="staffid" value="<?php echo $res['Staff_id'];?>">
                  </div>
                </div>
			  <!-- radio strat here-->
                <div class="form-group">
				<label name="usertype" class="col-sm-3 control-label">User Type <span class="required">*</span></label>
                  <div class="radio col-sm-3">
                    <label class="control-label">
                      <input type="radio" name="usertypeRadios"  value="ADMN" required="required">
                      Admin
                    </label>
                  </div>
                  <div class="radio col-sm-3">
                    <label class="control-label">
                      <input type="radio" name="usertypeRadios"  value="WRDN" required="required">
                      Warden
                    </label>
                  </div>
                  <div class="radio col-sm-3">
                    <label class="control-label">
                      <input type="radio" name="usertypeRadios"  value="OTHS" required="required">
                      Other Staff
                    </label>
                  </div>
                </div>
				<!-- radio end here-->

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
	         	<div class="form-group hide">
                  <label name="email" class="col-sm-3 control-label">Email ID <span class="required">*</span></label>

                  <div class="col-xs-5">
                    <input type="email" class="form-control" name="useremail" value="<?php echo $res['emailid'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="hostelname" class="col-sm-3 control-label">Hostel <span class="required">*</span></label>
                  <div class="col-xs-5">
				   <select class="form-control span6 m-wrap" name="selecthostel" required>
				  <option value="">Select Hostel.....</option>
						<?php 
						        	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
									$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$comboquery =$con->query("SELECT hostel_id,hostel_name FROM hostel_details");
									while($combodata=$comboquery->fetch()) 
									echo "<option value=".$combodata['hostel_id'].">".$combodata['hostel_name']."</option>";
						?>
                  </select>
                  </div>
                </div>
               </div>
              <!-- /.box-body -->
              <div class="col-xs-8 form-group pull-right">
                <button type="submit" name="userupdate" class="btn btn-primary">Update</button>
              </div>
              <!-- /.box-footer -->
			  </fieldset>
            </form>
		   </div>
		</div>
         </div>
          
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      <!-- /.row -->
    </section>
	<!-- Sectin .content End -->
	</div>
	<?php 
	include('admintools/footer.php');
	include('admintools/bottomfile.php');
	?>
	</div>
</body>
</html>
	