<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Request | </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
	  <!-- menu item start ------------------------->
	 
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a>
            </div>
          <!--- side menu bar --->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Dashboard</h3>
                <ul class="nav side-menu">
                   <li class="active treeview"></li>
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>  
		<!---- menu item end ----->

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <h3><center>Student's Hostel Accomodation Request Form</center></h3>
                    <!-- Tabs -->
                    <div id="wizard_verticle" class="form_wizard wizard_verticle">
                      <ul class="list-unstyled wizard_steps">
                        <li>
                          <a href="#step-11">
                            <span class="step_no">1.</span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-22">
                            <span class="step_no">2.</span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-33">
                            <span class="step_no">3.</span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-44">
                            <span class="step_no">4.</span>
                          </a>
                        </li>
                      </ul>

                      <div id="step-11">
                        <h2 class="StepTitle">Step 1 </h2>
                        <div class="form-horizontal">

                          <span class="section">Addmission Details</span>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="first-name">Admn/Reg No: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="first-name">Admn/Reg Date <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="first-name">Branch: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Caste/Community: <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                               <select id="gender" name="gender" class="form-control col-md-7 col-xs-12">
                                    <option value="">-select-</option>
                                    <option value="Female">General</option>
                                    <option value="Male">OBC</option>  
									<option value="Male">SC</option>
									<option value="Male">ST</option>									
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Religon: <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                               <select id="gender" name="gender" class="form-control col-md-7 col-xs-12">
                                    <option value="">-select-</option>
                                    <option value="Female">Hindu</option>
                                    <option value="Male">Muslim</option>
									<option value="Male">Christian</option> 									
                                </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="step-22">
                        <h2 class="StepTitle">Step 2 </h2>
                        <div class="form-horizontal form-label-left">

                          <span class="section">Basic Details</span>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="first-name">First Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="last-name">Last Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="last-name2" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Gender <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                               <select id="gender" name="gender" class="form-control col-md-7 col-xs-12">
                                    <option value="">-select-</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>                 
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">Date Of Birth <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input id="birthday2" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="first-name">Mobile No. <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="first-name">Email ID <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
						  </div>
                      </div>
                      <div id="step-33">
                        <h2 class="StepTitle">Step 3 Content</h2>
                        <div class="form-horizontal form-label-left">

                          <span class="section">Communication Details</span>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="first-name">Locality Name: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="last-name">Landmark Name: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="last-name2" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">District: <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                               <select id="gender" name="gender" class="form-control col-md-7 col-xs-12">
                                    <option value="">-select-</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>                 
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">State: <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                               <select id="gender" name="gender" class="form-control col-md-7 col-xs-12">
                                    <option value="">-select-</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>                 
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="first-name">PIN Code <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
						  </div>
                      </div>
                      <div id="step-44">
                        <h2 class="StepTitle">Step 4 </h2>
                        <div class="form-horizontal form-label-left">

                          <span class="section">Parents Details</span>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="first-name">First Name: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="last-name">Last Name: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="last-name2" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="first-name">Mobile No. <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="first-name">Email ID <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <span class="section">Communication Details</span>
						  
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="first-name">Locality Name: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="last-name">Landmark Name: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="last-name2" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
						  
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">District: <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                               <select id="gender" name="gender" class="form-control col-md-7 col-xs-12">
                                    <option value="">-select-</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>                 
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">State: <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                               <select id="gender" name="gender" class="form-control col-md-7 col-xs-12">
                                    <option value="">-select-</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>                 
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3" for="first-name">PIN Code <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                              <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
						  </div>
                      </div>
                    </div>
                    <!-- End SmartWizard Content -->
                  </div>
                </div>
              </div>
			  
			  
			  
			  
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <!-- jQuery Smart Wizard -->
    <script>
      $(document).ready(function() {
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
          transitionEffect: 'slide'
        });

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
      });
    </script>
    <!-- /jQuery Smart Wizard -->
  </body>
</html>