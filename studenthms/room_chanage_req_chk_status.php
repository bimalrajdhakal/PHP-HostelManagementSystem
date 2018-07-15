<?php 
include('studenttools/topfile.php');
echo "<title>Student| Room Change Request</title>";
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
	
	
		if(isset($_POST['checkreq_statusbtn']))
		{
		  $requestno=$_POST['requestno'];
		  
		  $sql=("SELECT * FROM student_room_change_request WHERE requestno='$requestno'");	
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
        Room Change Request Status
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
              <h3 class="box-title">Check Request Status</h3>
            </div>
                <br>
				<br>
            <!-- form start -->
 <div class="alert alert-warning <?php if(!isset($error)) echo 'hide';?>">
				<button class="close" data-dismiss="alert"></button>
                  <h5>Request No seems incorrect !!! No Data to Display.</h5>
 </div>
			<form method="post" class="form-horizontal">
			  <fieldset>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Request No: <span class="required"></span></label>
				  <button type="submit" name="checkreq_statusbtn" class="btn btn-primary">Go</button>
                  <div class="col-xs-5">
				      <input name="requestno" type="text"class="form-control span6 m-wrap" required  />
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
              <h3 class="box-title">Request Status</h3>
            </div>
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th>Request No</th>
                  <th>Request Date</th>
                  <th>Current Room No</th>
				  <th>Willing Room No</th>
                  <th style="width: 40px">Status</th>
                </tr>
               <tr>
                <td><?php echo $res['requestno'];?></td>
                <td><?php echo Date("d-m-Y",strtotime($res['request_date']));?></td>
                <td><?php echo $res['currentroomno'];?></td>
			    <td><?php echo $res['willingroomno'];?></td>
			    <td><span class="."badge bg-red><?php echo $res['status'];?></span></td>
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
	