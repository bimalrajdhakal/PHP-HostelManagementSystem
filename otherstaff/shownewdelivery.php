<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Other Staff| Laundry Service</title>
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
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
</head>
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
        Upcomming Delivery 
      </h1>
 
    </section>
   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Upcomming Laundry Service Delivery List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Customer Id</th>
                  <th>Invoice No</th>
                  <th>Amount (<i class="fa fa-inr"></i>)</th>
				  <th>Date</th>
                  <th>Exp Delivery Date</th> 
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
		<?php 
			$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query =$con->query("SELECT * FROM laundry_invoice where status='Not Delivered'");
			$i=1;
			while($res=$query->fetch())
			{
				   echo "<tr>";
                   echo "<td>".$i."</td>";
                   echo" <td class="."mailbox-name>". $res['customer_id']."</td>";
				   echo" <td class="."mailbox-name>" ."<a href="."show_laundry_invoice.php?invoiceno=".$res['invoice_no'].">". $res['invoice_no'] ."</a></td>";
                   echo" <td class="."mailbox-attachment>". $res['amount']."</td>";
                   echo" <td class="."mailbox>".$res['date']."</td>";
				   echo" <td class="."mailbox-attachment>". $res['exp_delidate']."</td>";
				   echo" <td> <a href=claim_laundry.php?trnid=".$res['trn_id']."> <button type=button class=btn btn-warning ><i class=fa fa-remove></i> Claim </button></a></td>";
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

    </section>
	<!-- Sectin .content End -->
	</div>
	<!-- /.content-wrapper  end here--> 

    <!-- /.content -->
  
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