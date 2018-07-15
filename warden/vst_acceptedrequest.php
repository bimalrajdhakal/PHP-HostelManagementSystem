<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Warden| Visitor Request</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css" onload="startTime()">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
include('wardentools/header.php');
include('wardentools/dashboard.php');
?>
   
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Category</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="vstallothostel.php"><i class="fa fa-envelope-o"></i> Forwarded Request
                  <span class="label label-primary pull-right"></span></a></li>
                <li><a href="vst_acceptedrequest.php"><i class="fa fa-envelope-square"></i> Accepted Request</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <div class="col-md-9">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Visitor's Accepted Request</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Request No.</th>
                  <th>Visitor ID</th>
                  <th>Request Date</th>
                  <th>Check-In Date</th> 
				  <th>Check-Out Date</th>
                </tr>
                </thead>
                <tbody>
		<?php 
			$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query =$con->query("SELECT * FROM vstrrequest where vstreqstatus='Accepted' and hostelid='$stafflogedin_hostel_id'");
			$i=1;
			while($res=$query->fetch())
			{
				   echo "<tr>";
                   echo "<td>".$i."</td>";
                   echo" <td class="."mailbox-name>" ."<a href="."vst_readacceptedreq.php?requestno=".$res['vstreqno'].">". $res['vstreqno'] ."</a></td>";
                   echo" <td class="."mailbox-subject>"."<b>"."<a href="."display_vstdetails.php?visitorid=".$res['visitorid']." target="."_blank".">".$res['visitorid'] ."</b> ";
                   echo "</td>";
                   echo" <td class="."mailbox-attachment>". Date("d-m-Y",strtotime($res['vstrreqdate']))."</td>";
                   echo" <td class="."mailbox>".Date("d-m-Y",strtotime($res['checkindate']))."</td>";
				   echo" <td class="."mailbox>".Date("d-m-Y",strtotime($res['checkoutdate']))."</td>";
				   echo "</tr>";
				   $i++;
			}
		?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
    <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.1.01
    </div>
    <strong>Copyright &copy;2017,Hostel Management System.<a href="#"></a></strong>
  </footer>
 </div>
 
 
 
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
