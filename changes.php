///changes in the functions////////////////////
<?php
function essentialsubjects(){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
	  <?php
		top_header();
		
		side_bar();
	  ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Schools</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
		  <!-- left column -->
            <div class="col-md-6">
			<div style="height:45;"><br/><br/><br/><br/></div>
            <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Provide subject offered</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form role="form" action="index.php?action=insertessentials" method="POST">
                  <div class="box-body">
				  <div class="form-group">
                      <label>Select Course</label>
                      <select class="form-control" name="idcourse" Required="true">
                        
						<?php 
						include('db_connect.php');
							$query_course = mysqli_query($con,"SELECT * FROM course");
							if(mysqli_num_rows($query_course)>0){
								while($rows = mysqli_fetch_array($query_course)){
									$idcourse = $rows['idcourse'];
									$name = $rows['name'];
									
							?>
							<option value="<?php echo $idcourse; ?>"><?php echo $name; ?></option>
							<?php
								}
							
							}
						?>
                        
                      </select>
                    </div>
				
					<div class="form-group">
                  
                      <div id="dynamicInput">
					<label>Select Essential subjects</label>
                    <select class="form-control" name="essentialname" Required="true">
                        
						<?php 
						include('db_connect.php');
							$query_college = mysqli_query($con,'SELECT * FROM subject');
							if(mysqli_num_rows($query_college)>0){
								while($rows = mysqli_fetch_array($query_college)){
									$idsubject = $rows['idsubject'];
									$name = $rows['name'];
									
							?>
							<option value='<?php echo $name; ?>'><?php echo $name; ?></option>
							<?php
								}
							
							}
						?>
                        
                      </select>
         
						</div>
							<input type="button" value="Add subject" onClick="addInput('dynamicInput');">
							 <script>
								var counter = 1;
								var limit = 10;
								function addInput(divName){
									 if (counter == limit)  {
										  alert("You have reached the limit of adding " + counter + " inputs");
									 }
									 else {
										  var newdiv = document.createElement('div');
								newdiv.innerHTML = "<input type='hidden' value='"+(counter + 1)+"' name='tot' ><label>Select subject</label> " + (counter + 1) + " <br><select class='form-control' name='essentialname"+(counter + 1)+"' Required='true'><?php $query_college = mysqli_query($con,'SELECT * FROM subject'); if(mysqli_num_rows($query_college)>0){while($rows = mysqli_fetch_array($query_college)){$idsubject = $rows['idsubject'];$name = $rows['name'];?> <option value='<?php echo $name; ?>'> <?php echo $name; ?></option>  <?php }  }?></select>";
										  //var total = (counter + 1);
										  
										  document.getElementById(divName).appendChild(newdiv);
										  counter++;
									 }
								}
								</script> 
                    </div>
					
				  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
			</div><!-- /.left column -->
			<div class="col-md-6">
			<div style="height:45;"><br/><br/><br/><br/></div>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View of registered Subjects</h3>
                  <!--<div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                      <li><a href="#">&laquo;</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">&raquo;</a></li>
                    </ul>
                  </div>-->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table">
                    <tr>
                   
					  <th>Course Name</th>
                      <th>Relevant Subj</th>
                     <th>Essential Subj</th>
                       <th>Action</th>
                    </tr>
					<?php 
					include('db_connect.php');
					$query = mysqli_query($con,"SELECT * FROM course");
					if(mysqli_num_rows($query)>0){
						while($row = mysqli_fetch_array($query)){
							$idcourse = $row['idcourse'];
							$name = $row['name'];
							
							
					?>
					<tr>
                      
                      <td><?php echo $name; ?></td>
					  <td><?php 
					  $sel = mysqli_query($con,"SELECT * FROM essential WHERE idessential='$idcourse'");
						$course = mysqli_fetch_array($sel);
						$essential = $course['name'];
											
					  echo $essential;
					  ?></td>
					  
                      <td><?php
						$select = mysqli_query($con,"SELECT * FROM relevant WHERE idrelevant='$idcourse'");
						$relevant = mysqli_fetch_array($select);
					  echo $relevant['name'];
					  ?></td>
                      <td>
                       <a href="#"> <i class="fa fa-edit"></i> </a>
                        <i class="fa fa-trash-o"></i>
					  </td>
                    </tr>	
					<?php
						}
					
					}
					?>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			</div><!-- /.col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php 
		footer();
		
		side_control();
	  ?>
      

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>    
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>    
    
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
<?php
}
?>

