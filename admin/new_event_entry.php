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
				
			$sql=("INSERT INTO event_entry_table(subject,event_date,event_time,description)
			VALUES (:subject, :event_date, :event_time, :description)");
			
			$query=$connect->prepare($sql);
			$query->execute(array (
			':subject'=>$subject,
			':event_date'=>$event_date,
			':event_time'=>$event_time,
			':description'=>$description));
		echo "<script>alert('Event Created Successfully!!!!')</script>";
		}
}
  catch(PDOException $e){
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;
?>
<div class="modal fade" id="new_event_entry" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Event Entry</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="post" id="form-new-laun">
				  <div class="form-group">
				    <label class="control-label col-sm-3" >Subject:</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" name="subject" placeholder="Enter Event Subject" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3">Date:</label>
				    <div class="col-sm-9">
				      <input type="date" class="form-control" name="eventdate"required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" >Time:</label>
				    <div class="col-sm-9">
				      <input type="time" class="form-control" name="eventtime" required>
				    </div>
				  </div>
	         	<div class="form-group">
				  <label class="control-label col-sm-3">Description:</label>
                  <div class="col-sm-9">
					  <textarea class="form-control" name="description" rows="5" cols="57" placeholder="Event Description here !!!!" required ></textarea>
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