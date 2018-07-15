<?php
session_start();
$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['pubfeedbtn']))
{
	$feedbacksub=$_POST['optionsRadios'];
	$concernhostel=$_POST['hostel'];
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];
	$address1=$_POST['addressline1'];
	$address2=$_POST['addressline2'];
	$address3=$_POST['addressline3'];
	$emailid=$_POST['email'];
	$contactno=$_POST['contactno'];
	$complain=$_POST['grivances'];
	
	$sql=("INSERT INTO publicfeed(feed_concern,hostel,fname,lname,addline1,addline2,addline3,emailid,contactno,complain)
			VALUES (:feedbacksub,:concernhostel,:fname,:lname,:address1,:address2,:address3,:emailid,:contactno,:complain)");
			$query=$con->prepare($sql);
			$query->execute(array (
			':feedbacksub'=>$feedbacksub,
			':concernhostel'=>$concernhostel,
			':fname'=>$fname,
			':lname'=>$lname,
			':address1'=>$address1,
			':address2'=>$address2,
			':address3'=>$address3,
			':emailid'=>$emailid,
			':contactno'=>$contactno,
			':complain'=>$complain));
			$datainsert=1;
}

?>




<!DOCTYPE html>
<html>
    
    <head>
        <title>Public Grievances</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="css/styles.css" rel="stylesheet" media="screen">
		<link href="css/wrbcs.css" rel="stylesheet" media="screen">
        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
	<!-- Top navigation bar start  -->
	<div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="../index.php">HMS Portal</a>
                    <div class="nav-collapse collapse">                        
                        <ul class="nav">
                            <li class="active">
                                <a href="publicfeedback.php">Dashboard</a>
                            </li>
                            <li class="dropdown">
                                <a  data-toggle="dropdown" class="dropdown-toggle">HMS <b class="caret"></b>

                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li>
                                        <a href="../index.php">Home <i class="icon-arrow-right"></i></a>										
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Student Services <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="../student/stdreq.php">Request</a>
                                    </li>
									<li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="../student/stdchksts.php">Check Status</a>
                                    </li>
									<li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="../student/stdhstlavlchk.php">Check Availability</a>
                                    </li>
										<li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="../login.php">Login to HMS</a>
                                    </li>
                                </ul>
                            </li>
							<li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Visitors Services <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="vstreq.php">Request</a>
                                    </li>
									<li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="vstrchksts.php">Check Status</a>
                                    </li>
									<li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="vstrhstlchk.php">Check Availability</a>
                                    </li>
										<li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="#">View Bills</a>
                                    </li>
                                </ul>
                            </li>
							
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
		</div>
	
	<!-- Top navigation bar End  -->
	
	<!-- Dashboard start -->
					<div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
					
					    <li class="active">
                            <a href="#"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon-chevron-right"></i> HMS</a>
                        </li>
                        <li>
                            <a href="../index.php"><i class="icon-chevron-right"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Home</a>
                        </li>
                        <li>
                             <a href="../rules.php"><i class="icon-chevron-right"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rules</a>
                        </li>
                        <li>
                            <a href="../contact.php"><i class="icon-chevron-right"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contact</a>
                        </li>
                        <li>
                            <a><i class="icon-chevron-right"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
                        </li>
                        <li>
                            <a><i class="icon-chevron-right"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
                        </li>
                        <li>
                            <a href="#"><i class="icon-chevron-right"></i> Student Services</a>
                        </li>
                        <li>
                            <a href="../student/stdreq.php"><i class="icon-chevron-right"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Request</a>
                        </li>
                        <li>
                            <a href="../student/stdchksts.php"><i class="icon-chevron-right"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Check Status</a>
                        </li>
                        <li>
                            <a href="../student/stdhstlavlchk.php"><i class="icon-chevron-right"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Check Availability</a>
                        </li>
                        <li>
                            <a href="../login.php"><i class="icon-chevron-right"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Login to HMS</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon-chevron-right"></i> Visitors Services</a>
                        </li>
                        <li>
                            <a href="vstreq.php"><i class="icon-chevron-right"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Request</a>
                        </li>
                        <li>
                            <a href="vstrchksts.php"><i class="icon-chevron-right"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Check Status</a>
                        </li>
                        <li>
                            <a href="vstrhstlchk.php"><i class="icon-chevron-right"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Check Availability</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon-chevron-right"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; View Bills</a>
                        </li>
                    </ul>
                </div>
				<!-- Dashboard End -->
	
	<!-- Grievances Registration Form Start -->
	<br>
	<div class="container offset2">
        <div class="container-fluid">
            <div class="row-fluid">
                <!--/span-->
                <div class="span9" id="content">
                     <!-- wizard -->
                    <div class="row-fluid section">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="pull-center"><legend><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Grievances Registration Form</h2></legend></div>                                
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <div id="rootwizard">
                                        <div class="navbar"></div>  
	            <div class="alert alert-success alert-dismissible <?php if(!isset($datainsert)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Thank you for your valuable feedback ,it will help us to improve our service !!!!</h5>
				</div>										
                                               <form class="form-horizontal" name="publicfeedback" method="post">																							 											  
                                                  <fieldset>
												    <fieldset>
                                                    <div class="control-group pull-left">
                                                      <label class="control-label" for="focusedInput">Grievance Concerns:<span class="required">*</span></label>                                                                                                                                                                  
                                                    </div>
													<div class="controls">
													   <label>
														 <input class="input-xlarge focused" type="radio" name="optionsRadios" id="optionsRadios1" value="hmssystem">
															HMS System
														</label>
													</div>
													<div class="controls">
													   <label>
														 <input class="input-xlarge focused" type="radio" name="optionsRadios" id="optionsRadios2" value="hostel">
															Hostel
														</label>
													</div>
													<div class="controls">
													   <label>
														 <input class="input-xlarge focused" type="radio" name="optionsRadios" id="optionsRadios3" value="suggestion">
															Suggestion
														</label>
													</div>
													<div class="controls">
													   <label>
														 <input class="input-xlarge focused" type="radio" name="optionsRadios" id="optionsRadios4" value="notlisted">
															Not Known or Listed
														</label>
													</div>	
                                                    </fieldset>
                                                      </br>													
                                                    <fieldset>													
                                                    <div class="control-group pull-left">
                                                      <label class="control-label" for="focusedInput">Hostel:<span class="required">*</span></label>
                                                       	<div class="controls">																													
														    <select class="input-large" placeholder="Select..." name="hostel">
															<option value="">Select...</option>	
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
													</fieldset>												
													<fieldset>
                                                    <div class="control-group pull-left">
                                                      <label class="control-label" name="firstname">First Name:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input class="input-large focused" name="firstname" id="firstname" type="text" value="" placeholder="First Name" required>
                                                      </div>
                                                    </div>
                                                    <div class="control-group pull-left">
                                                      <label class="control-label" name="lastname">Last Name:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input class="input-medium focused" name="lastname" id="lastname" type="text" value="" placeholder="Last Name" required>
                                                      </div>
                                                    </div>
													</fieldset>
													<fieldset>
                                                    <div class="control-group pull-left">
                                                      <label class="control-label" name="address">Address:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input class="input-mlarge focused" name="addressline1" id="addressline1" type="text" value="" placeholder="Address Line 1" required>
                                                      </div>
													  </br>
													  <div class="controls">
                                                        <input class="input-mlarge focused" name="addressline2" id="addressline2" type="text" value="" placeholder="Address Line 2" required>
                                                      </div>
													  </br>
                                                      <div class="controls">
                                                        <input class="input-mlarge focused" name="addressline3" id="addressline3" type="text" value="" placeholder="Address Line 3" required>
                                                      </div>
                                                    </div>
													</fieldset>
													<fieldset>
                                                    <div class="control-group pull-left">
                                                      <label class="control-label" name="email">Email id:<span class="required">*</span></label>
                                                      
                                                      <div class="controls">
                                                        <input class="input-large focused" name="email" id="email" type="email" value="" placeholder="Email ID" required>
                                                      </div>
                                                    </div>
                                                    <div class="control-group pull-left">
                                                      <label class="control-label" name="contactno">Contact No.:<span class="required">*</span></label>
                                                      <div class="controls">
                                                        <input class="input-xlarge focused" name="contactno" id="contactno" type="number" value="" required>
                                                      </div>
                                                    </div>
													</fieldset>
													<fieldset>
														<div class="control-group">
														  <label class="control-label" >Grievance Description:<span class="required">*</span></label>
															<div class="controls">
																<textarea class="input-xlarge" name="grivances" placeholder="Enter Your Grievance Description ..." style="width: 542px; height: 200px" required></textarea>
															</div>
														</div>
														<div class="controls">
														    <button type="submit" name="pubfeedbtn" class="btn btn-primary pull-left">&nbsp;&nbsp;Submit&nbsp;&nbsp;</button>
															<button type="reset" class="controls btn pull-left">&nbsp;&nbsp;Clear&nbsp;&nbsp;</button>
														</div>	
													</fieldset>
                                            </fieldset>
                                        </form>
									</div>
								</div>
						     </div>
						</div>
                    </div>
					<!-- /block -->
                </div>
				<!-- /wizard -->
            </div>
        </div>                    
    </div>
	            	
	<!-- Grievances Registration Form End -->
     <hr>
	 <!-- Footer navigation start  -->
        <footer>							 
	     <td class="footerbg">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">							
				 <tr> 				 
				     <td class="footer"><a href="#">&copy;copyright 2017, Hostel Management System. All rights reserved</a></td>					
			    </tr>
				<tr>
					<td class="footer">Designed &amp; Developed by <a href="#">7Apps Infotech,Vatakara</a></td>
				</tr>
		     </table>
	     </td>						               
       </footer>
			
      <!-- Footer navigation End  -->
        <!--/.fluid-container-->
        <link href="css/datepicker.css" rel="stylesheet" media="screen">
        <link href="css/uniform.default.css" rel="stylesheet" media="screen">
        <link href="css/chosen.min.css" rel="stylesheet" media="screen">

        <link href="css/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="js/jquery-1.9.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.uniform.min.js"></script>
        <script src="js/chosen.jquery.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>

        <script src="js/wysihtml5-0.3.0.js"></script>
        <script src="js/bootstrap-wysihtml5.js"></script>

        <script src="js/jquery.bootstrap.wizard.min.js"></script>

	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script src="js/form-validation.js"></script>
        
	<script src="js/scripts.js"></script>
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