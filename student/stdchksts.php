<?php
session_start(); 

?>

<!DOCTYPE html>
<html>
    
    <head>
        <title>Student Request Status</title>
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
		<!-- Student's Hostel Accomodation Request Status Start -->
	<div class="container offset2">
        <div class="container-fluid">
            <div class="row-fluid">
                <!--/span-->
                <div class="span9" id="content">
                     <!-- wizard -->
                    <div class="row-fluid section">.
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="pull-center"><legend><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student's Hostel Accomodation Request Status</h2></legend></div>
                                
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <div id="rootwizard">
                                        <div class="navbar">
                                        </div>          
											<fieldset>										
                                               <form method="post" class="form-horizontal">
													   <div class="alert alert-error hide">
														<button class="close" data-dismiss="alert"></button>
															You have some errors. Please Enter valid Request No.
													    </div>
													<div class="control-group">
													  <label class="control-label">Request No<span class="required">*</span></label>
														<div class="controls">
														  <input name="chkststxt" type="text" pattern="{18}" title="Please Enter Valid Request No." class="span6 m-wrap" placeholder="STD-25032017065030" required/>
														</div>
													</div>
												  <div class="controls">
													<button type="submit" name="chkstatus" class="btn btn-primary offset1">&nbsp;Check Status&nbsp;</button>
												  </div>
                                               </form>
											 </fieldset>
											 
					<!-- DISPLAYING STATUS TABLE START -->			
                        <div class="block ">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Request Status Details</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table class="table">
						              <thead>
						                <tr>
						                  <th>Requester Name.</th>
						                  <th>Request No.</th>
						                  <th>Request Date</th>
						                  <th>Request Status</th>
										  <th>Alloted Hostel</th>
						                </tr>
						              </thead>
						              <tbody>
						                <tr>
						                  <td>
						<?php 
						if(isset($_POST['chkstatus']))
						{
							$data=1;
							    $reqno=$_POST['chkststxt'];
								$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
								$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$query=$con->query("SELECT *FROM stdrequest WHERE requestno='$reqno'");
							     if($query->rowCount())
								 {
									 
									/* TO GENERATE FIRST NAME AND LAST NAME FROM THE STUDENT TABLE */
									$query=$con->query("SELECT fname,lname FROM student WHERE student_id=(SELECT stdudent_id FROM stdrequest WHERE requestno='$reqno')");
									while($res=$query->fetch())
										{
											echo $res['fname'].$res['lname'];
										}
										 echo "</td>";
											/* TO GENERATE REQUEST NO , REQUEST DATE AND REQUEST STATUS FROM STDREQUEST TABLE */
											$query=$con->query("SELECT *FROM stdrequest WHERE requestno='$reqno'");
											   while($res=$query->fetch())
											   {
													echo "<td>".$res['requestno']."</td>";
													echo "<td>".Date("d-m-Y",strtotime($res['req_date']))."</td>";
													echo "<td>".$res['req_status']."</td>";
													if($res['req_status']=='NEW')
													  echo "<td>"."Request is Not processed yet"."</td>";
												    if($res['req_status']=='Forwarded')
													  echo "<td>".$res['hostelid']." "."<a href="."display_allotedhstl.php?hostelid=".$res['hostelid']." target="."_blank".">"."Show</a></td>";
												    if($res['req_status']=='Accepted')
													  echo "<td>".$res['hostelid']." "."<a href="."display_roomallotedhstl.php?reqno=".$reqno." target="."_blank".">"."Show</a></td>";
												  	if($res['req_status']=='Rejected')
													  echo "<td>".$res['rejection']."</td>";
											   }
								 }
								 else 
								 {
									 echo "Entered Data Not Matched ! No Data to Dispaly ";
								 }
						}
					?>
						                </tr>
						              </tbody>
						            </table>
                                </div>
                            </div>
                        </div>
			<!-- DISPLAYING STATUS TABLE END -->
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
	</div>	
	<!-- Student's Hostel Accomodation Request Status End -->
	
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
 
