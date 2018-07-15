<?php 
include('studenttools/topfile.php');
echo "<title>Student| Mess Menu</title>";
?>

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
<?php
include('studenttools/header.php');
include('studenttools/dashboard.php');
echo "<div>";
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
	   <br>
    <section class="content-header">
      <h1>
        Mess Menu
      </h1>
  <br>
  <br>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
       <div class="col-md-2"></div>        
		<div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Menu and Rate</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	  <?php 
	  	$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 $sql=("SELECT *FROM messentry");
			 $query =$con->query($sql);
			 $i=1;
			 while($res=$query->fetch())
			 {
				 
                 echo "<li data-target="."#carousel-example-generic"." data-slide-to=".$i."></li>";
				 $i++;
			 }
			 ?>
                </ol>
				<div class="carousel-inner">
				  <div class="item active">
				    <div class="col-md-4"></div>
                     <div class="col-md-4 col-sm-3 col-xs-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                             <h4>Name of Food Item</h4> 
                            </div>
                            <div class="panel-body">
                                 <br>
                               <ul class="plan">      
                                   <p class="price"><b>Price </b> <i class="fa fa-inr"></i></p>
								   <br> 
                            <li><strong></strong> Food Item Descriptions</li><br><br>
                           </ul>
                            </div>
                            <div class="panel-footer">
                                <a href="#" class="btn btn-primary ">Status</a>
                            </div>
                        </div>
                        </div>
						<br>
                    <div class="carousel-caption">
                      
                    </div>
                  </div>
					<?php 
							$con=new PDO ("mysql:host=localhost;dbname=hmsportal","root","");
							$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql=("SELECT *FROM messentry");
							$query =$con->query($sql);
							while($res=$query->fetch())
								{
								print('<div class="item">');
								print('<div class="col-md-4"></div>');
								print('<div class="col-md-4 col-sm-4 col-xs-6">');
								print('<div class="panel panel-primary">');
								print('<div class="panel-heading"><br>');
								echo			"<h4>".$res['fooditem']."</h4>"; 
								echo		"</div>";
                                print('<div class="panel-body">');
                                print('<ul class="plan">');      
                                echo              "<p class="."price"."><b>".$res['price'] ." "."</b>";
								print('<i class="fa fa-inr"></i></p>');
                                echo              "<li><strong></strong>".$res['description']."</li><br><br>";
                                echo             "</ul>";
                                echo            "</div>";
                                print('<div class="panel-footer">');
                                print('<a href="#" class="btn btn-primary ">Available</a>');
                                echo             "</div>";
                                echo           "</div>";
                                echo         "</div>";
						        echo           "<br>";
				                echo           "<br>";
                                echo    "<div class="."carousel-caption".">";
                                echo     "</div>";
                                echo    "</div>";
				 
								}
						?>
                </div>
				<br>
				<br>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
	<!-- Sectin .content End -->
	</div>
	<!-- /.content-wrapper  end here--> 
  <?php 
	include('studenttools/footer.php');
	include('studenttools/bottomfile.php');
	?>
	</div>
</body>
</html>
		
		