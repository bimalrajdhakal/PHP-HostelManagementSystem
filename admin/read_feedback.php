<?php 
if(isset($_GET['feedbackid']))
	$feedid=$_GET['feedbackid'];
?>
<?php 
include('admintools/topfile.php');
echo "<title>Admin| Public Mail</title>";
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
    <section class="content">
	  <div class="row">
	   <div class="col-md-1"></div>
        <div class="col-md-9">
          <div class="">
            <!-- /.box-header -->
            <div class="box-body no-padding">
          <!-- general form elements -->
          <div class="box box-warning">
      <!--      <div class="box-header with-border">
              <h4 class="box-title">Student Details</h4>
            </div>  -->
            <!-- /.box-header -->
            <!-- form start -->
			<form action="#" method="post" class="form-horizontal">
			 <fieldset>
             <div class="box-body">
<?php 
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query =$con->query("SELECT feed_concern,hostel,fname,lname,addline1,addline2,addline3,emailid,contactno,complain FROM publicfeed WHERE feedbackid='$feedid'");
	$res=$query->fetch();
?>
			 <legend><h5>Grievance /Feedback Details</h5></legend>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Feedback Concern:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" value="<?php echo $res['feed_concern'];?>"></br>

					<input type="text" class="form-control" value="<?php echo $res['hostel'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Name:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" value="<?php echo $res['fname'];?>"></br>
					<input type="text" class="form-control" value="<?php echo $res['lname'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Address:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo $res['addline1'];?>"></br>
					<input type="text" class="form-control" id="addressline1" value="<?php echo $res['addline2'];?>"></br>
					<input type="text" class="form-control" id="addressline1" value="<?php echo $res['addline3'];?>">
                  </div>
                </div>

                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Contact Details:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo $res['emailid'];?>"></br>
					<input type="text" class="form-control" id="addressline1" value="<?php echo $res['contactno'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Grievance Description:</label>
					<div class="col-xs-5">
						<textarea class="form-control" rows="4"><?php echo $res['complain'];?></textarea>
					</div>
                  </div>
				 </div>
              <!-- /.box-body -->
			  </fieldset>
            <div class="box-footer">
              <div class="pull-right">
                 <a href=public_feedback.php><button type="button" name="addservice" class="btn btn-default pull-right"><i class="fa fa-reply"></i> Back</button></a>
              </div>
              <a href=delete_feedback.php?id=<?php echo $feedid;?>><button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
            </div>
			<!-- form End -->
            </form>
          </div>
          <!-- /.box -->
            </div>
            <!-- /.box-footer -->

            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
	   </div>
    </section>
    <!-- /.content -->
  </div>
      <?php 
	include('admintools/footer.php');
	include('admintools/bottomfile.php');
	?>
 </div>
 </body>
</html>