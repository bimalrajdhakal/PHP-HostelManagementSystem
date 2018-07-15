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
    <a href="./osmain.php" class="logo">
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