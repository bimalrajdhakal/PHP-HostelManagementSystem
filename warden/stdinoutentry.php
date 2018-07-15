<?php 
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['inoutentry']))
		{
				$studentid=$_POST['studentid'];
				$outdate=$_POST['outdate'];
				$out_date=Date("Y-m-d",strtotime($outdate));
				$outtime=$_POST['outtime'];
				$status='OUT';
			$sql=("INSERT INTO std_inout_entry(student_id,out_date,out_time,status)
			VALUES (:student_id, :out_date, :out_time, :status)");
			
			$query=$connect->prepare($sql);
			$query->execute(array (
			':student_id'=>$studentid,
			':out_date'=>$out_date,
			':out_time'=>$outtime,
			':status'=>$status));
			$datainserted=1;
		}
}
  catch(PDOException $e){
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;
?>
<?php 
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['updateinout']))
		{

				$studentid=$_POST['studentid'];
				$indate=$_POST['indate'];
				$in_date=Date("Y-m-d",strtotime($indate));
				$intime=$_POST['intime'];
				$status='IN';
			   
			   $updatestmt=("UPDATE std_inout_entry SET in_date =:in_date, in_time= :in_time, status =:status
													 WHERE student_id='$studentid'");
			$query=$connect->prepare($updatestmt);
			$query->execute(array (
								  ':in_date'=>$in_date,
								  ':in_time'=>$intime,
								  ':status'=>$status)
								  );
								  
					$dataupdated=1;
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
include('wardentools/topfile.php');
echo "<title>Warden| In/Out Entry</title>";
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
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Student In/Out Entry
      </h1>
 
    </section>
   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Out Entry</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<form method="post" class="form-horizontal">
				<div class="alert alert-info">
					<button class="close" data-dismiss="alert">&times;</button>
					<strong>*</strong> Fields are mandatory to fill.
				 </div>
	            <div class="alert alert-success alert-dismissible <?php if(!isset($datainserted)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Data Inserted Sucessfully with Student ID: <?php echo $studentid;?></h5>
				</div>
			<fieldset>
             <div class="box-body">
                <div class="form-group">
				  <label class="col-sm-3 control-label">Student ID:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input name="studentid" type="text" class="form-control span6 m-wrap" placeholder="Student ID" required/>
                  </div>
                </div>
			    <div class="form-group">
				  <label class="col-sm-3 control-label">Out Date:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input type="date" name="outdate" class="form-control span6 m-wrap" value="DD/MM/YYYY" required />
                  </div>
                </div>
			    <div class="form-group">
				  <label class="col-sm-3 control-label">Out Time:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input type="time" name="outtime" class="form-control span6 m-wrap" value="HH/MM/SS" required />
                  </div>
                </div>
                </div>
	   <!-- select start -->
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="inoutentry" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary pull-right">Clear</button>
              </div>
              <!-- /.box-footer -->
			  </fieldset>
            </form>
			<!-- form End -->
          </div>
          <!-- /.box -->
        </div>   
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">In Entry</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<form method="post" class="form-horizontal">
	            <div class="alert alert-success alert-dismissible <?php if(!isset($dataupdated)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Data Updated Sucessfully with Student ID: <?php echo $studentid;?></h5>
				</div>
			<fieldset>
             <div class="box-body">
			    <br>
				<br>
                <div class="form-group">
				  <label class="col-sm-3 control-label">Student ID:<span class="required">*</span></label>
				  <button type="submit" name="getdata" class="btn btn-primary">Go</button>
                  <div class="col-xs-5">
					<input name="txtstudentid" type="text" class="form-control span6 m-wrap"/>
                  </div>
                </div>
				<br>
	<?php 
		$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['getdata']))
		{
			if($_POST['txtstudentid']=="")
			 {
	            echo "<script>alert('Please Enter Student ID')</script>";
             }
			 else {
			            $showstudentid=$_POST['txtstudentid'];
						$sql=("SELECT student_id, out_date, out_time, status FROM std_inout_entry WHERE student_id='$showstudentid' AND status='OUT'");
					    $query =$con->query($sql);
					    $result=$query->fetch();
			 }
		}
	?>
	
	         <div class="<?php if(!isset($showstudentid)) echo 'hide';?>">
                <div class="form-group hide">
				  <label class="col-sm-3 control-label">Student ID:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input name="studentid" type="text" class="form-control span6 m-wrap" value="<?php echo $result['student_id'];?>" />
                  </div>
                </div>
			    <div class="form-group">
				  <label class="col-sm-3 control-label">Out Date:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input name="outtime" type="text" class="form-control span6 m-wrap" value="<?php echo Date("d-m-Y",strtotime($result['out_date'])); ?>"/>
                  </div>
                </div>
			    <div class="form-group">
				  <label class="col-sm-3 control-label">Out Time:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input name="outtime" type="text" class="form-control span6 m-wrap" value="<?php echo Date("h:i a",strtotime($result['out_time'])); ?>"/>
                  </div>
                </div>
			    <div class="form-group">
				  <label class="col-sm-3 control-label">Status:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input name="outtime" type="text" class="form-control span6 m-wrap" value="<?php echo $result['status']; ?>"/>
                  </div>
                </div>
			    <div class="form-group">
				  <label class="col-sm-3 control-label">In Date:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input name="indate" type="date" class="form-control span6 m-wrap" />
                  </div>
                </div>
			    <div class="form-group">
				  <label class="col-sm-3 control-label">In Time:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input type="time" name="intime" class="form-control span6 m-wrap" value="HH/MM/SS" />
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="col-xs-8 form-group pull-right">
                <button type="submit" name="updateinout" class="btn btn-primary">Update</button>
              </div>
              <!-- /.box-footer -->
			  </div>
			  </fieldset>
            </form>
          </div>
        </div> 		
        </div>
    </section>
	<!-- Sectin .content End -->
	</div>
	<!-- /.content-wrapper  end here--> 




 <?php 
include('wardentools/footer.php');
include('wardentools/bottomfile.php');
?>

</div>
</body>
</html>


 