<?php
function addrelevantsubject(){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
	  <?php
		top_header();
		
		side_bar();
	  ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Schools</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
		  <!-- left column -->
            <div class="col-md-6">
			<div style="height:45;"><br/><br/><br/><br/></div>
            <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Provide subject offered</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form role="form" action="index.php?action=insertrelevant" method="POST">
                  <div class="box-body">
				  <div class="form-group">
                      <label>Select Course</label>
                      <select class="form-control" name="idcourse" Required="true">
                        
						<?php 
						include('db_connect.php');
							$query_course = mysqli_query($con,"SELECT * FROM course");
							if(mysqli_num_rows($query_course)>0){
								while($rows = mysqli_fetch_array($query_course)){
									$idcourse = $rows['idcourse'];
									$name = $rows['name'];
									
							?>
							<option value="<?php echo $idcourse; ?>"><?php echo $name; ?></option>
							<?php
								}
							
							}
						?>
                        
                      </select>
                    </div>
				
					<div class="form-group">
                  
                      <div id="dynamicInput">
					<label>Select Relevant subject</label>
                    <select class="form-control" name="relevantname" Required="true">
                        
						<?php 
						include('db_connect.php');
							$query_college = mysqli_query($con,'SELECT * FROM subject');
							if(mysqli_num_rows($query_college)>0){
								while($rows = mysqli_fetch_array($query_college)){
									$idsubject = $rows['idsubject'];
									$name = $rows['name'];
									
							?>
							<option value='<?php echo $name; ?>'><?php echo $name; ?></option>
							<?php
								}
							
							}
						?>
                        
                      </select>
         
						</div>
							<input type="button" value="Add subject" onClick="addInput('dynamicInput');">
							 <script>
								var counter = 1;
								var limit = 10;
								function addInput(divName){
									 if (counter == limit)  {
										  alert("You have reached the limit of adding " + counter + " inputs");
									 }
									 else {
										  var newdiv = document.createElement('div');
								newdiv.innerHTML = "<input type='hidden' value='"+(counter + 1)+"' name='tot' ><label>Select subject</label> " + (counter + 1) + " <br><select class='form-control' name='relevantname"+(counter + 1)+"' Required='true'><?php $query_college = mysqli_query($con,'SELECT * FROM subject'); if(mysqli_num_rows($query_college)>0){while($rows = mysqli_fetch_array($query_college)){$idsubject = $rows['idsubject'];$name = $rows['name'];?> <option value='<?php echo $name; ?>'> <?php echo $name; ?></option>  <?php }  }?></select>";
										  //var total = (counter + 1);
										  
										  document.getElementById(divName).appendChild(newdiv);
										  counter++;
									 }
								}
								</script> 
                    </div>
					
				  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
			</div><!-- /.left column -->
			<div class="col-md-6">
			<div style="height:45;"><br/><br/><br/><br/></div>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View of registered Subjects</h3>
                  <!--<div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                      <li><a href="#">&laquo;</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">&raquo;</a></li>
                    </ul>
                  </div>-->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table">
                    <tr>
                   
					  <th>Course Name</th>
                      <th>Relevant Subj</th>
                     <th>Essential Subj</th>
                       <th>Action</th>
                    </tr>
					<?php 
					include('db_connect.php');
					$query = mysqli_query($con,"SELECT * FROM course");
					if(mysqli_num_rows($query)>0){
						while($row = mysqli_fetch_array($query)){
							$idcourse = $row['idcourse'];
							$name = $row['name'];
							
							
					?>
					<tr>
                      
                      <td><?php echo $name; ?></td>
					  <td><?php 
					  $sel = mysqli_query($con,"SELECT * FROM essential WHERE idessential='$idcourse'");
						$course = mysqli_fetch_array($sel);
						$essential = $course['name'];
											
					  echo $essential;
					  ?></td>
					  
                      <td><?php
						$select = mysqli_query($con,"SELECT * FROM relevant WHERE idrelevant='$idcourse'");
						$relevant = mysqli_fetch_array($select);
					  echo $relevant['name'];
					  ?></td>
                      <td>
                       <a href="#"> <i class="fa fa-edit"></i> </a>
                        <i class="fa fa-trash-o"></i>
					  </td>
                    </tr>	
					<?php
						}
					
					}
					?>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			</div><!-- /.col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php 
		footer();
		
		side_control();
	  ?>
      

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>    
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>    
    
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
<?php
}
?>

