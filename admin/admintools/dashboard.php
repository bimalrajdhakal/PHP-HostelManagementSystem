 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="active treeview">
          <a href="./adminmain.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sticky-note"></i>
            <span>Accomodation Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="std_newrequest.php"><i class="fa fa-circle-o"></i>Student's Request</a></li>
            <li><a href="vst_newrequest.php"><i class="fa fa-circle-o"></i>Visitor's Request</a></li>
          </ul>
        </li>
        <li>
          <a href="user_manage.php">
            <i class="fa fa-users"></i> <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
		
        <li class="treeview">
          <a href="hostel_manage.php">
            <i class="fa fa-bank"></i>
            <span>Hostel Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Complaints</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="std_complaints_new_list.php"><i class="fa fa-circle-o"></i> Student</a></li>
            <li><a href="wrdn_complaints_forwarded_list.php"><i class="fa fa-circle-o"></i> Warden</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Mail Box</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="public_mail_contact.php"><i class="fa fa-circle-o"></i> Public Contacts</a></li>
            <li><a href="public_feedback.php"><i class="fa fa-circle-o"></i> Public Grivances</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Notification Entry</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="notification_event_home.php"><i class="fa fa-circle-o"></i> Events</a></li>
            <li><a href="notification_news_home.php"><i class="fa fa-circle-o"></i> News</a></li>
          </ul>
        </li>
        <li>
          <a href="managebillfactor.php">
            <i class="fa fa-edit"></i> <span>Manage Bill Factor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li>
          <a href="generate_monthlybill_hostel.php">
            <i class="fa fa-calculator"></i> <span>Generate MHB</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-money"></i> <span>Payments</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="check_std_payments_history.php"><i class="fa fa-circle-o"></i> Check Student's Payments</a></li>
			<li><a href="receive_std_payments.php"><i class="fa fa-circle-o"></i> Receive Student's Payments</a></li>
			<li><a href="hostel_wise_std_payment.php"><i class="fa fa-circle-o"></i> List of Bill Paid Students</a></li>
			<li><a href="unpaid_hostel_wise_std_payment.php"><i class="fa fa-circle-o"></i> List of Bill Unpaid Students</a></li>
			<li><a href="hostel_wise_all_std_payment.php"><i class="fa fa-circle-o"></i> List of All Students Payments</a></li>
           <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Guest's Payments</a></li> -->
          </ul>
        </li>		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>