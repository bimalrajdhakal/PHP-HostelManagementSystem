
<?php 
if(isset($_GET['tokenno']))
	$tokenno=$_GET['tokenno'];
?>
<?php 
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['updateinout']))
		{

				$tokenno=$_POST['tokenno'];
				$outdate=$_POST['outdate'];
				$out_date=Date("Y-m-d",strtotime($outdate));
				$outtime=$_POST['outtime'];
				$status='OUT';
			   
			   $updatestmt=("UPDATE vstr_inout_entry SET out_date =:out_date, out_time= :out_time, status =:status
													 WHERE token_no='$tokenno'");
			$query=$connect->prepare($updatestmt);
			$query->execute(array (
								  ':out_date'=>$out_date,
								  ':out_time'=>$outtime,
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
       Visitor In/Out Entry
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
                <li><a href="vst_inoutentry.php"><i class="fa fa-edit"></i> Visitor In/Out
                  <span class="label label-primary pull-right"></span></a></li>
                <li><a href="showin_vst.php"><i class="fa fa-sticky-note"></i>Show In Visitor</a></li>
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
              <h3 class="box-title">Out Entry</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<form method="post" class="form-horizontal">
	            <div class="alert alert-success alert-dismissible <?php if(!isset($dataupdated)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Data Updated Sucessfully with Token No: <?php echo $tokenno;?></h5>
				</div>
			<fieldset>
             <div class="box-body">
			    <br>
	<?php 
		$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			            
						$sql=("SELECT token_no,full_name,student_id, in_date, in_time, status FROM vstr_inout_entry WHERE token_no='$tokenno' AND status='IN'");
					    $query =$con->query($sql);
					    $result=$query->fetch();
	?>
	
	         <div class="<?php if(!isset($tokenno)) echo 'hide';?>">
                <div class="form-group">
				  <label class="col-sm-3 control-label">Token No:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input name="tokenno" type="text" class="form-control span6 m-wrap" value="<?php echo $result['token_no'];?>" />
                  </div>
                </div>
                <div class="form-group">
				  <label class="col-sm-3 control-label">Name:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input name="fullname" type="text" class="form-control span6 m-wrap" value="<?php echo $result['full_name'];?>" />
                  </div>
                </div>
                <div class="form-group">
				  <label class="col-sm-3 control-label">Student ID:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input name="studentid" type="text" class="form-control span6 m-wrap" value="<?php echo $result['student_id'];?>" />
                  </div>
                </div>
			    <div class="form-group">
				  <label class="col-sm-3 control-label">In Date:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input name="indate" type="text" class="form-control span6 m-wrap" value="<?php echo Date("d-m-Y",strtotime($result['in_date'])); ?>"/>
                  </div>
                </div>
			    <div class="form-group">
				  <label class="col-sm-3 control-label">In Time:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input name="intime" type="text" class="form-control span6 m-wrap" value="<?php echo Date("h:i a",strtotime($result['in_time'])); ?>"/>
                  </div>
                </div>
			    <div class="form-group">
				  <label class="col-sm-3 control-label">Status:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input name="status" type="text" class="form-control span6 m-wrap" value="<?php echo $result['status']; ?>"/>
                  </div>
                </div>
			    <div class="form-group">
				  <label class="col-sm-3 control-label">Out Date:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input name="outdate" type="date" class="form-control span6 m-wrap" required />
                  </div>
                </div>
			    <div class="form-group">
				  <label class="col-sm-3 control-label">Out Time:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input type="time" name="outtime" class="form-control span6 m-wrap" value="HH/MM/SS" required />
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="updateinout" class="btn btn-primary">Update</button>
				<button type="reset" class="btn btn-primary pull-right">Clear</button>
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