<?php
function addsubject(){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
	  <?php
		top_header();
		
		side_bar();
	  ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Schools</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
		  <!-- left column -->
            <div class="col-md-6">
			<div style="height:45;"><br/><br/><br/><br/></div>
            <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Enter new subject</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form role="form" action="index.php?action=addnewsubject" method="POST">
                  <div class="box-body">
				 
					<div class="form-group">
					  <label for="exampleInputEmail1">Subject Name</label>
                      <input type="text" name="subjectname" Required="true" class="form-control" id="exampleInputEmail1">
                    </div>
					
                     
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
			</div><!-- /.left column -->
			<div class="col-md-6">
			<div style="height:45;"><br/><br/><br/><br/></div>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View of registered Subjects</h3>
                  <!--<div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                      <li><a href="#">&laquo;</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">&raquo;</a></li>
                    </ul>
                  </div>-->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table">
                    <tr>
                   
					  <th>Course Name</th>
                      <th>Relevant Subj</th>
                     <th>Essential Subj</th>
                       <th>Action</th>
                    </tr>
					<?php 
					include('db_connect.php');
					$query = mysqli_query($con,"SELECT * FROM course");
					if(mysqli_num_rows($query)>0){
						while($row = mysqli_fetch_array($query)){
							$idcourse = $row['idcourse'];
							$name = $row['name'];
							
							
					?>
					<tr>
                      
                      <td><?php echo $name; ?></td>
					  <td><?php 
					  $sel = mysqli_query($con,"SELECT * FROM essential WHERE idessential='$idcourse'");
						$course = mysqli_fetch_array($sel);
						$essential = $course['name'];
											
					  echo $essential;
					  ?></td>
					  
                      <td><?php
						$select = mysqli_query($con,"SELECT * FROM relevant WHERE idrelevant='$idcourse'");
						$relevant = mysqli_fetch_array($select);
					  echo $relevant['name'];
					  ?></td>
                      <td>
                       <a href="#"> <i class="fa fa-edit"></i> </a>
                        <i class="fa fa-trash-o"></i>
					  </td>
                    </tr>	
					<?php
						}
					
					}
					?>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			</div><!-- /.col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php 
		footer();
		
		side_control();
	  ?>
      

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>    
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>    
    
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
<?php
}
?>
<?php
function opportunity(){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
	  <?php
		top_header();
		
		side_bar();
	  ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Schools</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
		  <!-- left column -->
            <div class="col-md-6">
			<div style="height:45;"><br/><br/><br/><br/></div>
            <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add opportunites for courses</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form role="form" action="index.php?action=insertopportunity" method="POST">
                  <div class="box-body">
				  <div class="form-group">
                      <label>Select Course</label>
                      <select class="form-control" name="idcourse" Required="true">
                        
						<?php 
						include('db_connect.php');
							$query_course = mysqli_query($con,"SELECT * FROM course");
							if(mysqli_num_rows($query_course)>0){
								while($rows = mysqli_fetch_array($query_course)){
									$idcourse = $rows['idcourse'];
									$name = $rows['name'];
									
							?>
							<option value="<?php echo $idcourse; ?>"><?php echo $name; ?></option>
							<?php
								}
							
							}
						?>
                        
                      </select>
                    </div>
				
					<div class="form-group">
				
                      <div id="dynamicInput">
					<label for="exampleInputEmail1">Enter opportunity</label>
                      <input type="text" name="opportunityname" Required="true" class="form-control" id="exampleInputEmail1">
					
						</div>
							<input type="button" value="Add opportunity" onClick="addInput('dynamicInput');">
							 <script>
								var counter = 1;
								var limit = 10;
								function addInput(divName){
									 if (counter == limit)  {
										  alert("You have reached the limit of adding " + counter + " inputs");
									 }
									 else {
										  var newdiv = document.createElement('div');
								newdiv.innerHTML = "<input type='hidden' value='"+(counter + 1)+"' name='tot' ><label>Opportunity</label> " + (counter + 1) + " <br><input type='text'name='opportunityname"+(counter + 1)+"' Required='true'>";
										  //var total = (counter + 1);
										  
										  document.getElementById(divName).appendChild(newdiv);
										  counter++;
									 }
								}
								</script> 
                    </div>
					
				  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
			</div><!-- /.left column -->
			<div class="col-md-6">
			<div style="height:45;"><br/><br/><br/><br/></div>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View opportunites</h3>
                  <!--<div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                      <li><a href="#">&laquo;</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">&raquo;</a></li>
                    </ul>
                  </div>-->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table">
                    <tr>
                   
					  <th>Course Name</th>
                      <th>Relevant Subj</th>
                     <th>Essential Subj</th>
                       <th>Action</th>
                    </tr>
					<?php 
					include('db_connect.php');
					$query = mysqli_query($con,"SELECT * FROM course");
					if(mysqli_num_rows($query)>0){
						while($row = mysqli_fetch_array($query)){
							$idcourse = $row['idcourse'];
							$name = $row['name'];
							
							
					?>
					<tr>
                      
                      <td><?php echo $name; ?></td>
					  <td><?php 
					  $sel = mysqli_query($con,"SELECT * FROM essential WHERE idessential='$idcourse'");
						$course = mysqli_fetch_array($sel);
						$essential = $course['name'];
											
					  echo $essential;
					  ?></td>
					  
                      <td><?php
						$select = mysqli_query($con,"SELECT * FROM relevant WHERE idrelevant='$idcourse'");
						$relevant = mysqli_fetch_array($select);
					  echo $relevant['name'];
					  ?></td>
                      <td>
                       <a href="#"> <i class="fa fa-edit"></i> </a>
                        <i class="fa fa-trash-o"></i>
					  </td>
                    </tr>	
					<?php
						}
					
					}
					?>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			</div><!-- /.col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php 
		footer();
		
		side_control();
	  ?>
      

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>    
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>    
    
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
<?php
}
?>
/////////////////////////////////changes in the calls/////////////////////
			case"subjects";
			if(isset($_SESSION['userId']))
				addsubject();
			else
				Login();
				break;
				
			
				
			case"addessentials";
			if(isset($_SESSION['userId']))
				essentialsubjects();
			else
				Login();
			break;
			
			case"insertessentials";
			if(isset($_SESSION['userId']))
				insertessentials();
			else
				Login();
			break;
			
			
			case"addrelevantsubject";
			if(isset($_SESSION['userId']))
				addrelevantsubject();
			else
				Login();
			break;
			
			case"insertrelevant";
			if(isset($_SESSION['userId']))
				insertrelevant();
			else
				Login();
			break;
			
			case"opportunity";
			if(isset($_SESSION['userId']))
				opportunity();
			else
				Login();
			break;
			
			case"insertopportunity";
			if(isset($_SESSION['userId']))
				insertopportunity();
			else
				Login();
			break;
			
			
			
			case"insertnewsubject";
			if(isset($_SESSION['userId']))
				insertnewsubject();
			
			else
				Login();
				break;
				
