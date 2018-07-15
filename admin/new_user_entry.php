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
			$mobileno=trim($_POST['mobileno']);
			$emailid=trim($_POST['useremail']);
			$hostelid=$_POST['selecthostel'];
			
			 $sql=("SELECT * from staff_details WHERE emailid='$emailid'");
			 $query =$con->query($sql);
			 if($query->rowCount()==0)
			 {
			
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


$mail->Debugoutput = 'html';


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

$mail->msgHTML($body);
//$mail->Body=$body;
$mail->AltBody='';



//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
				
/* sending mail code ends here */
				echo "<script>alert('Staff and User Id Created Successfully !!!!')</script>";
			 }
			else
				echo "<script>alert('This Email id is already regesitered')</script>";
	
	}
}
  catch(PDOException $e){
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;
?>

<div class="modal fade" id="new_user_entry" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">New User Entry</h4>
			</div>
			<form method="post" class="form-horizontal">
			 <fieldset>
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
                  <label name="name" class="col-sm-3 control-label">Last Name <span class="required">*</span></label>
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
	</div>
</div>