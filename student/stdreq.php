<?php
session_start();
try{
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$con->beginTransaction();
	if(isset($_POST['stdreqsubmitbtn']))
	    {
			$admnregno=$_POST['admnregno'];
			$regdate=$_POST['admnregdate'];
			$admnregdate=Date("Y-m-d",strtotime($regdate));
			$branch=$_POST['branch'];
			$semester=$_POST['semester'];
			$stdfirstname=$_POST['stdfirstname'];
			$stdlastname=$_POST['stdlastname'];
			$birthdate=$_POST['dateofbirth'];
			$dateofbirth=Date("Y-m-d",strtotime($birthdate));
			$gender=$_POST['gender'];
			$stdemail=$_POST['stdemail'];
			$stdconnumber=$_POST['stdconnumber'];
			$addressline1=$_POST['addressline1'];
			$addressline2=$_POST['addressline2'];
			$state=$_POST['state'];
			$district=$_POST['district'];
			$pincode=$_POST['pincode'];
			$socialstatus=$_POST['socialstatus'];
			$religon=$_POST['religon'];
			$parentfirstsname=$_POST['parentfirstsname'];
			$parentssecname=$_POST['parentssecname'];
			$parentsemail=$_POST['parentsemail'];
			$parentsconnumber=$_POST['parentsconnumber'];
	/* checking email id is registered or not */
	
	$sql=("SELECT emailid from student where emailid='$stdemail'");
	$query =$con->query($sql);
	if($query->rowCount()==0)
	 {
		 /* inserting data into student table */
		 
		 $sql=("INSERT INTO student(admnregno,admnregdate,branch,semester,fname,lname,dob,gender,emailid,mobno,addressline1,addressline2,state,district,pincode,caste,religon)
                        		VALUES(:admnregno,:admnregdate,:branch,:semester,:stdfirstname,:stdlastname,:dateofbirth,:gender,:stdemail,:stdconnumber,:addressline1,:addressline2,:state,:district,:pincode,:socialstatus,:religon)");
			$query=$con->prepare($sql);
			$query->execute(array (
		       ':admnregno'=>$admnregno,
			   ':admnregdate'=>$admnregdate,
		       ':branch'=>$branch,
		       ':semester'=>$semester,
		       ':stdfirstname'=>$stdfirstname,
		       ':stdlastname'=>$stdlastname,
		       ':dateofbirth'=>$dateofbirth,
		       ':gender'=>$gender,
		       ':stdemail'=>$stdemail,
		       ':stdconnumber'=>$stdconnumber,
		       ':addressline1'=>$addressline1,
		       ':addressline2'=>$addressline2,
		       ':state'=>$state,
		       ':district'=>$district,
		       ':pincode'=>$pincode,
		       ':socialstatus'=>$socialstatus,
		       ':religon'=>$religon));
		 /* end of inserting data into student table */
		 
		$stdfkid=$con->lastInsertId();  /* returning last inserted stdid from student table */
		/* to use it as FK in Parents_details table and stdrequest  table */
		
		/* inserting parents details in parents_details table */
		
		
		/* inserting data into parents_details table start here */
		$sql=("INSERT INTO parents_details(fname,lname,emailid,contactno,student_id) 
			 VALUES(:parentfirstsname,:parentssecname,:parentsemail,:parentsconnumber,:stdfkid)");
		 $query=$con->prepare($sql);
		 $query->execute(array (
			':parentfirstsname'=>$parentfirstsname,
			':parentssecname'=>$parentssecname,
			':parentsemail'=>$parentsemail,
			':parentsconnumber'=>$parentsconnumber,
			':stdfkid'=>$stdfkid));
			
			/* end of inserting data into parents table */
			
			/* primary key for student request table */
			$date =Date("dmYhis");
			$request_date=Date("Y-m-d");
			$reqsts='NEW';
			$code='STD-';
			$reqpk=$code.$date;  /* final pk */
		/* inserting data into stdrequest table start here */ 
		
		$sql=("INSERT INTO stdrequest(requestno,stdudent_id,req_date,req_status) 
		      VALUES(:reqpk,:stdfkid,:request_date,:reqsts)");
		$query=$con->prepare($sql);
		$query->execute(array (
		 ':reqpk'=>$reqpk,
		 ':stdfkid'=>$stdfkid,
		 ':request_date'=>$request_date,
		 ':reqsts'=>$reqsts));
		 /* end of data inserting into stdrequest table */	
         $request_no=$reqpk;	 
       }
	  else
		echo "<script>alert('This Email id is already regesitered')</script>";
	   
	}
   $con->commit();
}
     
  catch(PDOException $e){
	  $con->rollback();
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $con=null; 
?>

<!DOCTYPE html>
<html>
    
    <head>
        <title>Student Request</title>
        <!-- Bootstrap -->
        <link href="./css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="./css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="./css/styles.css" rel="stylesheet" media="screen">
		<link href="./css/wrbcs.css" rel="stylesheet" media="screen">
        <script src="./js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
	<?php
	include('std/header.php');
	include('std/stddashboard.php');
	?>
	
	<!-- Student's Hostel Accomodation Request Form Start -->
	<div class="container offset3">
        <div class="container-fluid">
            <div class="row-fluid">
                <!--/span-->
                <div class="span9" id="content">
                     <!-- wizard -->
                    <div class="row-fluid section">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="pull-center"><legend><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student's Hostel Accomodation Request Form</h2></legend></div>
                                
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <div id="rootwizard">
                                        <div class="navbar">
                                        </div>	
                                             <div class="">										
                                               <form action="" name="stdreqfrm" method="post" class="form-horizontal">
												  	<div class="alert alert-warning">
													  <p>* fields are mandatory.</p>
													 </div>
	      <div class="alert alert-error hide">
				<button class="close" data-dismiss="alert"></button>
                  You have some errors. Please check below. 
          </div>
 <div class="alert alert-success <?php if(!isset($request_no)) echo 'hide';?>">
				<button class="close" data-dismiss="alert"></button>
                  <h4>Your Hostel Accomodation Request No. is <?php echo $reqpk;?> keep this number for future communication.</h4>
 </div>
		  

											   
                                                  <fieldset>

													<legend><h5>Addmission Details</h5></legend>
                                                    <div class="control-group">
													   <label class="control-label">Admn/Reg No:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input type="text" name="admnregno"  class="span6" required/>
                                                      </div>
                                                    </div>
													<div class="control-group">
													   <label class="control-label">Admn/Reg Date:<span class="required">*</span></label>
                                                      <div class="controls">
														<input type="date" class="span6" name="admnregdate" value="DD/MM/YYYY" required>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
													  <label class="control-label">Branch:<span class="required">*</span></label>
                                                       	<div class="controls">																													
														    <select class="span6 m-wrap" name="branch" required>
															<option value="">Select...</option>																												
															<option value="MCA">MCA</option>
															<option value="Civil">Civil</option>
															<option value="EEE">EEE</option>
															<option value="CS">CS</option>
															<option value="EI">EI</option>
															<option value="IT">IT</option>
															<option value="EC">EC</option>
															</select>												
														</div> 
                                                    </div>
                                                    <div class="control-group">
													  <label class="control-label">Semester:<span class="required">*</span></label>
                                                      <div class="controls">  
													     <select class="span6 m-wrap" name="semester" required>																										    	
															<option value="">Select...</option>	
															<option value="S1">S1</option>
															<option value="S2">S2</option>
															<option value="S3">S3</option>
															<option value="S4">S4</option>
															<option value="S5">S5</option>
															<option value="S6">S6</option>
															<option value="S7">S7</option>
															<option value="S8">S8</option>
															</select>															
                                                      </div>
                                                    </div>
												  <legend><h5>Basic Details</h5></legend>
                                                    <div class="control-group">
													<label class="control-label">First Name:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input type="text" name="stdfirstname"  class="span6" required/>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
													   <label class="control-label">Last Name:<span class="required"></span></label>
                                                      <div class="controls">
                                                        <input type="text" name="stdlastname"  class="span6"/>
                                                      </div>
                                                    </div>
													<div class="control-group">													
                                                      <label class="control-label">Date of Birth:<span class="required">*</span></label>
                                                      <div class="controls">
														<input type="date" class="span6 m-wrap"  name="dateofbirth" value="DD/MM/YYYY" required>
                                                      </div>
                                                    </div>
													<div class="control-group">
													  <label class="control-label">Gender:<span class="required">*</span></label>
                                                      <div class="controls">										  
													   <select class="span6 m-wrap" name="gender" required>
															<option value="">Select...</option>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
															</select>
                                                      </div>
                                                    </div>					
												  <legend><h5>Contact Details</h5></legend>
                                                    <div class="control-group">
                                                      <label class="control-label">Email ID:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input name="stdemail" type="email" class="span6" required/>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
													  <label class="control-label">Contact No.:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input name="stdconnumber" type="number" class="span6" required/>
                                                      </div>
                                                    </div>
								<!-- Permanent and Communication Address -->				 
													<legend><h5>Communication Address</h5></legend>
                                                    <div class="control-group">
                                                      <label class="control-label">Locality Name:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input type="text" name="addressline1"  class="span6" required/>
                                                      </div>
                                                    </div>
													<div class="control-group">
                                                      <label class="control-label">Landmark Name:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input type="text" name="addressline2"  class="span6" required/>
                                                      </div>
                                                    </div>
													<div class="control-group">
                                                      <label class="control-label">State:<span class="required">*</span></label>
                                                      <div class="controls">                                                        
														<select class="span6 m-wrap" name="state" required>												  
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
													<div class="control-group">
                                                      <label class="control-label">District:<span class="required">*</span></label>
                                                      <div class="controls">
													  <select class="span6 m-wrap" name="district" required>													  
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
													
                                                    <div class="control-group">
													  <label class="control-label">Pin Code:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input name="pincode" type="number" class="span6" required/>
                                                      </div>
                                                    </div>
	
													
													<legend><h5>Social Status</h5></legend>
                                                    <div class="control-group">
                                                      <label class="control-label">Caste/Community:<span class="required">*</span></label>
                                                      <div class="controls">
														    <select class="span6 m-wrap" name="socialstatus" required>													  
															<option value="">Select...</option>
															<option value="General">General</option>
															<option value="OBC">OBC</option>
															<option value="OBC">SC</option>
															<option value="OBC">ST</option>
															</select>                                                       
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label">Religon:<span class="required">*</span></label>
                                                      <div class="controls">
													  <select class="span6 m-wrap" name="religon" required>													  
															<option value="">Select...</option>
															<option value="Hindu">Hindu</option>
															<option value="Muslim">Muslim</option>
															<option value="Christian">Christian</option>
															</select>                                                       
                                                      </div>
                                                    </div>
													<legend><h5>Parent's Basic Details</h5></legend>												  
                                                    <div class="control-group">
                                                      <label class="control-label">First Name:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input type="text" name="parentfirstsname" class="span6" required/>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label">Last Name:<span class="required"></span></label>
                                                      <div class="controls">
                                                        <input type="text" name="parentssecname" class="span6"/>
                                                      </div>
                                                    </div>
													<legend><h5> Parent's Contact Details</h5></legend>
                                                    <div class="control-group">
                                                      <label class="control-label">Email id:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input name="parentsemail" type="email" class="span6" required/>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label">Contact No.:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input name="parentsconnumber" type="number" class="span6" required/>
                                                      </div>
                                                    </div>
												<div class="controls">
													<button type="submit" name="stdreqsubmitbtn" class="btn btn-primary offset1">&nbsp;&nbsp;Submit&nbsp;&nbsp;</button>
													<button type="reset" class="btn btn-primary offset2">&nbsp;&nbsp;Clear&nbsp;&nbsp;</button>
												</div>
											  </fieldset>
											</form>
										   </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>	
	<!-- Student's Hostel Accomodation Request Form End -->
     <hr>
	 <?php
	     include('std/footer.php');
	 ?>
		       <!-- Footer navigation End  -->
        <!--/.fluid-container-->
        <link href="./css/datepicker.css" rel="stylesheet" media="screen">
        <link href="./css/uniform.default.css" rel="stylesheet" media="screen">
        <link href="./css/chosen.min.css" rel="stylesheet" media="screen">

        <link href="./css/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="./js/jquery-1.9.1.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/jquery.uniform.min.js"></script>
        <script src="./js/chosen.jquery.min.js"></script>
        <script src="./js/bootstrap-datepicker.js"></script>

        <script src="./js/wysihtml5-0.3.0.js"></script>
        <script src="./js/bootstrap-wysihtml5.js"></script>

        <script src="./js/jquery.bootstrap.wizard.min.js"></script>

	<script type="text/javascript" src="./js/jquery.validate.min.js"></script>
	<script src="./js/form-validation.js"></script>
        
	<script src="./js/scripts.js"></script>

    </body>

</html>

