<?php 
include('studenttools/topfile.php');
echo "<title>Student| Room Change Request</title>";
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
	
	
	$studentid=$stdlogedin_stdid;
	$hostelid=$stdlogedin_hostel_id;
	$requestno=Date("dmYhis");
	$request_date=Date("Y-m-d");
	$reqstatus='NEW';
	
		if(isset($_POST['roomchngreqbtn']))
		{
			$currentroomno=$_POST['currentroomno'];
			$willingroomno=$_POST['willingroomno'];
			$reason=$_POST['reason'];
			
		 $sql=("INSERT INTO student_room_change_request(requestno,request_date,student_id,hostel_id,currentroomno,willingroomno, reason,status) 
			     VALUES (:requestno, :request_date, :student_id, :hostel_id, :currentroomno, :willingroomno, :reason, :status)");
		
		$query=$connect->prepare($sql);
			$query->execute(array 
			                    (
								  ':requestno'=>$requestno, 
								  ':request_date'=>$request_date, 
								  ':student_id'=>$studentid, 
								  ':hostel_id'=>$hostelid, 
								  ':currentroomno'=>$currentroomno, 
								  ':willingroomno'=>$willingroomno, 
								  ':reason'=>$reason, 
								  ':status'=>$reqstatus
								)
					        );
							$reqsubmited=1;
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
        Room Change Request
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
              <h3 class="box-title">Room Change Request Entry</h3>
            </div>
                <br>
 <div class="alert alert-success <?php if(!isset($reqsubmited)) echo 'hide';?>">
				<button class="close" data-dismiss="alert"></button>
                  <h5>Your Room Change Request is Submitted Successfully !! Request No. is <?php echo $requestno;?> keep this number for future communication.</h5>
 </div>
            <!-- form start -->
			<form method="post" class="form-horizontal">
			  <fieldset>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Current Room No: <span class="required"></span></label>
                  <div class="col-xs-5">
				      <input name="currentroomno" type="text"class="form-control span6 m-wrap" required  />
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Willing Room No: <span class="required"></span></label>
                  <div class="col-xs-5">
				      <input name="willingroomno" type="text"class="form-control span6 m-wrap" required  />
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Reason: <span class="required"></span></label>
                  <div class="col-xs-5">
					  <textarea class="form-control" name="reason" rows="4" placeholder="Max Character 250" required ></textarea>
                  </div>
                </div>
              <div class="box-footer">
                <button type="submit" name="roomchngreqbtn" class="btn btn-primary">Submit</button>
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
	