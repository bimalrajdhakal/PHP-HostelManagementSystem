<?php
$hostelid=$_GET['id'];
?>
 <?php
 if(isset($_POST['hstlupdate']))
 {
 try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
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
		  
				echo "<script>alert('Hostel Updated Successfully !!!!')</script>";
 }
 
   catch(PDOException $e){
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;
 header("location:hostel_manage.php");
 }
 
?>
<?php 
include('admintools/topfile.php');
echo "<title>Admin| Hostel Update</title>";
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
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hostel Management
      </h1>
 
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
	    <div class="col-md-3"></div>
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit/Update Hostel</h3>
            </div>
		  <div class="box-body">
   <!-- form start -->
			<form name="hostelupdate" method="post" class="form-horizontal">
			<fieldset>
				<?php
				    $con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql=("SELECT* FROM hostel_details WHERE hostel_id='$hostelid'");
					$query =$con->query($sql);
					$res=$query->fetch();		 				
				?>
             <div class="box-body">
                <div class="form-group">
				  <label class="col-sm-3 control-label">Hostel Name <span class="required">*</span></label>
                  <div class="col-xs-6">
						<input name="hostelname" type="text" class="form-control span6 m-wrap" value="<?php echo $res['hostel_name'];?>">
                  </div>
                </div>
                <div class="form-group">
				  <label class="col-sm-3 control-label">Address <span class="required">*</span></label>

                  <div class="col-xs-6">
					<input name="addressline1" type="text"class="form-control span6 m-wrap" value="<?php echo $res['addressline1'];?>">
                  </div>
                </div>
				<div class="form-group">
				  <label class="col-sm-3 control-label"><span class="required"></span></label>

                  <div class="col-xs-6">
					<input name="addressline2" type="text" class="form-control span6 m-wrap"value="<?php echo $res['addressline2'];?>">
                  </div>
                </div>
				<div class="form-group">
				  <label class="col-sm-3 control-label">District <span class="required">*</span></label>

                  <div class="col-xs-6">
					<input name="district" type="text" class="form-control span6 m-wrap" value="<?php echo $res['district'];?>">
                  </div>
                </div>
	   <!-- select start -->
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">State <span class="required">*</span></label>
                  <div class="col-xs-6">
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

                  <div class="col-xs-6">
					<input name="pincode" type="number" class="form-control span6 m-wrap" value="<?php echo $res['pincode'];?>">
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">Contact No. <span class="required">*</span></label>

                  <div class="col-xs-6">
					 <input name="contactno" type="number" class="form-control span6 m-wrap" value="<?php echo $res['contactno'];?>">
                  </div>
                </div>
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">No.of Room <span class="required">*</span></label>

                  <div class="col-xs-6">
					<input name="noofroom" type="number" class="form-control span6 m-wrap" value="<?php echo $res['noofroom'];?>">
                  </div>
                </div>
	   <!-- select start -->
	         	<div class="form-group">
				  <label class="col-sm-3 control-label">Hostel Type <span class="required">*</span></label>
                  <div class="col-xs-6">
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
              <div class="box-footer">
                <button type="submit" name="hstlupdate" class="btn btn-primary">Update</button>
                <a href=hostel_manage.php><button type="button" name="addservice" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Back</button></a>
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