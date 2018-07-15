<!DOCTYPE html>
<html>
    
    <head>
        <title>Student Dashboard</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="css/styles.css" rel="stylesheet" media="screen">
		<link href="css/wrbcs.css" rel="stylesheet" media="screen">
        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
	<?php
	include('std/header.php');
	include('std/stddashboard.php');
	?>
	<?php
	include('std/footer.php');
	?>
	<hr>
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