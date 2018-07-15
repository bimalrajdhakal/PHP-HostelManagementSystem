<?php 
$id=$_GET['id'];
?>
<?php 
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['event_submit']))
		{
				$subject=$_POST['subject'];
				$eventdate=$_POST['eventdate'];
				$event_date=Date("Y-m-d",strtotime($eventdate));
				$event_time=$_POST['eventtime'];
				$description=$_POST['description'];
				
			$sql=("UPDATE news_entry_table SET subject=:subject,date=:date,time=:time,description=:description WHERE id='$id'" );
			
			$query=$connect->prepare($sql);
			$query->execute(array ( 
			':subject'=>$subject,
			':date'=>$event_date,
			':time'=>$event_time,
			':description'=>$description));
			$dataupdated=1;
			header("location:notification_news_home.php");
		}
}
  catch(PDOException $e){
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;
?>



<?php 
include('admintools/topfile.php');
echo "<title>Admin| News Manage</title>";
?>

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('admintools/header.php');
include('admintools/dashboard.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="box-body">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">News Edit/Update</h4>
			</div>
				<?php
				    $con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql=("SELECT* FROM news_entry_table WHERE id='$id'");
					$query =$con->query($sql);
					$res=$query->fetch();		 				
				?>
			<div class="modal-body">
				<form class="form-horizontal" method="post" id="form-new-laun">
				  <div class="form-group">
				    <label class="control-label col-sm-3" >Subject:</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" name="subject" value="<?php echo $res['subject'];?>">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3">Date:</label>
				    <div class="col-sm-9">
				      <input type="date" class="form-control" name="eventdate" value="<?php echo $res['date'];?>">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" >Time:</label>
				    <div class="col-sm-9">
				      <input type="time" class="form-control" name="eventtime" value="<?php echo $res['time'];?>" required>
				    </div>
				  </div>
	         	<div class="form-group">
				  <label class="control-label col-sm-3">Description:</label>
                  <div class="col-sm-9">
					  <textarea class="form-control" name="description" rows="5" cols="57"><?php echo $res['description'];?>"</textarea>
                  </div>
                </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-3 col-sm-9">
				      <button type="submit" name="event_submit" class="btn btn-primary">Save</button>
					  <button type="reset" class="btn btn-primary pull-right">Clear</button>
				    </div>
				  </div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
	
	

	</div>
	<?php 
	include('admintools/footer.php');
	include('admintools/bottomfile.php');
	?>
	</div>
</body>
</html>
	