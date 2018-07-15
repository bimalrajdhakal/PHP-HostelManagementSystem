<?php 
$invoice_no=$_GET['invoiceno'];
?>

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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laundry Service
      </h1>
 
    </section>
   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-11">
          <!-- general form elements -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Bill Generation</h3>
            </div>
			</br>
            <!-- /.box-header -->
            <!-- form start -->
			<form method="post" action="laundry_invoice_print.php?invoiceno=<?php echo $invoice_no;?>" class="form-horizontal">
	            <div class="alert alert-success alert-dismissible <?php if(!isset($serviceinserted)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Data Saved Sucessfully with Invoice No.: <?php echo $invoice_no;?></h5>
				</div>
			<fieldset>
             <div class="box-body">
				<div class="form-group">
				   
				    <label name="search" class="col-sm-3">Customer Id:<span class="required">*</span></label>
					<input name="custid" type="text" class="col-sm-4" placeholder="Customer Id" required/>
					<label name="search" class="col-sm-3"></label>
					

				  <button type="submit" name="addservice" class="btn btn-primary"><i class="fa fa-save"></i> Save and Print</button>
				  
				  	<label name="search" class="col-sm-3">Expected Delivery Date:<span class="required">*</span></label>
					<input name="deliverydate" type="date" class="col-sm-4" placeholder="Select Date" required/>
				  
                </div>	
				</fieldset>
			 </form>
			 
   <!-- Start Table -->
       
        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Items Included in Bill</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Sl No.</th>
                  <th>Laundry Item</th>
                  <th>Price (<i class="fa fa-inr"></i>)</th>
				  <th>Quantity</th>
                  <th>Amount (<i class="fa fa-inr"></i>)</th>  
                </tr>
		<?php 

			$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query =$con->query("SELECT * FROM laundry_order where invoice_no='$invoice_no'");
			$i=1;
			
			while($res=$query->fetch())
			{
              echo  "<tr>";
              echo  "<td>".$i."</td>";
              echo  "<td>".$res['laundry_item']."</td>";
              echo  "<td>".$res['price']."</td>";
              echo  "<td>".$res['qty']."</td>";
              echo  "<td>".$res['amount']."</td>";
              echo  "</tr>";
			  $i++;
			}
			 $query =$con->query("SELECT sum(amount) FROM laundry_order where invoice_no='$invoice_no'");	
              while( $sum=$query->fetch())
			  {
                     $total=$sum['sum(amount)'];
			  }
	    ?>

              </table>
			     </br>
			  	<label  class="col-sm-3 control-label pull-right">Total Amount ==> <i class="fa fa-inr"></i> <?php echo $total ;?></label>
				
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        
   <!-- End Table --->



				
                </div>
	   <!-- select start -->
              <!-- /.box-body  -->
			  
			  

			
          </div>
          <!-- /.box -->
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
include('othstafftool/footer.php');

?>

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


