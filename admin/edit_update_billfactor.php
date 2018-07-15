<?php 

$hostelid=$_GET['id'];
?>
<?php 
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		if(isset($_POST['updatefactor']))
		{
			   $roomrent=$_POST['roomrent'];
			   $watercharge=$_POST['watercharge'];
			   $electricitycharge=$_POST['electrycitycharge'];
			   $maintinancecharge=$_POST['maintenancecharge'];
			   $misccharge=$_POST['misccharge'];
			   
			   $updatestmt=("UPDATE bill_factor SET roomrent =:roomrent, watercharge =:watercharge,
			                                         electricitycharge =:electricitycharge, maintinancecharge =:maintinancecharge,
													 misccharge =:misccharge WHERE hostelid='$hostelid'");
			$query=$connect->prepare($updatestmt);
			$query->execute(array (
								  ':roomrent'=>$roomrent,
								  ':watercharge'=>$watercharge,
								  ':electricitycharge'=>$electricitycharge,
								  ':maintinancecharge'=>$maintinancecharge,
								  ':misccharge'=>$misccharge)
								  );
						header("Location:managebillfactor.php");
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
echo "<title>Admin| Manage Bill Factor</title>";
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
        Manage Bill Factor
      </h1>
 
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
       <div class="col-md-1"></div>
         <div class="col-md-9">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Bill Factor Update</h3>
            </div>
                <br>
             <!-- /.box-header -->
            <!-- form start -->
			<form method="post" class="form-horizontal">
			<fieldset>
			<!-- select start -->
	            <div class="alert alert-success alert-dismissible <?php if(!isset($updatedfactor)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Bill Factor Data Updated for HOSTEL :<?php echo $hostelid;?></h5>
				</div>
	<?php 
		$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					    $sql=("SELECT* FROM bill_factor WHERE hostelid='$hostelid'");
					    $query =$con->query($sql);
					    $res=$query->fetch();
			
		
	?>
             <div class="box-body">
                <div class="form-group">
				  <label class="col-sm-4 control-label">Room Rent <span class="required"></span></label>

                  <div class="col-xs-5">
                    
					<input name="roomrent" type="number"class="form-control span6 m-wrap" value="<?php echo $res['roomrent'];?>" />
                  </div>
                </div>
				
                <div class="form-group">
				  <label class="col-sm-4 control-label">Water Charge <span class="required"></span></label>

                  <div class="col-xs-5">
					<input name="watercharge" type="number"class="form-control span6 m-wrap"  value="<?php echo $res['watercharge'];?>"  />
                  </div>
                </div>
				<div class="form-group">
				  <label class="col-sm-4 control-label">Electrycity Charge <span class="required"></span></label>

                  <div class="col-xs-5">
					<input name="electrycitycharge" type="number" class="form-control span6 m-wrap" value="<?php echo $res['electricitycharge'];?>"  />
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Maintenance Charge <span class="required"></span></label>

                  <div class="col-xs-5">
					<input name="maintenancecharge" type="number"class="form-control span6 m-wrap" value="<?php echo $res['maintinancecharge'];?>"  />
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Misc. Charge <span class="required"></span></label>

                  <div class="col-xs-5">
					 <input name="misccharge" type="number" class="form-control span6 m-wrap" value="<?php echo $res['misccharge'];?>"  />
                  </div>
                </div>
            </div>
              <!-- /.box-body -->
              <div class="box-footer">
				<button type="submit" name="updatefactor" class="btn btn-primary">Update</button>
                   <a href=managebillfactor.php><button type="button" name="addservice" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Back</button></a>
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

  <?php 
	include('admintools/footer.php');
	include('admintools/bottomfile.php');
	?>
	</div>
</body>
</html>
	