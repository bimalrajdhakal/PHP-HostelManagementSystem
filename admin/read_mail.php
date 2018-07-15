<?php 
if(isset($_GET['messageid']))
	$msgid=$_GET['messageid'];
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$updatestmt=("UPDATE contact_us SET status =:status WHERE messageid='$msgid'"); 
			$queryupdate =$con->prepare($updatestmt);
			
			$queryupdate->execute(array(
			                        ':status'=>"Read"));
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
	  <br>
	  <br>
	  <div class="col-md-1"></div>
        <div class="col-md-9">
          <div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
          <!-- general form elements -->
          <div class="box box-warning">
            <!-- form start -->
			<form action="#" method="post" class="form-horizontal">
			 <fieldset>
             <div class="box-body">
<?php 
	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query =$con->query("SELECT sendername,senderemailid,contactno,subject,message FROM contact_us where messageid='$msgid'");
	$res=$query->fetch();
?>
  
			 <legend><h5>Email Details</h5></legend>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Name:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo $res['sendername'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Email id:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo $res['senderemailid'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Contact No:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo $res['contactno'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Subject:</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control" id="addressline1" value="<?php echo $res['subject']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label name="address" class="col-sm-3 control-label">Message:</label>
					<div class="col-xs-5">
						<textarea class="form-control" rows="4"><?php echo $res['message'];?></textarea>
					</div>
                  </div>
				 </div>
              <!-- /.box-body -->
			  </fieldset>
            <div class="box-footer">
              <div class="pull-right">
                  <a href=public_mail_contact.php><button type="button" name="addservice" class="btn btn-default pull-right"><i class="fa fa-reply"></i> Back</button></a>
              </div>
              <a href=delete_mail_contact.php?id=<?php echo $msgid;?>><button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
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