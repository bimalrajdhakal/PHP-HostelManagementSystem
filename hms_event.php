<!--
Author: 
Author URL: 
License: 
License URL: 
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>HMS Portal | Events</title>
<?php
include('/main/topfile.php');
?>
</head>
<body>

<!-- Include header.php file from main directory -->
<?php
include('/main/header.php')	;
?>

 	<header id="head" class="secondary">
            <div class="container">
                    <h1>HMS Events</h1>
                    <p><h4></h4></p>
                </div>
    </header>
	
	
	
    <!-- container -->
    <section class="container">
        <div class="row">
            <!-- main content -->
			<section>
                <h3>Events from HMS</h3>
                <p>
                 <!--   <img src="assets/images/01.jpg" alt="" class="img-rounded pull-right" width="300">  -->
                </p>
                <p></p>
				</br>
				</br>
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Sl No.</th>
            <th>Subject</th>
			<th>Event Date</th>
			<th>Event Time</th>
			<th>Description</th>
          </tr>
          </thead>
          <tbody>
		  <?php 
			$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query =$con->query("SELECT * FROM event_entry_table order by(id) DESC");
			$i=1;
			while($res=$query->fetch())
			{
				   echo "<tr>";
                   echo "<td>".$i."</td>";
                   echo "<td>".$res['subject']."</td>";
                   echo" <td>".Date("d-m-Y",strtotime($res['event_date']))."</td>";
                   echo" <td>".$res['event_time'] ."</td>";
                   echo" <td>".$res['description']."</td>";
				   echo "</tr>";
				   $i++;
			}
		?>
          </tbody>
        </table>
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row -->
          
            </section>
            <!-- /main -->

            <!-- Sidebar -->
        <!--    <aside class="col-sm-4 sidebar sidebar-right">

                <div class="panel">
                    <h4>Imporatnats Links</h4>
                    <ul class="list-unstyled list-spaces">
                        <li><a href="">College of Engineering,Vatakara</a><br>
                            <span class="small text-muted">Official Website of College of Engineering, Vatakara.</span></li>
                        <li><a href="">Campus Software(CMS)</a><br>
                            <span class="small text-muted">Official Website of Campus Management System(CMS)</span></li>
                        <li><a href="">Student's Request Form</a><br>
                            <span class="small text-muted">Student Services.</span></li>
                        <li><a href="">Visitor's Request Form</a><br>
                            <span class="small text-muted">Visitor Services.</span></li>
                        <li><a href="">Public Grievances</a><br>
                            <span class="small text-muted">Public Grievances</span></li>
							<li><a href="">Login to HMS</a><br>
                            <span class="small text-muted">Login to Hostel Management System</span></li>
                    </ul>
                </div>

            </aside>  -->
            <!-- /Sidebar -->

        </div>
    </section>
	<!--  footer -->
	<?php
include('main/footer.php')	;
include('main/bottomfile.php');
?>