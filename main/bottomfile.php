	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="assets/js/modernizr-latest.js"></script> 
	<script type='text/javascript' src='assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='assets/js/fancybox/jquery.fancybox.pack.js'></script>   
    <script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='assets/js/camera.min.js'></script> 
    <script src="assets/js/bootstrap.min.js"></script> 
	<script src="assets/js/custom.js"></script>
	
	
	<script>
var nameinput=document.getElementById('name');
nameinput.oninvalid=function(event){
	  event.target.setCustomValidity('Your name should contain lowercase letters. e.g. john');
}

nameinput:invalid{
	       border-color:red;
}
nameinput,
nameinput:valid{
	 border-color:#ccc;
}

</script>