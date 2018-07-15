<?php 
include('studenttools/topfile.php');
echo "<title>Student| Complaints Status</title>";
?>

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('studenttools/header.php');
include('studenttools/dashboard.php');
echo "<div>";
?>
<?php 
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
		if(isset($_POST['checkcomplaint_statusbtn']))
		{
		  $complaints_no=$_POST['complaints_no'];
		  
		  $sql=("SELECT * FROM student_complaints WHERE complaints_no='$complaints_no'");	
		  $query =$connect->query($sql);
		  $res=$query->fetch();
		  	if($query->rowCount())
		      $datafeteched=1;
		    else 
			   $error=1;
		}
}
  catch(PDOException $e){
   echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
$con=null;
			                  
?>




  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
	   <br>
    <section class="content-header">
      <h1>
        Complaints Status
      </h1>
  <br>
  <br>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
       <div class="col-md-1"></div>
         <div class="col-md-8">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Check Complaints Status</h3>
            </div>
                <br>
				<br>
            <div class="alert alert-warning <?php if(!isset($error)) echo 'hide';?>">
				<button class="close" data-dismiss="alert"></button>
                  <h5>Complaints No seems incorrect !!! No Data to Display.</h5>
            </div>
            <!-- form start -->
			<form method="post" class="form-horizontal">
			  <fieldset>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Complaint No: <span class="required"></span></label>
				  <button type="submit" name="checkcomplaint_statusbtn" class="btn btn-primary">Go</button>
                  <div class="col-xs-5">
				      <input name="complaints_no" type="text"class="form-control span6 m-wrap" required  />
                  </div>
                </div>
				<br>
			  </fieldset>
			  <br>
            </form>
	<!-- form End -->
	 <div class="<?php if(!isset($datafeteched)) echo 'hide';?>">
       <div class="box-body ">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Complaints Status</h3>
            </div>
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th>Complaint No</th>
                  <th>Complaint Date</th>
                  <th>Complaint Concern</th>
				  <th>Description</th>
                  <th>Status</th>
                </tr>
               <tr>
                <td><?php echo $res['complaints_no'];?></td>
                <td><?php echo Date("d-m-Y",strtotime($res['complaint_date']));?></td>
                <td><?php echo $res['complaints_concern'];?></td>
			    <td><?php echo $res['description'];?></td>
			    <td><span class="."badge bg-red><?php echo $res['complaint_status'];?></span></td>
              </tr>
              </table>
            </div>
          </div>
        </div>
       </div>
	  </div>
			
			<!-- form End -->
          </div>
          <!-- /.box -->
        </div>
        </div>
    </section>
	<!-- Sectin .content End -->
	</div>
	<!-- /.content-wrapper  end here--> 

  <?php 
	include('studenttools/footer.php');
	include('studenttools/bottomfile.php');
	?>
	</div>
</body>
</html>
	