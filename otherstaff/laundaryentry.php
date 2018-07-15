<?php 
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['laundaryentrybtn']))
		{
			$laundaryitem=$_POST['laundaryitem'];
		    $price=$_POST['price'];
			$description=$_POST['description'];
			
			$sql=("INSERT INTO laundaryentry (laundaryitem,price,description)
			VALUES (:laundaryitem, :price, :description)");
			
			$query=$connect->prepare($sql);
			$query->execute(array (
			':laundaryitem'=>$laundaryitem,
			':price'=>$price,
			':description'=>$description));
		     $laundaryid=$connect->lastInsertId();
			$laundaryinsert=1;
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
   if($_POST['selectlaundary']=='Select Laundary Item...')
   {
	   echo "<script>alert('Please Select Item and Update/Delete Action')</script>";
   }
   else 
   {
	$laundaryid=$_POST['selectlaundary'];
     $action=$_POST['actionradio'];
	  if($action=='update')
	  {
		  $updateaction=1;
	  }
	  if($action=='delete')
	  {
		  $sql =("DELETE FROM laundaryentry WHERE laundaryid='$laundaryid'");
		  $query =$connect->query($sql);
		  $query->execute();
		  $laundarydel=1;
	  } 
   }	  
 }
 ?>
 
  <?php
 
 if(isset($_POST['laundaryupdatebtn']))
 {
	        $laundaryid=$_POST['laundaryid'];
	 	    $laundaryitem=$_POST['laundaryitem'];
		    $price=$_POST['price'];
			$description=$_POST['description'];
			
			$updatestmt=("UPDATE laundaryentry SET laundaryitem =:laundaryitem, price =:price,
						  description =:description WHERE laundaryid='$laundaryid'"); 
			$queryupdate =$connect->prepare($updatestmt);
			
			$queryupdate->execute(array(
			                        ':laundaryitem'=>$laundaryitem,
									':price'=>$price,
									':description'=>$description,)
									); 
		  
		  $updatesucess=1;
 } 
?>

<?php 
include('othstafftool/topfile.php');
echo "<title>Staff| Laundary Entry</title>";
?>

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('othstafftool/header.php');
include('othstafftool/dashboard.php');
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laundary Entry
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
              <h3 class="box-title">Entry</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<form method="post"  class="form-horizontal">
			<fieldset>
				<div class="alert alert-info">
					<button class="close" data-dismiss="alert">&times;</button>
					<strong>*</strong> Fields are mandatory to fill.
				 </div>
	            <div class="alert alert-success alert-dismissible <?php if(!isset($laundaryinsert)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Laundary Item Inserted Sucessfully with Laundary ID:<?php echo $laundaryid;?></h5>
				</div>
             <div class="box-body">
                <div class="form-group">
				  <label class="col-sm-3 control-label">Laundary Item:<span class="required">*</span></label>

                  <div class="col-xs-5">
                    
					<input name="laundaryitem" type="text" class="form-control span6 m-wrap" placeholder="Laundary Item" required/>
                  </div>
                </div>
				
                <div class="form-group">
				  <label class="col-sm-3 control-label">Price: <span class="required">*</span></label>

                  <div class="col-xs-5">
					<input name="price" type="number" class="form-control span6 m-wrap" placeholder="Price" required/>
                  </div>
                </div>
				<div class="form-group">
				  <label class="col-sm-3 control-label">Discription: <span class="required">*</span></label>

                  <div class="col-xs-5">
					<input name="description" type="text" class="form-control span6 m-wrap" placeholder="Discription" required/>
                  </div>
                </div>
	   <!-- select start -->
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="laundaryentrybtn" class="btn btn-primary">Submit</button>
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
              <h3 class="box-title"> Laundary Update/Delete </h3>
            </div>
				<div class="alert alert-success <?php if(!isset($updatesucess)) echo 'hide';?>">
				   <button class="close" data-dismiss="alert"></button>
					 Laundary Details updated successfully  !
				</div>
				<div class="alert alert-success <?php if(!isset($laundarydel)) echo 'hide';?>">
				   <button class="close" data-dismiss="alert"></button>
					 Laundary Details Delete successfully !with Laundary ID:<?php echo $laundaryid;?>
				</div>
            <!-- form start -->
		  <div class="box-body">
            <form method="post" name="updatedelfrm" class="form-horizontal">
				<div class="form-group">
                  <label name="search" class="col-sm-2 control-label">Search <span class="required">*</span></label>
                  <div class="col-sm-10">
				    <select class="form-control" placeholder="Select Laundary Item..." name="selectlaundary">
					<option value="Select Laundary Item...">Select Laundary Item...</option>
					<?php
					     	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
							$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$comboquery =$con->query("SELECT laundaryid,laundaryitem FROM laundaryentry");
								while($combodata=$comboquery->fetch()) 
								  echo "<option value=".$combodata['laundaryid'].">".$combodata['laundaryitem']."</option>";
					?>
					</select>
                  </div>
                </div>
			  <!-- radio strat here-->
                <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Action <span class="required">*</span></label>
                  <div class="radio col-sm-2">
                    <label class="control-label">
                      <input type="radio" name="actionradio" id="optionsRadios1" value="update">
                      Update
                    </label>
                  </div>
                  <div class="radio col-sm-2">
                    <label class="control-label">
                      <input type="radio" name="actionradio" id="optionsRadios2" value="delete">
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
			<form method="post"  class="form-horizontal <?php if(!isset($updateaction)) echo 'hide';?>">
			<fieldset>
             <div class="box-body">
				<?php
				    $con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql=("SELECT* FROM laundaryentry WHERE laundaryid='$laundaryid'");
					$query =$con->query($sql);
					$res=$query->fetch();		 				
				?>
                <div class="form-group hide">
				  <label class="col-sm-3 control-label">Laundary ID:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input name="laundaryid" type="text" class="form-control span6 m-wrap" value="<?php echo $res['laundaryid'];?>"/>
                  </div>
                </div>
                <div class="form-group">
				  <label class="col-sm-3 control-label">Laundary Item:<span class="required">*</span></label>
                  <div class="col-xs-5">
					<input name="laundaryitem" type="text" class="form-control span6 m-wrap" value="<?php echo $res['laundaryitem'];?>"/>
                  </div>
                </div>
				
                <div class="form-group">
				  <label class="col-sm-3 control-label">Price: <span class="required">*</span></label>

                  <div class="col-xs-5">
					<input name="price" type="number" class="form-control span6 m-wrap" value="<?php echo $res['price'];?>"/>
                  </div>
                </div>
				<div class="form-group">
				  <label class="col-sm-3 control-label">Discription: <span class="required">*</span></label>

                  <div class="col-xs-5">
					<input name="description" type="text" class="form-control span6 m-wrap" value="<?php echo $res['description'];?>"/>
                  </div>
                </div>
	   <!-- select start -->
              <!-- /.box-body -->
              <div class="col-xs-8 form-group pull-right">
                <button type="submit" name="laundaryupdatebtn" class="btn btn-primary">Update</button>
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

    <!-- /.content -->
  
 <?php 
include('othstafftool/footer.php');
include('othstafftool/bottomfile.php');
?>

</div>
</body>
</html>