  
<?php
    include("database.php");
	session_start();
	$access = isset($_SESSION['access']) ? $_SESSION['access']: null;
	if(isset($_POST['loginbtn']))
	 {
			$myusername=$_POST['username'];
			$mypassword=$_POST['password'];
			$sql="SELECT * FROM `userdetails` WHERE username='$myusername' and password='$mypassword'";
			$result=mysqli_query($con,$sql);
			$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
				if($data['username']!=$myusername and $data['password']!=$mypassword)
	
				$error=1;
				else if ($data['username']=$myusername and $data['password']=$mypassword)
					{
						//session_register("myusername");
						$_SESSION['login_user']=$myusername;
						if ($data['user_flag']=="DEV")
							 header("location:admin/adminmain.php");
						else if($data['user_flag']=="ADMN")
							 header("location:admin/adminmain.php");
						else if($data['user_flag']=="OTHS")
							 header("location:otherstaff/osmain.php");
						else if($data['user_flag']=="STDU")
							 header("location:studenthms/studentmain.php");
						else if($data['user_flag']=="WRDN")
							 header("location:warden/wardenmain.php");
						else 
							 header("location:welcome.php");
					}
	    }
	?>
		
<!DOCTYPE html>
	
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HMS Portal | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/pageassets/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/pageassets/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/pageassets/blue.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>HMS Portal</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Log in to Hostel Management System</p>
	
	      <div class="control-group alert alert-danger text-danger <?php if(!isset($error)) echo 'hide';?>">
                  Invalid username or password ! Please try again with correct user details!
          </div>

    <form name="loginForm" method="post">
      <div class="form-group has-feedback">
	 <!-- <span class="glyphiconglyphicon glyphicon-user form-control-feedback"></span> -->
        <input type="text" name="username" id="username" class="form-control" placeholder="User Name" required>
        
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
       <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
      </div>
      <div class="row">
	   <p  class="" id="errmsg"></p>
        <!-- /.col -->
        <div class="form-group col-xs-7">
          <button type="submit" name="loginbtn" class="btn btn-primary pull-right">Submit</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <br>

  <!--  <a href="forgotpassword.php">I forgot my password</a><br> -->
    

  </div>
  <!-- /.login-box-body -->
</div>

  <!-- /.content-wrapper -->

  <footer class="lockscreen-footer text-center">
    <strong>Copyright &copy;<?php echo Date("Y");?>,<a href="index.php">Hostel Management System.</a></strong> All rights
    reserved.<br> Designed &amp; Devolped by 7Apps Infotech,Vatakara
  </footer>
 
<!-- jQuery 2.2.3 -->
<script src="assets/pageassets/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/pageassets/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/pageassets/icheck.min.js"></script>

</body>
</html>
