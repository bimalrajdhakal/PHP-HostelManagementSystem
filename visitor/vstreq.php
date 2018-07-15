<?php 
session_start();
try{
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$con->beginTransaction();
		if(isset($_POST['vstreqsubmitbtn']))
		{
			if(!isset($_POST['optionsRadios']))
			{   
		        //echo ".<script> alert("."Please select Visiting Purpose".").</script>";
				$error=1;
			}
			else 
			{
			$vstpurpose=$_POST['optionsRadios'];
			$indate=$_POST['checkindate'];
			$checkindate=Date("Y-m-d",strtotime($indate));
			$outdate=$_POST['checkoutdate'];
			$checkoutdate=Date("Y-m-d",strtotime($outdate));
			$admnregno=$_POST['admnregno'];
			$vstfirstname=$_POST['vstfirstname'];
			$vstlastname=$_POST['vstlastname'];
			$birthdate=$_POST['dateofbirth'];
			$dateofbirth=Date("Y-m-d",strtotime($birthdate));
			$gender=$_POST['gender'];
			$vstemail=$_POST['vstemail'];
			$vstconnumber=$_POST['vstconnumber'];
			$addressline1=$_POST['addressline1'];
			$addressline2=$_POST['addressline2'];
			$state=$_POST['state'];
			$district=$_POST['district'];
			$pincode=$_POST['pincode'];
	
		 /* inserting data into visitor_details table */
		 
		 $sql=("INSERT INTO visitor_details(purpose,wardid,fname,lname,dob,gender,email,contactno,addressline1,addressline2,state,district,pincode)
                        		VALUES(:purpose,:admnregno,:vstfirstname,:vstlastname,:dateofbirth,:gender,:vstemail,:vstconnumber,:addressline1,:addressline2,:state,:district,:pincode)");
			$query=$con->prepare($sql);
			$query->execute(array (
			   ':purpose'=>$vstpurpose,
		       ':admnregno'=>$admnregno,
		       ':vstfirstname'=>$vstfirstname,
		       ':vstlastname'=>$vstlastname,
		       ':dateofbirth'=>$dateofbirth,
		       ':gender'=>$gender,
		       ':vstemail'=>$vstemail,
		       ':vstconnumber'=>$vstconnumber,
		       ':addressline1'=>$addressline1,
		       ':addressline2'=>$addressline2,
		       ':state'=>$state,
		       ':district'=>$district,
		       ':pincode'=>$pincode));
		 /* end of inserting data into visitor_details table */
		 
		$vstfkid=$con->lastInsertId();  /* returning last inserted visitorid from visitor_details table */
		/* to use it as FK in vstrrequest table*/
		
			/* primary key for  vstrrequest table */
			$date =Date("dmYhis");
			$request_date=Date("Y-m-d");
			$reqsts='NEW';
			$code='VST-';
			$vstreqpk=$code.$date;  /* final pk */
		/* inserting data into vstrrequest table start here */ 
		
		$sql=("INSERT INTO vstrrequest(vstreqno,visitorid,vstrreqdate,checkindate,checkoutdate,vstreqstatus) 
		      VALUES(:vstreqpk,:vstfkid,:request_date,:checkindate,:checkoutdate,:reqsts)");
		$query=$con->prepare($sql);
		$query->execute(array (
		 ':vstreqpk'=>$vstreqpk,
		 ':vstfkid'=>$vstfkid,
		 ':request_date'=>$request_date,
		 ':checkindate'=>$checkindate,
		 ':checkoutdate'=>$checkoutdate,
		 ':reqsts'=>$reqsts));
		 /* end of data inserting into vstrequest table */	
         $request_no=$vstreqpk;		
		}
	   $con->commit();
		}
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
        <title>Visitor Request</title>
        <!-- Bootstrap -->
        <link href="./css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="./css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="./css/styles.css" rel="stylesheet" media="screen">
		<link href="./css/wrbcs.css" rel="stylesheet" media="screen">
        <script src="./js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
	<?php
	include('vstr/header.php');
	include('vstr/vstrdashboard.php');
	?>
	<br>
	<!-- Visitor's Hostel Accomodation Request Form Start -->
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
                                <div class="pull-center"><legend><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Visitor's Hostel Accomodation Request Form</h2></legend></div>
                                
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <div id="rootwizard">
                                        <div class="navbar">
                                        </div>	
                                             <div>		
					<div class="alert alert-warning">
					  <p>* fields are mandatory.</p>
					</div>
	      <div class="alert alert-error <?php if(!isset($error)) echo 'hide';?>">
				<button class="close" data-dismiss="alert"></button>
                  You have some form errors. Please check below. 
          </div>
		  
 <div class="alert alert-success <?php if(!isset($request_no)) echo 'hide';?>">
				<button class="close" data-dismiss="alert"></button>
                  <h4>Yout Hostel Accomodation Request No. is <?php echo $vstreqpk;?> keep this number for future communication.</h4>
 </div>											 
                                               <form action="" name="vstrfrm" method="post"  class="form-horizontal">
                                                  <fieldset>
													<legend><h5>Visiting Details</h5></legend>
												    <fieldset>
                                                    <div class="control-group pull-left">
                                                      <label class="control-label" for="focusedInput">Visiting Purpose:<span class="required">*</span></label>                                                                                                                                                                  
                                                    </div>
													<div class="controls">
													   <label>
														 <input  type="radio" name="optionsRadios" id="optionsRadios1" value="Educational Work">
															Educational Work
														</label>
													</div>
													<div class="controls">
													   <label>
														 <input  type="radio" name="optionsRadios" id="optionsRadios2" value="College Guest">
															College Guest
														</label>
													</div>
													<div class="controls">
													   <label>
														 <input  type="radio" name="optionsRadios" id="optionsRadios3" value="To Meet Ward">
															To Meet Ward
														</label>
													</div>
													<br>
                                                    </fieldset>
													<div class="control-group">													
                                                      <label class="control-label">Check In Date:<span class="required">*</span></label>
                                                      <div class="controls">
														<input type="date" class="span6 m-wrap"  name="checkindate" value="DD/MM/YYYY" required>
                                                      </div>
                                                    </div>
													<div class="control-group">													
                                                      <label class="control-label">Checked Out Date:<span class="required">*</span></label>
                                                      <div class="controls">
														<input type="date" class="span6 m-wrap" name="checkoutdate" value="DD/MM/YYYY" required>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
													   <label class="control-label">Ward's Admn/Reg No:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input type="text" name="admnregno" data-required="1" class="span6 m-wrap"/>
                                                      </div>
                                                    </div>
												  <legend><h5>Basic Details</h5></legend>
                                                    <div class="control-group">
													<label class="control-label">First Name:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input type="text" name="vstfirstname" pattern="{5}" title="First Name must be atleast 2 character"data-required="1" class="span6 m-wrap" required/>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
													   <label class="control-label">Last Name:<span class="required"></span></label>
                                                      <div class="controls">
                                                        <input type="text" name="vstlastname" data-required="1" class="span6 m-wrap"/>
                                                      </div>
                                                    </div>
													<div class="control-group">													
                                                      <label class="control-label">Date of Birth:<span class="required">*</span></label>
                                                      <div class="controls">
														<input type="date" class="span6 m-wrap" id="date01" name="dateofbirth" value="DD/MM/YYYY" required>
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
                                                        <input name="vstemail" type="email" class="span6" required/>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
													  <label class="control-label">Contact No.:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input name="vstconnumber" type="number" pattern="[0-9]{10}" title="Contact No. must be 10 digit" class="span6 m-wrap"required/>
                                                      </div>
                                                    </div>
								<!-- Permanent and Communication Address -->				 
													<legend><h5>Communication Address</h5></legend>
                                                    <div class="control-group">
                                                      <label class="control-label">Locality Name:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input type="text" name="addressline1" data-required="1" pattern="{5}" title="Locality Name must be atleast 5 character"class="span6 m-wrap"required/>
                                                      </div>
                                                    </div>
													<div class="control-group">
                                                      <label class="control-label">Landmark Name:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input type="text" name="addressline2" data-required="1" pattern="{5}" title="Landmark Name must be atleast 5 character"class="span6 m-wrap"required/>
                                                      </div>
                                                    </div>
													<div class="control-group">
                                                      <label class="control-label">State:<span class="required">*</span></label>
                                                      <div class="controls">                                                        
														<select class="span6 m-wrap" name="state" required/>												  
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
													  <select class="span6 m-wrap" name="district" required/>													  
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
                                                      <label class="control-label">PIN Code:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input name="pincode" type="number" pattern="[0-9]{6}" title="Please enter at 6 digit PIN Code" class="span6 m-wrap"required>
                                                      </div>
                                                    </div>
												<div class="controls">
													<button type="submit" name="vstreqsubmitbtn" class="btn btn-primary offset1">&nbsp;&nbsp;Submit&nbsp;&nbsp;</button>
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
	<!-- Visitor's Hostel Accomodation Request Form End -->
     <hr>
<?php
	include('vstr/footer.php');
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
        <script>
		jQuery(document).ready(function() {   
	   FormValidation.init();
	});
	

        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
    </body>

</html>
 

