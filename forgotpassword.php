<?php 

try{
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['submit']))
		{
			$emailid=$_POST['confirm_email'];
			$mobno=$_POST['mobno'];
			
			 $sql=("SELECT * from staff_details WHERE emailid='$emailid' and mobileno='$mobno'");
			 $query =$con->query($sql);
			 if($query->rowCount()==0)
			 {
				 $stafferror=1;
			 }
			 else if
			 
			 {
			    $query =$con->query("SELECT * FROM userdetails where username='$emailid'");

			      while($res=$query->fetch())
			       {
					   $uname=$res['username'];
					   $pass=$res['password'];
				   }
				   
				    require 'PHPMailer/PHPMailerAutoload.php';
					$mail = new PHPMailer;
					$mail->isSMTP();
					$mail->Debugoutput = 'html';
					$mail->Host = 'smtp.gmail.com';
					$mail->Port = 587;
					$mail->SMTPSecure = 'tls';
					$mail->SMTPAuth = true;
					$mail->Username = "hms.minis4@gmail.com";
					$mail->Password = "hmsmini@s4";
					$mail->setFrom('hms.minis4@gmail.com', 'Admin HMS CEV');
					$mail->addAddress($emailid, $mobno." ". $emailid);
					$mail->Subject = 'User Details';
					$body ="Your User Login Details to HMS System is as follows:<br><br>"."<table>
							<thead>
								<tr>
									<th>User Name/ Login ID</th>
									<th>Password</th>
								</tr>
							</thead>
								<tbody>
									<tr>
										<td>".$uname."</td>
										<td>".$pass."</td>
									</tr>
								</tbody>
							</table>";

										$mail->msgHTML($body);
										//$mail->Body=$body;
										$mail->AltBody='';



										//send the message, check for errors
													if (!$mail->send()) {
														echo "Mailer Error: " . $mail->ErrorInfo;
														}
			             }
					   







 


?>





<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HMS Portal | Forgot Password</title>
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
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
    <div>
      <div class="error-page">
        <div class="text-center">
          <h3>Have you forgot your password?</h3>
		  <br>
          <p>
           <h5> Provide us your Username ,Email Id and registered Mobile No.to get password.</h5>
          </p>
        </div>
      </div>
    </div>
<div class="lockscreen-wrapper">

  <!-- START LOCK SCREEN ITEM -->
  <form method="post">
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="assets/pageassets/profile.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
		<div class="lockscreen-credentials">
			<div class="input-group">
			   <input type="email" name="email1" id="email1" class="form-control" placeholder="Email Id" required>
			</div>
		</div>
    <!-- /.lockscreen credentials -->
  </div>
  <!-- /.lockscreen-item -->
 		<div class="form-group">
		   <input type="email" name="email2" id="confirm_email" class="form-control" placeholder="Re-Type Your Email ID" required>
		</div>
		<div class="form-group">
		   <input type="number" name="mobno" class="form-control" placeholder="Mobile No." required>
		</div>
      <div class="col-xs-7">
          <button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
     </div>
  </form>
 
 </div>
 
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 
 
  <footer class="text-center">
    <strong>Copyright &copy;2017,<a href="index.php">Hostel Management System.</a></strong> All rights
    reserved.<br> Designed &amp; Devolped by 7Apps Infotech,Vatakara
  </footer>

<script>
var email1=document.getElementById("email1");
var confirm_email=document.getElementById("confirm_email");
function validateEmail()
{
	if(email1.value!=confirm_email.value)
	{
		confirm_email.setCustomValidity("Email Id not matching!!!");
	}
	else
	{
		confirm_email.setCustomValidity('');
	}
}
email1.onchange=validateEmail;
confirm_email.onkeyup=validateEmail;
    

</script>

<!-- jQuery 2.2.3 -->
<script src="assets/pageassets/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/pageassets/bootstrap.min.js"></script>
</body>
</html>
