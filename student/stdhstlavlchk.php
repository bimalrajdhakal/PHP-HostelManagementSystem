<?php
   session_start();
  ?>


<!DOCTYPE html>
<html>
    
    <head>
        <title>Student|Hostel Check</title>
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
	<!--  Hostel Accomodation Availability Check Start -->
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
                                <div class="pull-center"><legend><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Check Hostel Accomodation Availability</h2></legend></div>                               
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <div id="rootwizard">
                                        <div class="navbar">
                                        </div>                                       									                                            
                                               <form method="post" name="hstlcheck" class="form-horizontal">
                                                  <fieldset>
												   <div class="alert alert-error hide">
													 <button class="close" data-dismiss="alert"></button>
														You have some errors. Please select any Hostel.
												   </div>
                                                    <div class="control-group">
													  <label class="control-label">Name of Hostel:<span class="required">*</span></label>													  													                                                       
                                                       	<div class="controls">		
                                                           <select class="span6 m-wrap" name="category" required>														
															<option value="">Select...</option>		
                                                          															
						<?php 
						        	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
									$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$comboquery =$con->query("SELECT hostel_id,hostel_name FROM hostel_details");
									while($combodata=$comboquery->fetch()) 
									echo "<option value=".$combodata['hostel_id'].">".$combodata['hostel_name']."</option>";
						?>
						</select>
															</select>												
														</div> 
                                                    </div>													  
												  <div class="controls">
													<button type="submit" name="hstlavlchkbtn" class="btn btn-primary offset1">&nbsp;Check Status&nbsp;</button>
												  </div>
                                                  </fieldset>
                                                </form>  
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Hostel Status</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table class="table">
						              <thead>
						                <tr>
						                  <th>Hostel Name</th>
						                  <th>Capacity</th>
						                  <th>Occupied</th>
						                  <th>Availability</th>
						                </tr>
						              </thead>
						              <tbody>
						                <tr>
						                  <td>
					<?php 
						if(isset($_POST['hstlavlchkbtn']))
						{
							$data=1;
							    $hstlid=$_POST['category'];
								$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
								$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$query=$con->query("SELECT hostel_name,noofroom FROM hostel_details WHERE hostel_id='$hstlid'");
								$res=$query->fetch();
								$queryselect=$con->query("SELECT hostel_id,room_no FROM room_allotment WHERE hostel_id='$hstlid'");
										  echo  $res['hostel_name'] ."</td>";
						                  echo" <td>".$res['noofroom']."</td>";
						                  echo" <td>".$queryselect->rowCount()."</td>";
						                  echo" <td>" .($res['noofroom']-$queryselect->rowCount()) ."</td>";
										
								 
						}
						?>
						                </tr>
						                
						              </tbody>
						            </table>
                                </div>
                            </div>
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
	</div>	
	<!-- Hostel Accomodation Availability Check End -->
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
 
