<?php 
include('studenttools/topfile.php');
echo "<title>Student| Complaints</title>";
?>

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('studenttools/header.php');
include('studenttools/dashboard.php');
echo "<div>";
?>

<?php 
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	$complaint_by=$stdlogedin_stdid;
	$complaints_no=Date("dmYhis");
	$complaint_date=Date("Y-m-d");
	$complaint_status='NEW';
	
		if(isset($_POST['complaints_btn']))
		{
			$complaints_concern=$_POST['complaints_concern'];
			$hostelid=$_POST['selecthostel'];
			$roomno=$_POST['roomno'];
			$description=$_POST['description'];
			
		 $sql=("INSERT INTO student_complaints(complaints_no,complaint_date,complaints_concern,hostel_id,roomno,description,complaint_by,complaint_status) 
			     VALUES (:complaints_no, :complaint_date, :complaints_concern, :hostel_id, :roomno, :description, :complaint_by, :complaint_status)");
		
		$query=$connect->prepare($sql);
			$query->execute(array 
			                    (
								  ':complaints_no'=>$complaints_no, 
								  ':complaint_date'=>$complaint_date, 
								  ':complaints_concern'=>$complaints_concern, 
								  ':hostel_id'=>$hostelid,
								  'roomno'=>$roomno,
								  ':description'=>$description,
                                  ':complaint_by'=>$complaint_by,								  
								  ':complaint_status'=>$complaint_status
								)
					        );
							$complaints_submited=1;
		}
}
  catch(PDOException $e){
   echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
$con=null;
			                  
?>




  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
	   <br>
    <section class="content-header">
      <h1>
        Complaints
      </h1>
  <br>
  <br>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
       <div class="col-md-1"></div>
         <div class="col-md-8">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Complaints Entry</h3>
            </div>
                <br>
            <!-- form start -->
 <div class="alert alert-success <?php if(!isset($complaints_submited)) echo 'hide';?>">
				<button class="close" data-dismiss="alert"></button>
                  <h5>Your Complaints is Submitted Successfully !! Complaints No. is <?php echo $complaints_no;?> keep this number for future communication.</h5>
 </div>
			<form method="post" class="form-horizontal">
			  <fieldset>
	   <!-- select start -->
	         	<div class="form-group">
                  <label name="state" class="col-sm-4 control-label">Complaints Concern: <span class="required">*</span></label>
                  <div class="col-xs-5">
                   <select class="form-control span6 m-wrap" name="complaints_concern" required>	
					<option value="">Select Complaints Concern...</option>											
					<option value="Electrical/Electricity Complaints">Electrical/Electricity Complaints</option>
					<option value="Water Supply Complaints">Water Supply Complaints</option>
					<option value="Mess and Food Complaints">Mess and Food Complaints</option>
					<option value="Housekeeping Complaints">Housekeeping Complaints</option>
					<option value="Carpentry Complaints">Carpentry Complaints</option>
					<option value="Telephone and WiFi Complaints">Telephone and WiFi Complaints</option>
					<option value="Security and Theft Complaints">Security and Theft Complaints</option>
					<option value="Others">Others</option>																												
					</select>
                  </div>
                </div>
	<!-- select end -->
	         	<div class="form-group">
                  <label name="hostelname" class="col-sm-4 control-label">Hostel: <span class="required">*</span></label>
                  <div class="col-xs-5">
				   <select class="form-control span6 m-wrap" name="selecthostel" required>
				  <option value="">Select Hostel...</option>	
						<?php 
						        	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
									$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$comboquery =$con->query("SELECT hostel_id,hostel_name FROM hostel_details");
									while($combodata=$comboquery->fetch()) 
									echo "<option value=".$combodata['hostel_id'].">".$combodata['hostel_name']."</option>";
						?>
                  </select>
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Room No: <span class="required">*</span></label>
                  <div class="col-xs-5">
				      <input name="roomno" type="text"class="form-control span6 m-wrap" placeholder="Room No" required  />
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Description: <span class="required">*</span></label>
                  <div class="col-xs-5">
					  <textarea class="form-control" rows="4" name="description" placeholder="Describe your Complaints within Maximum 250 Character" required ></textarea>
                  </div>
                </div>
				<br>
              <div class="box-footer">
                <button type="submit" name="complaints_btn" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary pull-right">Clear</button>
              </div>
			  </fieldset>
			  <br>
            </form>
			<!-- form End -->
          </div>
          <!-- /.box -->
        </div>
        </div>
    </section>
	<!-- Sectin .content End -->
	</div>
	<!-- /.content-wrapper  end here--> 

  <?php 
	include('studenttools/footer.php');
	include('studenttools/bottomfile.php');
	?>
	</div>
</body>
</html>
	