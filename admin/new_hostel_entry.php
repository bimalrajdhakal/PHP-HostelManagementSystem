<?php 
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['hstlcreate']))
		{
			$hostelname=$_POST['hostelname'];
		    $addressline1=$_POST['addressline1'];
			$addressline2=$_POST['addressline2'];
			$district=$_POST['district'];
			$state=$_POST['state'];
			$pincode=$_POST['pincode'];
			$contactno=$_POST['contactno'];
			$noofroom=$_POST['noofroom'];
			$hosteltype=$_POST['hosteltype'];
			
			$sql=("INSERT INTO hostel_details(hostel_name,addressline1,addressline2,district,state,pincode,contactno,noofroom,hosteltype)
			VALUES (:hostelname,:addressline1,:addressline2,:district,:state,:pincode,:contactno,:noofroom,:hosteltype)");
			
			$query=$connect->prepare($sql);
			$query->execute(array (
			':hostelname'=>$hostelname,
			':addressline1'=>$addressline1,
			':addressline2'=>$addressline2,
			':district'=>$district,
			':state'=>$state,
			':pincode'=>$pincode,
			':contactno'=>$contactno,
			':noofroom'=>$noofroom,
			':hosteltype'=>$hosteltype));
		echo "<script>alert('Hostel Created Successfully !!!!')</script>";
		}
}
  catch(PDOException $e){
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;
?>



<div class="modal fade" id="new_hostel_entry" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">New Hostel Entry</h4>
			</div>
            <!-- form start -->
			<form name="hostelcreate" method="post" class="form-horizontal">
			<fieldset>
             <div class="box-body">
                <div class="form-group">
				  <label class="col-sm-3 control-label">Hostel Name <span class="required">*</span></label>
                  <div class="col-xs-5">
						<input name="hostelname" type="text" pattern="{5}" title="Hostel Name must be atleast 5 character" id="hostelname"class="form-control span6 m-wrap" placeholder="Hostel Name" required/>
                  </div>
                </div>
                <div class="form-group">
				  <label class="col-sm-3 control-label">Address <span class="required">*</span></label>

                  <div class="col-xs-5">
					<input name="addressline1" pattern="{5}" title="Address Line must have atleast 5 character" type="text" id="addressline1"class="form-control span6 m-wrap" placeholder="Address Line 1" required/>
                  </div>
                </div>
				<div class="form-group">
				  <label class="col-sm-3 control-label"><span class="required"></span></label>

                  <div class="col-xs-5">
					<input name="addressline2" type="text" id="addressline2"class="form-control span6 m-wrap" placeholder="Address Line 2" required/>
                  </div>
                </div>
				<div class="form-group">
				  <label class="col-sm-3 control-label">District <span class="required">*</span></label>

                  <div class="col-xs-5">
					<input name="district" type="text" id="district"class="form-control span6 m-wrap" placeholder="District" required/>
                  </div>
                </div>
	   <!-- select start -->
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">State <span class="required">*</span></label>
                  <div class="col-xs-5">
				   <select class="form-control span6 m-wrap" name="state" required>	
					<option value="">Select...</option>											
					<option value="Andhra Pradesh">Andhra Pradesh</option>
					<option value="Arunachal Pradesh">Arunachal Pradesh</option>
					<option value="Bihar">Bihar</option>
					<option value="Chhattisgarh">Chhattisgarh</option>
					<option value="Goa">Goa</option>
					<option value="Gujarat">Gujarat</option>
					<option value="Haryana">Haryana</option>
					<option value="Himachal Pradesh">Himachal Pradesh</option>
					<option value="Jammu & Kashmir">Jammu & Kashmir</option>
					<option value="Jharkhand">Jharkhand</option>
					<option value="Karnataka">Karnataka</option>
					<option value="Kerala">Kerala</option>
					<option value="Madhya Pradesh">Madhya Pradesh</option>
					<option value="Maharashtra">Maharashtra</option>
					<option value="Manipur">Manipur</option>
					<option value="Meghalaya">Meghalaya</option>
					<option value="Mizoram">Mizoram</option>
					<option value="Nagaland">Nagaland</option>
					<option value="Odisha (Orissa)">Odisha (Orissa)</option>
					<option value="Punjab">Punjab</option>
					<option value="Rajasthan">Rajasthan</option>
					<option value="Sikkim">Sikkim</option>
					<option value="Tamil Nadu">Tamil Nadu</option>
					<option value="Telangana">Telangana</option>
					<option value="Tripura">Tripura</option>
					 <option value="Uttar Pradesh">Uttar Pradesh</option>
					 <option value="Uttarakhand">Uttarakhand</option>
					<option value="West Bengal">West Bengal</option>
					 <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
					 <option value="Chandigarh">Chandigarh</option>
					 <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
					 <option value="Daman and Diu">Daman and Diu</option>
					 <option value="Lakshadweep">Lakshadweep</option>
					 <option value="Delhi-NCR">Delhi-NCR</option>
					 <option value="Puducherry(Pondicherry)">Puducherry(Pondicherry)</option>																												
					</select>
                  </div>
                </div>
	<!-- select end -->
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">PIN Code <span class="required">*</span></label>

                  <div class="col-xs-5">
					<input name="pincode" type="number" pattern="[0-9]{6}" title="At least 6 digits" id="pincode"class="form-control span6 m-wrap" placeholder="PIN Code" required/>
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">Contact No. <span class="required">*</span></label>

                  <div class="col-xs-5">
					 <input name="contactno" type="number" pattern="[0-9]{10]" title="At least 10 digits" id="contactno"class="form-control span6 m-wrap" placeholder="Contact No." required/>
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">No.of Room <span class="required">*</span></label>

                  <div class="col-xs-5">
					<input name="noofroom" type="number" pattern="[0-9]{3}" title="Room No. must be atleast 3 digits" id="roomno"class="form-control span6 m-wrap" placeholder="No. of Room" required/>
                  </div>
                </div>
	   <!-- select start -->
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">Hostel Type <span class="required">*</span></label>
                  <div class="col-xs-5">
				   <select class="form-control span6 m-wrap" name="hosteltype" required>	
				   <option value="">Select</option>
                    <option value="Boy's">Boy's</option>
                    <option value="Girl's">Girl's</option>
                    <option value="Guest House">Guest House</option>
                  </select>
                  </div>
                </div>
	<!-- select end -->
            </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="hstlcreate" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary pull-right">Clear</button>
              </div>
              <!-- /.box-footer -->
			  </fieldset>
            </form>
			<!-- form End -->
		</div>
	</div>
</div>