<?php
session_start();
try{
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if(isset($_POST['sendmsg']))
	{
		 $name=$_POST['name'];
		 $email=$_POST['email'];
		 $contactno=$_POST['contactno'];
		 $subject=$_POST['subject'];
		 $message=$_POST['msgtxtarea'];
		 $status="Unread";
		 $sql=("INSERT INTO contact_us(sendername,senderemailid,contactno,subject,message,status) VALUES
         	   (:name,:email,:contactno,:subject,:message,:status)");
	     $query=$con->prepare($sql);
		 $query->execute(array(
		  ':name'=>$name,
		  ':email'=>$email,
		  ':contactno'=>$contactno,
		  ':subject'=>$subject,
		  ':message'=>$message,
		  ':status'=>$status));
		  $insertrec="some msg";		     
	}
  }
  catch(PDOException $e){
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $con=null;
 ?>	 
<!DOCTYPE html>
<html lang="en">
<head>
<title>HMS Portal | Contact</title>
<?php
include('/main/topfile.php');
?>
</head>
<body>

<!-- Include header.php file from main directory -->
<?php
include('/main/header.php');
?>


		<header id="head" class="secondary">
            <div class="container">
                    <h1>Contact Us</h1>
                    <p></p>
                </div>
    </header>

	
		<!-- container -->
	<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h3 class="section-title">Your Message</h3>
						<p>
						Type Your Message Here:
						</p>
	      <div class="alert alert-success <?php if(!isset($insertrec)) echo 'hide';?>">
				<button class="close" data-dismiss="alert"></button>
                  <h4>Your Message has been sent successfully.We will get in touch soon</h4>
          </div>
						<form class="form-light mt-20" method="post" role="form">
							<div class="form-group">
								<label>Name:</label>
								<input type="text" name="name"  id="name"  title="Your name should contain minimum 2 and maximum 20 characters " class="form-control" placeholder="Your name" required>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Email:</label>
										<input type="email" name="email" class="form-control" placeholder="Email address" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Phone:</label>
										<input type="number" name="contactno" title="Phone No. must be digit and length 10" class="form-control" placeholder="Phone number" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Subject:</label>
								<input type="text" name="subject" title="Subject must be filled"class="form-control" placeholder="Subject" required>
							</div>
							<div class="form-group">
								<label>Message:</label>
								<textarea class="form-control"  title="Message filed can not be blank "name="msgtxtarea" id="message" placeholder="Write you message here..." style="height:100px;" required></textarea>
							</div>
							<button type="submit" name="sendmsg" class="btn btn-two">Send message</button><p><br/></p>
						</form>
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6">
								<h3 class="section-title">Office Address</h3>
								<div class="contact-info">
									<h5>Address</h5>
									<p>Mandarathore (P.O.), Vatakara-673105<br>Kozhikode (DT)<br>Kerala , India</p>
									
									<h5>Email</h5>
									<p>citvcape@gmail.com</p>
									
									<h5>Phone</h5>
									<p>+91-496 2536125</p>
								</div>
							</div> 
						</div> 						
					</div>
				</div>
			</div>
			
	<!-- include footer from main directory -->
<?php
include('main/footer.php')	;
include('main/bottomfile.php');
?>		
			
