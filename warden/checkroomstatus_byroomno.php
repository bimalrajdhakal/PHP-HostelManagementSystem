<?php 
include('wardentools/topfile.php');
echo "<title>Warden| Check Status</title>";
?>

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('wardentools/header.php');
include('wardentools/dashboard.php');
echo "<div>";
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
	   <br>
    <section class="content-header">
      <h1>
        Check Room Status
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
              <h3 class="box-title">Room Status</h3>
            </div>
                <br>
            <!-- form start -->
			<form method="post" class="form-horizontal">
			  <fieldset>
	         	<div class="form-group">
				  <label class="col-sm-4 control-label">Room No: <span class="required"></span></label>
				    <button type="submit" name="load_databtn" class="btn btn-primary">Go</button>
                  <div class="col-xs-5">
				      <input name="roomno" type="number"class="form-control span6 m-wrap" required  />
                  </div>
                </div>
			  </fieldset>
			  <br>
            </form>
			<!-- form End -->
       <div class="box-body">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Room Allocatee Details</h3>
            </div>
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">SL</th>
                  <th>Allocatee ID</th>
                  <th>From Date</th>
				  <th>To Date</th>
                  <th style="width: 40px">Status</th>
                </tr>
	  <?php 
	  	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['load_databtn']))
		{
			$room_no=$_POST['roomno'];
			 $sql=("SELECT allocatee_id,from_date,to_date,status FROM room_allotment WHERE room_no='$room_no' and hostel_id='$stafflogedin_hostel_id'");
			 $query =$con->query($sql);
			 $i=1;
			 while($res=$query->fetch())
			 { 
               echo "<tr>";
               echo "<td>".$i ."</td>";
               echo "<td>".$res['allocatee_id']." "."<a href="."display_allocatee_details.php?studentid=".$res['allocatee_id'].">"."View Details" ."</a>"."</td>";
               echo "<td>".Date("d-m-Y",strtotime($res['from_date']))."</td>";
			   echo "<td>".$res['to_date']."</td>";
			   echo "<td><span class="."badge bg-red".">". $res['status']."</span></td>";
               echo "</tr>";
			    $i++;
			 }
		}
		?>
              </table>
            </div>
          </div>
        </div>
       </div>
          </div>
          <!-- /.box -->
        </div>
        </div>
    </section>
	<!-- Sectin .content End -->
	</div>
	<!-- /.content-wrapper  end here--> 

  <?php 
	include('wardentools/footer.php');
	include('wardentools/bottomfile.php');
	?>
	</div>
</body>
</html>
	