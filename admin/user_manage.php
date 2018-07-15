<?php 
include('admintools/topfile.php');
echo "<title>Admin| User Manage</title>";
?>

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('admintools/header.php');
include('admintools/dashboard.php');
echo "<div>";
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
    <!-- Main content -->
        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">User Management</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <!-- Start creating your amazing application! -->
              <button  type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#new_user_entry"> 
                New User 
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
              </button>
			  </br>
			  </br>
			  
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Name</th> 
                  <th>Address</th>
                  <th>Mob No</th>
                  <th>Email Id</th>
				  <th>Type</th>
				  <th>Hostel ID</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
		<?php 
			$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query =$con->query("SELECT * FROM staff_details");
			$i=1;
			while($res=$query->fetch())
			{
				   echo "<tr>";
                   echo "<td>".$i."</td>";
                   echo "<td>".$res['fname']." ". $res['lname']."</td>";
                   echo" <td>".$res['addressline1']."</a></td>";
                   echo" <td>".$res['mobileno']."</td>";
                   echo" <td>".$res['emailid']."</td>";
                   echo" <td>".$res['stafftype']."</td>";
                   echo" <td>".$res['hostelid']."</td>";
				   echo" <td>".
				             "<a href=view_user_details.php?id=".$res['Staff_id']."><button type="."button"." class="."btn btn-warning ><i class="."fa fa-remove."."></i> View </button></a>".
				             " "."<a href=edit_user_details.php?id=".$res['Staff_id']."><button type="."button"." class="."btn btn-warning ><i class="."fa fa-remove."."></i> Edit </button></a>".
				             " "."<a href=delete_user.php?id=".$res['Staff_id']."> <button type=button class=btn btn-warning ><i class=fa fa-remove></i> Delete</button></a>".
                  		 "</td>";
				   echo "</tr>";
				   $i++;
			}
		?>
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </section><!-- /.content -->
	<!-- Sectin .content End -->
	</div>
	<!-- /.content-wrapper  end here--> 

  <?php 
    include_once('new_user_entry.php'); 
	include('admintools/footer.php');
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