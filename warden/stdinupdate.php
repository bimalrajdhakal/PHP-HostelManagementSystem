<?php 
if(isset($_GET['id']))
	$id=$_GET['id'];
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
													 WHERE id='$id' AND student_id='$studentid'");
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
		<div class="col-md-1"></div>
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
                <li><a href="stdinoutentry.php"><i class="fa fa-edit"></i> Student In/Out
                  <span class="label label-primary pull-right"></span></a></li>
                <li><a href="showoutstd.php"><i class="fa fa-sticky-note"></i>Show Out Student</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
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
	<?php 
		$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql=("SELECT student_id, out_date, out_time, status FROM std_inout_entry WHERE id='$id' AND status='OUT'");
					    $query =$con->query($sql);
					    $result=$query->fetch();
	?>
                <div class="form-group">
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
					<input name="indate" type="date" class="form-control span6 m-wrap" required />
                  </div>
                </div>
			    <div class="form-group">
				  <label class="col-sm-3 control-label">In Time:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input type="time" name="intime" class="form-control span6 m-wrap" value="HH/MM/SS" required/>
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="updateinout" class="btn btn-primary">Update</button>
				<button type="reset" class="btn btn-primary pull-right">Clear</button>
              </div>
              <!-- /.box-footer -->
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