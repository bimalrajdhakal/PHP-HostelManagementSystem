<?php 
include('../session.php');
?>  
<script>

 function startTime()
 {
	  var today=new Date();
	  var h=today.getHours();
	  var m=today.getMinutes();
	  var s=today.getSeconds();
	  m=checkTime(m);
	  s=checkTime(s);
	     document.getElementById('timerun').innerHTML= h + ":" + m + ":" + s;
		 var t=setTimeout(startTime,500);
 }
 
 function checkTime(i)
 {
	  if(i<10)
	  {i="0" + i} // add zero in front of numbers <10
      return i;
 }
</script>
  <header class="main-header">
    <!-- Logo -->
    <a href="./wardenmain.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>HMS |</b> Portal</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
	  <div class="col-md-2"><?php echo Date('D j F Y');?></div>
      <div id="timerun" class="col-md-6"></div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
			  <i class="fa fa-bell-o"></i>
              <span class="label label-success">
			  <?php 
			  $con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
			  $query =$con->query("SELECT * FROM stdrequest where req_status='Forwarded' and hostelid='$stafflogedin_hostel_id'");
			  echo $query->rowCount();
			  ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $query->rowCount();?> Student's Request</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
					  <?php 
						$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
						$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$query =$con->query("SELECT * FROM stdrequest where req_status='Forwarded' and hostelid='$stafflogedin_hostel_id'");
						while($res=$query->fetch())
						{ 
					        echo "<li>";
						    echo "<a href=".'stdallotroomno?requestno='.$res['requestno'].'>';
					        echo " <h4> ";
							echo $res['requestno'],'<br>';
							echo "</h4>";
							echo "</a>";
							echo "</li>";
						}
					?>
                </ul>
              </li>
              <li class="footer"><a href="stdallothostel.php">View All Student Requests</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">
			  <?php 
			  $con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
			  $query =$con->query("SELECT * FROM vstrrequest where vstreqstatus='Forwarded' and hostelid='$stafflogedin_hostel_id'");
			  echo $query->rowCount();
			  ?>
			  </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $query->rowCount();?> Visitor's Request</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
					  <?php 
						$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
						$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$query =$con->query("SELECT * FROM vstrrequest where vstreqstatus='Forwarded' and hostelid='$stafflogedin_hostel_id'");
						while($res=$query->fetch())
						{ 
					        echo "<li>";
						    echo "<a href=".'vstallotroomno.php?requestno='.$res['vstreqno'].'>';
					        echo " <h5> ";
							echo $res['vstreqno'],'<br>';
							echo "</h5>";
							echo "</a>";
							echo "</li>";
						}
					?>
                </ul>
              </li>
              <li class="footer"><a href="vstallothostel.php">View All Visitor Requests</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-commenting"></i>
              <span class="label label-danger">
			  <?php 
			  $query =$con->query("SELECT * FROM student_complaints where complaint_status='New' and hostel_id='$stafflogedin_hostel_id'");
			  echo $query->rowCount();
			  ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $query->rowCount();?> Complaints</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
					  <?php 
						$handler=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
						$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$query =$handler->query("SELECT * FROM student_complaints where complaint_status='New' and hostel_id='$stafflogedin_hostel_id'");
						while($res=$query->fetch())
						{ 
					        echo "<li>";
						    echo "<a href=".'read_std_new_complaint.php?complaintno='.$res['complaints_no'].'>';
					        echo " <h5> ";
							echo $res['complaints_no'].'<br>';
							echo "</h5>";
							echo "</a>";
							echo "</li>";
						}
					?>
                </ul>
              </li>
              <li class="footer">
                <a href="./std_complaints_new_list.php">View all complaints</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $login_session;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Body -->
              <li>
                <a tabindex="-1" href="user_profile.php">Profile</a>
              </li>
              <li class="divider"></li>
			  <li>
                <a tabindex="-1" href="setting_change_password.php?id=<?php echo $user_id;?>">Settings</a>
              </li>
			  <li class="divider"></li>
              <li>
                <a tabindex="-1" href="../logout.php">Logout</a>
              </li>                                                                               
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>