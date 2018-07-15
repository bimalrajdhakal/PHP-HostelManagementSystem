<?php 
include('admintools/topfile.php');
echo "<title>Admin| Public Mails</title>";
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
         <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Student's New Request</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Request">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
			   <div class="box">
                <table class="table table-hover table-bordered">
                <thead>
                <tr>
                 <th></th> 
                  <th>Request No.</th>
                  <th>Student Details</th>
                  <th>Request Date</th>
                  <th>Status</th> 
                </tr>
                </thead>
                  <tbody>
		<?php 
			$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query =$con->query("SELECT * FROM stdrequest where req_status='NEW'");
			while($res=$query->fetch())
			{
				   echo "<tr>";
                    echo "<td><input type="."checkbox>" ."</td>";
                   echo" <td class="."mailbox-name>" ."<a href="."Forward_stdreq.php?requestno=".$res['requestno'].">". $res['requestno'] ."</a></td>";
                   echo" <td class="."mailbox-subject>"."<b>".$res['stdudent_id'] ."</b> ";
                    echo "</td>";
                   echo" <td class="."mailbox-attachment>". Date("d-m-Y",strtotime($res['req_date']))."</td>";
                   echo" <td class="."mailbox>".$res['req_status']."</td>";
                 echo "</tr>";
			}
		?>
                  </tbody>
                </table>
				</div>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
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

