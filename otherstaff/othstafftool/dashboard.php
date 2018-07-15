<?php 
function createPassword($length)
{
	$chars="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
	srand((double)microtime()*1000000);
	$i=0;
	$pass='M-';
	while($i<($length-1))
	{
		$num=rand()%33;
		$tmp=substr($chars,$num,1);
		$pass=$pass.$tmp;
		$i++;
	}
	return $pass;
}
$minvno=createPassword(11);

function createLCode($length)
{
	$chars="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
	srand((double)microtime()*1000000);
	$i=0;
	$pass='L-';
	while($i<($length-1))
	{
		$num=rand()%33;
		$tmp=substr($chars,$num,1);
		$pass=$pass.$tmp;
		$i++;
	}
	return $pass;
}
$linvno=createLCode(11);
?>   
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="active treeview">
          <a href="osmain.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Mess</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="messentry.php"><i class="fa fa-circle-o"></i> Mess Item Entry</a></li>
			<li><a href="messitem_list.php"><i class="fa fa-circle-o"></i> Mess Item List</a></li>
            <li><a href="messservice.php?invoiceno=<?php echo $minvno ?>"><i class="fa fa-circle-o"></i> Service</a></li>
			<li><a href="show_last_mess_invoice.php"><i class="fa fa-circle-o"></i> Last Invoice No.</a></li>
			<li><a href="show_individual_mess_invoice.php"><i class="fa fa-circle-o"></i> Search Invoice by No.</a></li>
			<li><a href="show_individual_mess_bill_list.php"><i class="fa fa-circle-o"></i> Student Invoice List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Laundary</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="laundaryentry.php"><i class="fa fa-circle-o"></i> Laundry Entry</a></li>
			<li><a href="laundryitem_list.php"><i class="fa fa-circle-o"></i> Laundry Item List</a></li>
            <li><a href="laundaryservice.php?invoiceno=<?php echo $linvno ?>"><i class="fa fa-circle-o"></i> Service</a></li>
			<li><a href="show_last_laundry_invoice.php"><i class="fa fa-circle-o"></i> Last Invoice No.</a></li>
			<li><a href="shownewdelivery.php"><i class="fa fa-circle-o"></i><span>Upcoming Delivery</span>
			<span class="pull-right-container">
			   <span class="label label-primary pull-right">
			  <?php 
			  $con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
			  $query =$con->query("SELECT * FROM laundry_invoice where status='Not Delivered'");
			  echo $query->rowCount();
			  ?></span></a>
			</span>
			</li>
			<li><a href="show_individual_laundry_invoice.php"><i class="fa fa-circle-o"></i> Search Invoice by No.</a></li>
			<li><a href="show_individual_laundry_bill_list.php"><i class="fa fa-circle-o"></i> Student Invoice List</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>