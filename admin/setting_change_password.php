<?php 

$userid=$_GET['id'];

?>

<?php 
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['chgpass']))
		{
			$password=$_POST['confirmpassword'];
			
		/* update password to user_details table */
			$updatestmt2=("UPDATE userdetails SET password =:password WHERE userid='$userid'"); 
			$queryupdate2 =$connect->prepare($updatestmt2);
			
			$queryupdate2->execute(array(
							'password'=>$password)
									);
			echo "<script>alert('Password Changed Successfully !!!!')</script>";
			 

		}
			  
		   
}
  catch(PDOException $e)
  {
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;
?>
<?php 
include('admintools/topfile.php');
echo "<title>Admin| Change Password</title>";
?>

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('admintools/header.php');
include('admintools/dashboard.php');
echo "<div>";
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
      </h1>
 
    </section>
    <!-- Main content -->
			<br>
			<br>
    <section class="content">
      <div class="row">
       <div class="col-md-2"></div>
         <div class="col-md-8">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
                
             <!-- /.box-header -->
            <!-- form start -->
			<form method="post" class="form-horizontal">
			<fieldset>
			<!-- select start -->

				<br>
				<br>
		 <div class="box-body">
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">New Password: <span class="required">*</span></label>
				  
                  <div class="col-xs-5">
				    <input name="newpassword" type="password" id="password" class="form-control" placeholder="New Password" required/>
                  </div>
                </div>
				<!-- select end -->	
            
			      
                <div class="form-group">
				  <label class="col-sm-4 control-label">Confirm Password:<span class="required">*</span></label>

                  <div class="col-xs-5">
                    <input name="confirmpassword" type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" required/>
						
                  </div>
                </div>
            </div>
				<br>
				<br>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="chgpass" class="btn btn-primary">Submit</button>
				
                <button type="reset" name="reset" class="btn btn-primary pull-right">Clear</button>
              </div>
              <!-- /.box-footer -->
			  </fieldset>
            </form>
			<!-- form End -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      <!-- /.row -->
    </section>
	<!-- Sectin .content End -->
	</div>
	<!-- /.content-wrapper  end here--> 
<script>
var password=document.getElementById("password");
var confirm_password=document.getElementById("confirm_password");
function validatePassword()
{
	if(password.value!=confirm_password.value)
	{
		confirm_password.setCustomValidity("Password not matching!!!");
	}
	else
	{
		confirm_password.setCustomValidity('');
	}
password.onchange=validatePassword;
confirm_password.onkeyup=validatePassword;
}


    

</script>
	
	
	
  <?php 
	include('admintools/footer.php');
	include('admintools/bottomfile.php');
	?>
	</div>
</body>
</html>
	