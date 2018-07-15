<?php 
global $hostelid;
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
		
			$hstlinsert=1;
			$hstlid=$connect->lastInsertId();
		}
}
  catch(PDOException $e){
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;
?>
<?php 
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 if(isset($_POST['updatedelbtn']))
 {
   if($_POST['selecthostel']=='Select Hostel....'||(!isset($_POST['actionradio'])))
   {
	   echo "<script>alert('Please Select Item and Update/Delete Action')</script>";
   }
   else
   {
	$hostelid=$_POST['selecthostel'];
     $action=$_POST['actionradio'];
	  if($action=='update')
	  {
		  $updateaction=1;
	  }
	  if($action=='delete')
	  {
		  $sql =("DELETE FROM hostel_details WHERE hostel_id='$hostelid'");
		  $query =$connect->query($sql);
		  $query->execute();
		  $hstldel=1;
	  }  
   }	  
 }
 ?>
 <?php
 
 if(isset($_POST['hstlupdate']))
 {
	        $hostelid=$_POST['hostelid'];
	 	    $txthostelname=$_POST['hostelname'];
		    $txtaddressline1=$_POST['addressline1'];
			$txtaddressline2=$_POST['addressline2'];
			$txtdistrict=$_POST['district'];
			$txtstate=$_POST['state'];
			$txtpincode=$_POST['pincode'];
			$txtcontactno=$_POST['contactno'];
			$txtnoofroom=$_POST['noofroom'];
			$txthosteltype=$_POST['hosteltype'];
			
			$updatestmt=("UPDATE hostel_details SET hostel_name =:hostelname, addressline1 =:addressline1,
						  addressline2 =:addressline2, district =:district, state =:state, pincode =:pincode,
						  contactno =:contactno, noofroom =:noofroom, hosteltype =:hosteltype WHERE hostel_id='$hostelid'"); 
			$queryupdate =$connect->prepare($updatestmt);
			
			$queryupdate->execute(array(
			                        ':hostelname'=>$txthostelname,
									':addressline1'=>$txtaddressline1,
									':addressline2'=>$txtaddressline2,
									':district'=>$txtdistrict,
									':state'=>$txtstate,
									':pincode'=>$txtpincode,
									':contactno'=>$txtcontactno,
									':noofroom'=>$txtnoofroom,
									':hosteltype'=>$txthosteltype,)
									); 
		  
		  $updatesucess=1;
 } 
?>
<?php 
include('admintools/topfile.php');
echo "<title>Admin| Hostel Create</title>";
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
include('admintools/header.php');
include('admintools/dashboard.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hostel Management
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
              <h3 class="box-title">Create Hostel</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<form name="hostelcreate" method="post" class="form-horizontal">
			<fieldset>
				<div class="alert alert-info">
					<button class="close" data-dismiss="alert">&times;</button>
					<strong>*</strong> Fields are mandatory to fill.
				 </div>
	            <div class="alert alert-success alert-dismissible <?php if(!isset($hstlinsert)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Hostel Created Sucessfully with Hostel ID:<?php echo $hstlid;?></h5>
				</div>
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
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
		
		
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update/Delete Hostel</h3>
            </div>
			
				<div class="alert alert-success <?php if(!isset($updatesucess)) echo 'hide';?>">
				   <button class="close" data-dismiss="alert"></button>
					 Hostel Details updated successfully  !
				</div>
				
				<div class="alert alert-success <?php if(!isset($hstldel)) echo 'hide';?>">
				   <button class="close" data-dismiss="alert"></button>
					 Hostel Details Delete successfully !with Hostel ID:<?php echo $hostelid;?>
				</div>
			
            <!-- /.box-header -->
            <!-- form start -->
		  <div class="box-body">
            <form method="post" name="updatedelfrm" class="form-horizontal">
				<div class="form-group">
                  <label name="search" class="col-sm-2 control-label">Search <span class="required">*</span></label>
                  <div class="col-sm-10">
				    <select class="form-control" placeholder="Select Hostel...." name="selecthostel" required/>
					<option value="">Select Hostel....</option>
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
			  <!-- radio strat here-->
                <div class="form-group">
				<label  class="col-sm-2 control-label">Action <span class="required">*</span></label>
                  <div class="radio col-sm-2">
                    <label class="control-label">
                      <input type="radio" name="actionradio" id="optionsRadios1" value="update" required="required">
                      Update
                    </label>
                  </div>
                  <div class="radio col-sm-2">
                    <label class="control-label">
                      <input type="radio" name="actionradio" id="optionsRadios2" value="delete" required="required">
                      Delete
                    </label>
                  </div>
                </div>
				<!-- radio end here-->
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="updatedelbtn" class="btn btn-primary">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
   <!-- form start -->
			<form name="hostelupdate" method="post" class="form-horizontal <?php if(!isset($updateaction)) echo 'hide';?>">
			<fieldset>
	            <div class="alert alert-success alert-dismissible <?php if(!isset($updatesucess)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Hostel data updated Sucessfully with Hostel ID:<?php echo $hostelid;?></h5>
				</div>
				<?php
				    $con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql=("SELECT* FROM hostel_details WHERE hostel_id='$hostelid'");
					$query =$con->query($sql);
					$res=$query->fetch();		 				
				?>
             <div class="box-body">
                <div class="form-group hide">
				  <label class="col-sm-3 control-label">Hostel id <span class="required">*</span></label>
                  <div class="col-xs-5">
						<input name="hostelid" type="text" class="form-control span6 m-wrap" value="<?php echo $res['hostel_id'];?>">
                  </div>
                </div>
                <div class="form-group">
				  <label class="col-sm-3 control-label">Hostel Name <span class="required">*</span></label>
                  <div class="col-xs-5">
						<input name="hostelname" type="text" class="form-control span6 m-wrap" value="<?php echo $res['hostel_name'];?>">
                  </div>
                </div>
                <div class="form-group">
				  <label class="col-sm-3 control-label">Address <span class="required">*</span></label>

                  <div class="col-xs-5">
					<input name="addressline1" type="text"class="form-control span6 m-wrap" value="<?php echo $res['addressline1'];?>">
                  </div>
                </div>
				<div class="form-group">
				  <label class="col-sm-3 control-label"><span class="required"></span></label>

                  <div class="col-xs-5">
					<input name="addressline2" type="text" class="form-control span6 m-wrap"value="<?php echo $res['addressline2'];?>">
                  </div>
                </div>
				<div class="form-group">
				  <label class="col-sm-3 control-label">District <span class="required">*</span></label>

                  <div class="col-xs-5">
					<input name="district" type="text" class="form-control span6 m-wrap" value="<?php echo $res['district'];?>">
                  </div>
                </div>
	   <!-- select start -->
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">State <span class="required">*</span></label>
                  <div class="col-xs-5">
				   <select class="form-control span6 m-wrap" name="state">	
					<option value="<?php echo $res['state'];?>"><?php echo $res['state'];?></option>											
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
					<input name="pincode" type="number" class="form-control span6 m-wrap" value="<?php echo $res['pincode'];?>">
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">Contact No. <span class="required">*</span></label>

                  <div class="col-xs-5">
					 <input name="contactno" type="number" class="form-control span6 m-wrap" value="<?php echo $res['contactno'];?>">
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">No.of Room <span class="required">*</span></label>

                  <div class="col-xs-5">
					<input name="noofroom" type="number" class="form-control span6 m-wrap" value="<?php echo $res['noofroom'];?>">
                  </div>
                </div>
	   <!-- select start -->
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">Hostel Type <span class="required">*</span></label>
                  <div class="col-xs-5">
				   <select class="form-control span6 m-wrap" name="hosteltype">	
				    <option value="<?php echo $res['hosteltype'];?>"><?php echo $res['hosteltype'];?> </option>
                    <option value="Boy's">Boy's</option>
                    <option value="Girl's">Girl's</option>
                    <option value="Guest House">Guest House</option>
                  </select>
                  </div>
                </div>
	<!-- select end -->
            </div>
              <!-- /.box-body -->
              <div class="col-xs-8 form-group pull-right">
                <button type="submit" name="hstlupdate" class="btn btn-primary">Update</button>
              </div>
              <!-- /.box-footer -->
			  </fieldset>
            </form>
		   </div>
		</div>
         </div>
          
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