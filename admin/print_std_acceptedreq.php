<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin| Student Request Print</title>
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
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <img src="dist/img/logo_college.png" alt="logo_college">
          <small class="pull-right">Date: <?php echo Date("d-m-Y");?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
      <!-- /.col -->
      <div class="col-xs-6">
          <legend><h3>Student Accepted Request</h3></legend>
      </div>
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>S.No.</th>
			<th>Request No.</th>
            <th>Request Date</th>
            <th>Admn/Reg No.</th>
            <th>Admn/Reg Date</th>
            <th>Branch</th>
            <th>Semester</th>
            <th>Name</th>
            <th>Alloted Hostel</th>
            <th>Alloted Room</th>
          </tr>
          </thead>
          <tbody>
          <tr>
		  <?php 
			$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query=$con->query("SELECT admnregno,admnregdate,branch,semester,fname,lname FROM student WHERE
      			                student_id=(SELECT stdudent_id FROM stdrequest where requestno='STD-15052017063205')");
			$i=1;
			while($res=$query->fetch())
			{
              echo "<td>".$i."</td>";
              echo "<td>".$res['admnregno']."</td>";
              echo "<td>".Date("d-m-Y",strtotime($res['admnregdate']))."</td>";
              echo "<td>".$res['admnregno']."</td>";
              echo "<td>".Date("d-m-Y",strtotime($res['admnregdate']))."</td>";
              echo "<td>".$res['branch']."</td>";
              echo "<td>".$res['semester']."</td>";
              echo "<td>".$res['fname']." ". $res['lname']."</td>";
              echo "<td>".$res['fname']." ". $res['lname']."</td>";
              echo "<td>".$res['fname']." ". $res['lname']."</td>";
			  $i++;
			}
			?>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
