<?php 
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['addfactor']))
		{
			   $hostelid=$_POST['selecthostel'];
			   $roomrent=$_POST['roomrent'];
			   $watercharge=$_POST['watercharge'];
			   $electricitycharge=$_POST['electrycitycharge'];
			   $maintinancecharge=$_POST['maintenancecharge'];
			   $misccharge=$_POST['misccharge'];

			 $sql=("SELECT * from bill_factor WHERE hostelid='$hostelid'");
			 $query =$con->query($sql);
			 if($query->rowCount()==0)
			 {
			   
			   $sql=("INSERT INTO bill_factor (hostelid,roomrent,watercharge,electricitycharge,maintinancecharge,misccharge)
			          VALUES(:hostelid, :roomrent, :watercharge, :electricitycharge, :maintinancecharge, :misccharge)");
				
			$query=$connect->prepare($sql);
			$query->execute(array (
			                      ':hostelid'=>$hostelid,
								  ':roomrent'=>$roomrent,
								  ':watercharge'=>$watercharge,
								  ':electricitycharge'=>$electricitycharge,
								  ':maintinancecharge'=>$maintinancecharge,
								  ':misccharge'=>$misccharge)
								  );
			echo "<script>alert('Data saved Successfully!!!!')</script>";
		   }
		   else
			  echo "<script>alert('Data already exists!! It seems you want to update data.')</script>";
			   
		}
}
  catch(PDOException $e)
  {
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;
?>

<div class="modal fade" id="new_billfactor_entry" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">New Bill Factor Entry</h4>
			</div>
            <!-- form start -->
			<form name="hostelcreate" method="post" class="form-horizontal">
			<fieldset>
             <div class="box-body">
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Hostel <span class="required">*</span></label>
                  <div class="col-xs-5">
				   <select class="form-control span6 m-wrap" name="selecthostel" required>
				  <option value="">Select Hostel.....</option>
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
				<!-- select end -->	
                <div class="form-group">
				  <label class="col-sm-4 control-label">Room Rent <span class="required">*</span></label>
                  <div class="col-xs-5">
					<input name="roomrent" type="number"class="form-control span6 m-wrap" required />
                  </div>
                </div>
				
                <div class="form-group">
				  <label class="col-sm-4 control-label">Water Charge <span class="required">*</span></label>

                  <div class="col-xs-5">
					<input name="watercharge" type="number"class="form-control span6 m-wrap"  required  />
                  </div>
                </div>
				<div class="form-group">
				  <label class="col-sm-4 control-label">Electrycity Charge <span class="required">*</span></label>

                  <div class="col-xs-5">
					<input name="electrycitycharge" type="number" class="form-control span6 m-wrap" required  />
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Maintenance Charge <span class="required">*</span></label>

                  <div class="col-xs-5">
					<input name="maintenancecharge" type="number"class="form-control span6 m-wrap" required  />
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Misc. Charge <span class="required">*</span></label>

                  <div class="col-xs-5">
					 <input name="misccharge" type="number" class="form-control span6 m-wrap" required  />
                  </div>
                </div>
            </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="addfactor" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary pull-right">Clear</button>
              </div>
              <!-- /.box-footer -->
			  </fieldset>
            </form>
			<!-- form End -->
		</div>
	</div>
</div>