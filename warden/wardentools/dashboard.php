 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="active treeview">
          <a href="./wardenmain.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Forwarded Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="stdallothostel.php"><i class="fa fa-circle-o"></i>Student's Request</a></li>
            <li><a href="vstallothostel.php"><i class="fa fa-circle-o"></i>Visitor's Request</a></li>
          </ul>
        </li>
        <li>
          <a href="std_leave_request.php">
            <i class="fa fa-users"></i> <span>Student Leave Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
		
        <li class="treeview">
          <a href="std_hostel_vacate_request.php">
            <i class="fa fa-home"></i>
            <span>Hostel Vacate Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="std_complaints_new_list.php">
            <i class="fa fa-commenting"></i>
            <span>Complaints</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-edit"></i> <span>In/Out Entry</span>
            <span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="stdinoutentry.php"><i class="fa fa-circle-o"></i>Student's In/Out</a></li>
			<li><a href="showoutstd.php"><i class="fa fa-circle-o"></i><span>Out Student</span>
			<span class="pull-right-container">
			   <span class="label label-primary pull-right">
			  <?php 
			  $con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
			  $query =$con->query("SELECT * FROM std_inout_entry where status='OUT'");
			  echo $query->rowCount();
			  ?></span></a>
			</span>
			</li>
            <li><a href="vst_inoutentry.php"><i class="fa fa-circle-o"></i>Visitor's In/Out</a></li>
			<li><a href="showin_vst.php"><i class="fa fa-circle-o"></i><span>In Visitor</span>
			<span class="pull-right-container">
			   <span class="label label-primary pull-right">
			  <?php 
			  $con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
			  $query =$con->query("SELECT * FROM vstr_inout_entry where status='IN'");
			  echo $query->rowCount();
			  ?></span></a>
			</span>
			</li>
          </ul>
        </li>
        <li>
          <a href="std_room_change_request.php">
            <i class="fa fa-hotel"></i> <span>Room Change Request</span>
            <span class="pull-right-container">
			   <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-bank"></i> <span>Check Room Status</span>
            <span class="pull-right-container">
			   <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="checkroomstatus_byroomno.php"><i class="fa fa-circle-o"></i>By Room No</a></li>
            <li><a href="checkroomstatus_all.php"><i class="fa fa-circle-o"></i>All Room No</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>