/////changes in the includes/////////////////
				
				<li><a href="index.php?action=subjects"><i class="fa fa-circle-o"></i> Add subjects</a></li>
				<li><a href="index.php?action=addessentials"><i class="fa fa-circle-o"></i> Add Essential subjects</a></li>
				<li><a href="index.php?action=addrelevantsubject"><i class="fa fa-circle-o"></i> Add Relevant subjects</a></li>
				<li><a href="index.php?action=opportunity"><i class="fa fa-circle-o"></i> Opportunites</a></li>
				
/////////////////// changes in the DBfunctions///////////////////////////
<?php
function insertessentials(){
	include('db_connect.php');
	if(isset($_POST['submit'])){
	//$idessential = $_POST['idessential'];
	
	$tot = $_POST['tot'];
	//echo $tot;
	$idcourse = $_POST['idcourse'];
	$essentialname = $_POST['essentialname'];
	
		$insert1 = mysqli_query($con,"INSERT INTO essential (idessential,name,idcourse) 
			VALUES('','$essentialname','$idcourse')");
	
	for($i=2; $i<=$tot; $i++){
		$new_essentialname = $_POST['essentialname'.$i];	
		$insert2 = mysqli_query($con,"INSERT INTO essential (idessential,name,idcourse) 
			VALUES('','$new_essentialname','$idcourse')");
	}
			
			if($insert1 && $insert2 ){
				echo '<meta content="1;index.php?action=Courses" http-equiv="refresh" />';
			}else{
				echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
				echo "nah sucess ".mysqli_error($con);
			}
	
	
	}
	
}

?>


<?php
function insertrelevant(){
	include('db_connect.php');
	if(isset($_POST['submit'])){
	//$idessential = $_POST['idessential'];
	
	$tot = $_POST['tot'];
	//echo $tot;
	$idcourse = $_POST['idcourse'];
	$relevantname = $_POST['relevantname'];
	
		$insert1 = mysqli_query($con,"INSERT INTO relevant (idrelevant,name,idcourse) 
			VALUES('','$relevantname','$idcourse')");
	
	for($i=2; $i<=$tot; $i++){
		$new_relevantname = $_POST['relevantname'.$i];	
		$insert2 = mysqli_query($con,"INSERT INTO relevant (idrelevant,name,idcourse) 
			VALUES('','$new_relevantname','$idcourse')");
	}
			
			if($insert1 && $insert2 ){
				echo '<meta content="1;index.php?action=Courses" http-equiv="refresh" />';
			}else{
				echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
				echo "nah sucess ".mysqli_error($con);
			}
	
	
	}
	
}

?>
<?php
function insertopportunity(){
	include('db_connect.php');
	if(isset($_POST['submit'])){
	//$idessential = $_POST['idessential'];
	
	$tot = $_POST['tot'];
	//echo $tot;
	$idcourse = $_POST['idcourse'];
	$opportunityname = $_POST['opportunityname'];
	
		$insert1 = mysqli_query($con,"INSERT INTO opportunity (idopportunity,name,idcourse) 
			VALUES('','$opportunityname','$idcourse')");
	
	for($i=2; $i<=$tot; $i++){
		$new_opportunityname = $_POST['opportunityname'.$i];	
		$insert2 = mysqli_query($con,"INSERT INTO opportunity (idopportunity,name,idcourse) 
			VALUES('','$new_opportunityname','$idcourse')");
	}
			
			if($insert1 && $insert2 ){
				echo '<meta content="1;index.php?action=Courses" http-equiv="refresh" />';
			}else{
				echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
				echo "nah sucess ".mysqli_error($con);
			}
	
	
	}
	
	
	
}?>





