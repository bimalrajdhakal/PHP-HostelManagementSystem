<?php 
$invoice_no=$_GET['invoiceno'];
try{
	$connect=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['addservice']))
		{
			if($_POST['selectlaundry']=='Select Laundry Item...')
			 {
	            echo "<script>alert('Please Select Laundry Item')</script>";
             }
			else   
			{
				
				$laundry_id=$_POST['selectlaundry'];
				$qty=$_POST['quantity'];
				$date=Date("Y-m-d");
				
				$query =$connect->query("SELECT * FROM laundaryentry where laundaryid='$laundry_id'");
				 while($res=$query->fetch())
				 {
				    $laundry_item=$res['laundaryitem'];
                    $price=$res['price'];
				 }
			$sql=("INSERT INTO laundry_order(invoice_no,laundry_item,price,qty,amount,date)
			VALUES (:invoice_no, :laundry_item, :price, :qty, :amount ,:date)");
			
			$query=$connect->prepare($sql);
			$query->execute(array (
			':invoice_no'=>$invoice_no,
			':laundry_item'=>$laundry_item,
			':price'=>$price,
			':qty'=>$qty,
			':amount'=>$price*$qty,
			':date'=>$date));
			$serviceinserted=1;
		  }
		}
}
  catch(PDOException $e){
    echo "Error !".$e->getMessage()."<br/>";
	 die();
  }
  $connect=null;
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
echo "<div>"
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
              <h3 class="box-title">Service Entry</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<form method="post" class="form-horizontal">
	            <div class="alert alert-success alert-dismissible <?php if(!isset($serviceinserted)) echo 'hide';?>">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <h5><i class="icon fa fa-check"></i>Laundry Item Inserted Sucessfully with Invoice No.: <?php echo $invoice_no;?></h5>
				</div>
			<fieldset>
             <div class="box-body">
				<div class="form-group">
                  <label name="search" class="col-sm-3 control-label">Laundry Item:<span class="required">*</span></label>
                  <div class="col-sm-3">
				    <select class="form-control" placeholder="Select Laundry Item..." name="selectlaundry"/>
					<option value="Select Laundry Item...">Select Laundry Item...</option>
					<?php
					     	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
							$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$comboquery =$con->query("SELECT laundaryid,laundaryitem,price FROM laundaryentry");
								while($combodata=$comboquery->fetch())
								  echo "<option value=".$combodata['laundaryid'].">".$combodata['laundaryitem']."</option>";
							  
					?>
					</select>
                  </div>
				   <div class="col-sm-3">
					<input name="quantity" type="number" class="form-control span6 m-wrap" placeholder="Quantity" required/>
                  </div>
				  <button type="submit" name="addservice" class="btn btn-info"><i class="fa fa-cart-plus"></i> Add Item</button>
				  <button type="reset" class="btn btn-primary">Clear</button>
                </div>	
				</fieldset>
			 </form>
			 </br>
   <!-- Start Table -->
             <div class="box box-primary">
              <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Laundry Item</th>
                  <th>Price (<i class="fa fa-inr"></i>)</th>
				  <th>Quantity</th>
                  <th>Amount (<i class="fa fa-inr"></i>)</th> 
				  <th>Action</th> 
                </tr>
                </thead>
                <tbody>
		<?php 

			$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query =$con->query("SELECT * FROM laundry_order where invoice_no='$invoice_no'");
			$i=1;
			
			while($res=$query->fetch())
			{
				   echo "<tr>";
                   echo "<td>".$i."</td>";
                   echo" <td class="."mailbox-name>".$res['laundry_item'] ."</td> ";
                   echo" <td class="."mailbox-attachment>". $res['price']."</td>";
				   echo" <td class="."mailbox-attachment>". $res['qty']."</td>";
                   echo" <td class="."mailbox-attachment>".$res['amount']."</td>";
				   echo" <td> <a href=delete_laundry.php?trnid=".$res['trn_id']."&invoiceno=$invoice_no> <button type=button class=btn btn-warning ><i class=fa fa-remove></i> Remove </button></a></td>";
				   echo "</tr>";
				   $i++;
							 
			}
                     
             $query =$con->query("SELECT sum(amount) FROM laundry_order where invoice_no='$invoice_no'");	
              while( $sum=$query->fetch())
			  {
                     $total=$sum['sum(amount)'];
			  }					 
			                 
			                 
		   
		?>
                </tbody>				
              </table>
			  <label  class="col-sm-3 control-label">Total Amount ==> <i class="fa fa-inr"></i> <?php echo $total ;?></label>
			  <div class="form-group col-sm-3">
			     <a href=proceed_laundry.php?invoiceno=<?php echo $invoice_no;?>><button type="submit" name="addservice" class="btn btn-info pull-right"><i class="fa fa-save"></i> Proceed</button></a>
			  </div>
                
            </div>
		  </div>
   
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


