<?php 
include('studenttools/topfile.php');
echo "<title>Student| Vacate Request</title>";
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
	
		if(isset($_POST['vacatereqbtn']))
		{
			$roomno=$_POST['roomno'];
			$vacatedate=Date("Y-m-d",strtotime($_POST['vacatedate']));
			
		 $sql=("INSERT INTO student_hstlvacate_request(requestno,request_date,student_id,hostel_id,roomno,vacatedate,status) 
			     VALUES (:requestno, :request_date, :student_id, :hostel_id, :roomno, :vacatedate, :status)");
		
		$query=$connect->prepare($sql);
			$query->execute(array 
			                    (
								  ':requestno'=>$requestno, 
								  ':request_date'=>$request_date, 
								  ':student_id'=>$studentid, 
								  ':hostel_id'=>$hostelid,
								  'roomno'=>$roomno,
								  ':vacatedate'=>$vacatedate,  
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
        Hostel Vacate Request
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
              <h3 class="box-title">Hostel Vacate Entry</h3>
            </div>
                <br>
				
 <div class="alert alert-success <?php if(!isset($reqsubmited)) echo 'hide';?>">
				<button class="close" data-dismiss="alert"></button>
                  <h5>Your Hostel Vacate Request is Submitted Successfully !! Request No. is <?php echo $requestno;?> keep this number for future communication.</h5>
 </div>
				
            <!-- form start -->
			<form method="post" class="form-horizontal">
			  <fieldset>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Room No: <span class="required"></span></label>
                  <div class="col-xs-5">
				      <input name="roomno" type="text"class="form-control span6 m-wrap" required  />
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Vacate Date: <span class="required"></span></label>
                  <div class="col-xs-5">
				      <input name="vacatedate" type="date"class="form-control span6 m-wrap" required  />
                  </div>
                </div>
              <div class="box-footer">
                <button type="submit" name="vacatereqbtn" class="btn btn-primary">Submit</button>
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
	