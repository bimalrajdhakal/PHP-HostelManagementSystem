<?php
date_default_timezone_set('Asia/Kolkata');

?>




	<div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="../index.php">HMS Portal</a>
                    <div class="nav-collapse collapse">                        
                        <ul class="nav">
                            <li class="active">
                                <a href="vstrmain.php">Dashboard</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">HMS <b class="caret"></b>

                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li>
                                        <a href="../index.php">Home <i class="icon-arrow-right"></i></a>										
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Visitors Services <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="vstreq.php">Request</a>
                                    </li>
									<li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="vstrchksts.php">Check Status</a>
                                    </li>
									<li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="vstrhstlchk.php">Check Availability</a>
                                    </li>
										<li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="#">View Bills</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
		</div>
	
	<!-- Top navigation bar End  -->