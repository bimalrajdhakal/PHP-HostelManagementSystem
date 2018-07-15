<?php 
if(isset($_GET['requestno']))
{
	$reqno=$_GET['requestno'];
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$query =$con->query("SELECT student_id,fname,lname,emailid,mobno FROM student 
	                     WHERE student_id=(SELECT stdudent_id FROM stdrequest WHERE requestno='$reqno')");
	$res=$query->fetch();
	
	$studentid=$res['student_id'];
	$firstname=$res['fname'];
	$lastname=$res['lname'];
	$emailid=$res['emailid'];
	$mobileno=$res['mobno'];
	$userflag='STDU';
  if(isset($_POST['allotroombtn']))
  {
	  if($_POST['allotroomno']=="")
	  {
		  echo "<script>alert('Please Enter Room No.')</script>";
	  }
	  else
	  {
		  $hostelid=$_POST['hostelid'];
		  $roomno=$_POST['allotroomno'];
		  $reqstatus='Accepted';
		  $roomstatus='Alloted';
		  $fromdate=Date("Y-m-d");
		  /* data inserted to room_allotment table and room is assigned to student */
		  
		  $insertstmt=("INSERT INTO room_allotment (hostel_id,allocatee_id,room_no,from_date,status) 
		                VALUES (:hostel_id, :allocatee_id, :room_no, :from_date, :status)");
		   $queryinsert=$con->prepare($insertstmt);
		   $queryinsert->execute(array (
		                                ':hostel_id'=>$hostelid,
										':allocatee_id'=>$studentid,
										':room_no'=>$roomno,
										':from_date'=>$fromdate,
										':status'=>$roomstatus)
								);
								
			
										
		   /* request status updated in stdrquest table */            
		  $updatestmt=("UPDATE stdrequest SET req_status =:reqstatus WHERE requestno='$reqno'");
		  $queryupdate =$con->prepare($updatestmt);
		  $queryupdate->execute(array(
									':reqstatus'=>$reqstatus)
								);
			
			/* data inserted to userdetails table to create user a/c for the student */
			
			$insertsqlstmt=("INSERT INTO userdetails (username, password, user_flag, student_staff_id)
			                  VALUES (:username, :password, :user_flag, :student_staff_id)");
			$queryinsertsql=$con->prepare($insertsqlstmt);
	        $queryinsertsql->execute(array(
                                           ':username'=>$emailid,
										   ':password'=>$mobileno,
										   ':user_flag'=>$userflag,
										   ':student_staff_id'=>$studentid)
									);
									
				/* sending user details via email       start */
			

date_default_timezone_set('Etc/UTC');

require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "hms.minis4@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "hmsmini@s4";

//Set who the message is to be sent from
$mail->setFrom('hms.minis4@gmail.com', 'Admin HMS CEV');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress($emailid, $firstname." ". $lastname);

//Set the subject line
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
               <td>".$emailid."</td>
               <td>".$mobileno."</td>
             </tr>
		   </tbody>
		 </table>";

//$mail->msgHTML($body);

//Replace the plain text body with one created manually
$mail->Body=$body;
$mail->AltBody='This is a plain-text message body';
//$mail->AltBody = '****************************************************';
//$mail->AltBody = 'User Name/Login Id: $emailid';
//$mail->AltBody = 'Password: $mobileno';
//$mail->AltBody = '****************************************************';


//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} 

				
/* sending mail code ends here */
									
                $roomalloted=1;
				header("location:stdallothostel.php");
			
	  }
  }
  
  if(isset($_POST['rjectbtn']))
  {
	  if($_POST['selectreason']=='Select Reason...')
	  {
		  echo "<script>alert('Please Select Any Reason')</script>";
	  }
	  else
	  {
		  $reason=$_POST['selectreason'];
		  $reqstatus='Rejected';
		  $updatestmt=("UPDATE stdrequest SET rejection =:reason ,req_status =:reqstatus WHERE requestno='$reqno'");
		  $queryupdate =$con->prepare($updatestmt);
		  $queryupdate->execute(array(
		                            ':reason'=>$reason,
									':reqstatus'=>$reqstatus,)
								);
			$reqrejected=1;
			header("location:stdallothostel.php");
	  }
  }
}

?>

<?php 
include('wardentools/topfile.php');
echo "<title>Warden| Student Request</title>";
?>

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('wardentools/header.php');
include('wardentools/dashboard.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
	  <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Category</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="stdallothostel.php"><i class="fa fa-envelope-o"></i> Forwarded Request
                  <span class="label label-primary pull-right"></span></a></li>
                <li><a href="std_acceptedrequest.php"><i class="fa fa-envelope-square"></i> Accepted Request</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Request Details</h3>
            </div>
         <div class="box-body no-padding">
			<div class="form-horizontal">
             <div class="box-body">
<?php 
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query =$con->query("SELECT admnregno,admnregdate,branch,semester,fname,lname,dob,gender,emailid,mobno FROM student WHERE student_id=(SELECT stdudent_id FROM stdrequest WHERE requestno='$reqno')");
	$res=$query->fetch();
?>
	            <div class="alert alert-success alert-dismissible <?php if(!isset($roomalloted)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Hostel Room Alloted Sucessfully to Request No-<?php echo $reqno;?> with Hostel ID:<?php echo $hostelid;?></h5>
				</div>
	            <div class="alert alert-success alert-dismissible <?php if(!isset($reqrejected)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Request Rejected Sucessfully to Request No-<?php echo $reqno;?></h5>
				</div>
			 <legend><h5>Addmission Details</h5></legend>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Admn/Reg No:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo $res['admnregno'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Admn/Reg Date:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo Date("d-m-Y",strtotime($res['admnregdate']));?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Branch:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo $res['branch'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Semester:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo $res['semester']; ?>">
                  </div>
                </div>
				<legend><h5>Personal Details</h5></legend>
                <div class="form-group">
                  <label name="name" class="col-sm-3 control-label">Name:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="firstname" value="<?php echo $res['fname']." ".$res['lname'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Date of Birth:</span></label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo Date("d-m-Y",strtotime($res['dob']));?>">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label">Gender:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline2" value="<?php echo $res['gender'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="mobileno" class="col-sm-3 control-label">Contact No.:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="mobileno" value="<?php echo $res['mobno'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Email ID:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="useremail" value="<?php echo $res['emailid'];?>">
                  </div>
                </div>
			  </div>
				<legend><h5></h5></legend>
		 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Hostel Room Allotment </h3>
            </div>
				<?php
					$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$query =$con->query("SELECT req_status,hostelid FROM stdrequest WHERE requestno='$reqno'");
					$res=$query->fetch();
					$query=$con->query("SELECT hostel_name FROM hostel_details WHERE hostel_id=(SELECT hostelid FROM stdrequest WHERE requestno='$reqno')");
				     $result=$query->fetch();
				?>
				<br>
            <form method="post" class="form-horizontal">
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Alloted Hostel:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="hostelname" value="<?php echo $result['hostel_name'];?>">
                  </div>
                </div>
	         	<div class="form-group hide">
                  <label name="email" class="col-sm-3 control-label">Hostel ID:</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control" name="hostelid" value="<?php echo $res['hostelid'];?>">
                  </div>
                </div>
	         	<div class="form-group">
                  <label name="email" class="col-sm-3 control-label">Allot Room No.:</label>

                  <div class="col-xs-5">
                    <input type="number" class="form-control" name="allotroomno">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-3 control-label">Rejection Reason<span class="required">*</span></label>
                  <div class="col-sm-8">
					    <select class="form-control" placeholder="Select Reason..." name="selectreason">
						 <option value="Select Reason...">Select Reason...</option>
                          <option value="Not elegible as hostel norms">Not elegible as hostel norms</option>
						  <option value="Room Not Available">Room Not Available</option>
						</select>
                   </div>
		        </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
				<a href=stdallothostel.php><button type="button" name="backbtn" class="btn btn-default"><i class="fa fa-reply"></i> Back</button></a>
              </div>
              <button type="submit" name="rjectbtn" class="btn btn-default"><i class="fa fa-trash-o"></i> Reject</button>
			  <button type="submit" name="allotroombtn" class="btn btn-default"><i class="fa fa-share"></i> Allot Room</button>
            </div>
			</form>
			<!-- form End -->
            </div>
	 	  </div>
	     </div>
		</div>
	  </div>
    </section>

    <!-- /.content -->
  </div>
      <?php 
	include('wardentools/footer.php');
	include('wardentools/bottomfile.php');
	?>
 </div>
 </body>
</html>