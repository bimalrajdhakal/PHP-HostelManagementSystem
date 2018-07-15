<?php
session_start(); 
?>
<?php 
if(isset($_GET['hostelid']))
{
	$hostelid=$_GET['hostelid'];
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query =$con->query("SELECT *FROM hostel_details WHERE hostel_id='$hostelid'");
	$res=$query->fetch();
}

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
                                <div class="pull-center"><legend><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								Hostel Details</h2></legend></div>
                                
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    	 
					<!-- DISPLAYING hostel details  START -->			
                        <div class="block ">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><h4>Alloted Hostel Details</h4></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12 form-horizontal">
													<div class="control-group">
													  <label class="control-label">Hostel Name<span class="required">:</span></label>
                                                      <div class="controls">
														<input type="text"  class="span6 m-wrap" value="<?php echo $res['hostel_name'];?>" />
                                                      </div>
													</div>
													<div class="control-group">
													  <label class="control-label">Address<span class="required">:</span></label>
                                                      <div class="controls">
														<input type="text"  class="span6 m-wrap" value="<?php echo $res['addressline1'];?>"/>
														     <br>
															 <br>
														<input type="text"  class="span6 m-wrap" value="<?php echo $res['addressline2'];?>"/>
                                                      </div>
													</div>
													<div class="control-group">
													  <label class="control-label">District<span class="required">:</span></label>
                                                      <div class="controls">
														<input type="text"  class="span6 m-wrap" value="<?php echo $res['district'];?>" />
                                                      </div>
													</div>
													<div class="control-group">
													  <label class="control-label">State<span class="required">:</span></label>
                                                      <div class="controls">
														<input type="text"  class="span6 m-wrap" value="<?php echo $res['state'];?>" />
                                                      </div>
													</div>
													<div class="control-group">
													  <label class="control-label">PIN Code<span class="required">:</span></label>
                                                      <div class="controls">
														<input type="text"  class="span6 m-wrap" value="<?php echo $res['pincode'];?>" />
                                                      </div>
													</div>
													<div class="control-group">
													  <label class="control-label">Contact No.<span class="required">:</span></label>
                                                      <div class="controls">
														<input type="text"  class="span6 m-wrap" value="<?php echo $res['contactno'];?>" />
                                                      </div>
													</div>
													<div class="control-group">
													  <label class="control-label">Hostel Type<span class="required">:</span></label>
                                                      <div class="controls">
														<input type="text"  class="span6 m-wrap" value="<?php echo $res['hosteltype'];?>" />
                                                      </div>
													</div>
                                </div>
                            </div>
                        </div>
			<!-- DISPLAYING hostel details  END -->
                                    
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
 

