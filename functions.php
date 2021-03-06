<?php //includes
include('includes.php');
?>


<?php // login function
function Login(){
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index2.html"><b>Admin</b>Panel</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="index.php?action=authenticate" method="POST">
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="signIn" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <!--<p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>/.social-auth-links -->
        </div> 

        <a href="#">I forgot my password</a><br>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>

<?php 
}
?>


<?php //authenticate function
function authenticate(){
	
	include('db_connect.php');

	if(isset($_POST['signIn'])){
		
		$password = $_POST["password"];
		$email = $_POST["email"];
		
		if($password=="" && $email==""){
			$_SESSION['userId'] = 1;
			echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
			
		}else{
			
		$password = md5($password);
		$result = mysqli_query($connect,"SELECT * FROM user WHERE email='$email' AND passWord='$password'")or die(mysqli_error($connect));
		
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){
			
				$_SESSION['Firstname'] = $row['firstName'];
				$_SESSION['Lastname'] = $row['lastName'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['username'] = $row['userName'];
				//$_SESSION['image'] = $row['image'];
				$_SESSION['userId'] = $row['userId'];
				//$_SESSION['title'] = $row['Title'];
			}
			
			echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
		}else{
		//$password = md5($password);
		$result2 = mysqli_query($connect,"SELECT * FROM user WHERE userName='$email' AND passWord='$password'")or die(mysqli_error($connect));
			if(mysqli_num_rows($result2) > 0){
				while($row = mysqli_fetch_array($result)){
				
					$_SESSION['Firstname'] = $row['firstName'];
					$_SESSION['Lastname'] = $row['lastName'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['username'] = $row['userName'];
					//$_SESSION['image'] = $row['image'];
					$_SESSION['userId'] = $row['userId'];
					//$_SESSION['title'] = $row['Title'];
				}
				
				echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';				
			}else{
				echo '<meta content="1;index.php?action=Login" http-equiv="refresh" />';
			}
		}
		}
		
	}
}
?>


<?php //dashboard index
function index(){

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
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              



              
              

            </section><!-- /.Left col -->
           
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


<?php //add university form
function Universities(){

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
            <li class="active">Universties</li>
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
                  <h3 class="box-title">University Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form role="form" action="index.php?action=insertUniversity" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">University Name</label>
                      <input type="text" name="name" Required="true" class="form-control" id="exampleInputEmail1" placeholder="Enter University Name">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" name="email" Required="true" class="form-control" id="exampleInputEmail1" placeholder="Enter Email address">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Phone Number</label>
                      <input type="text" name="phone_no" Required="true" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Box Number</label>
                      <input type="text" name="box_no" Required="true" class="form-control" id="exampleInputEmail1" placeholder="Enter Box Number">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Location</label>
                      <input type="text" name="location" Required="true" class="form-control" id="exampleInputPassword1" placeholder="Location">
                    </div>
                    <div class="form-group">
                      <label>Details</label>
                      <textarea class="form-control" name="details" Required="true" rows="3" placeholder="Enter Details..."></textarea>
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
                  <h3 class="box-title">List of registered Universties</h3>
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
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Box Number</th>
					   <th>Action</th>
                    </tr>
					<?php 
					include('db_connect.php');
					$query = mysqli_query($con,"SELECT * FROM university");
					if(mysqli_num_rows($query)>0){
						while($row = mysqli_fetch_array($query)){
							$iduniversity = $row['iduniversity'];
							$name = $row['name'];
							$email = $row['email'];
							$phone_no = $row['phone_no'];
							$box_no = $row['box_no'];
					?>
					<tr>
                      <td><?php echo $iduniversity; ?>.</td>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $email;?></td>
                      <td><?php echo $phone_no; ?></td>
                      <td><?php echo $box_no; ?></td>
                      <td>
                       <a href="#" id="myBtn"> <i class="fa fa-edit"></i> </a>
                        <a href="index.php?action=deleteUniversities&id=<?php echo $iduniversity;?>"> <i class="fa fa-trash-o"></i> </a>
					  </td>
                    </tr>

						<!-- The Modal -->
						<div id="myModal" class="modal">

						  <!-- Modal content -->
						  <div class="modal-content">
							<span class="close">×</span>
							<?php 
							$edit = mysqli_query($con,"select * from university where iduniversity='$iduniversity'");
							$university = mysqli_fetch_array($edit);
							?>
							<form role="form" action="index.php?action=editUniversities&id=<?php echo $iduniversity;?>" method="POST">
							  <div class="box-body">
								<div class="form-group">
								  <label for="exampleInputEmail1">University Name</label>
								  <input type="text" name="name" Required="true" class="form-control" id="exampleInputEmail1" value="<?php echo $university['name'];?>">
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Email address</label>
								  <input type="email" name="email" Required="true" class="form-control" id="exampleInputEmail1" value="<?php echo $university['email'];?>">
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Phone Number</label>
								  <input type="text" name="phone_no" Required="true" class="form-control" id="exampleInputEmail1" value="<?php echo $university['phone_no'];?>">
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Box Number</label>
								  <input type="text" name="box_no" Required="true" class="form-control" id="exampleInputEmail1" value="<?php echo $university['box_no'];?>">
								</div>
								<div class="form-group">
								  <label for="exampleInputPassword1">Location</label>
								  <input type="text" name="location" Required="true" class="form-control" id="exampleInputPassword1" value="<?php echo $university['location'];?>">
								</div>
								<div class="form-group">
								  <label>Details</label>
								  <textarea class="form-control" name="details" Required="true" rows="3"><?php echo $university['details'];?></textarea>
								</div>
							  </div><!-- /.box-body -->

							  <div class="box-footer">
								<button type="submit" name="submit" class="btn btn-primary">Update</button>
							  </div>
							</form>
						  </div>

						</div>	
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
<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 70px; /* Location of the box */
    padding-left: 400px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>

<script>
// Get the modal
var modal = document.getElementById('myModal');
// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

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


<?php //add college form
function Colleges(){

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
            <li class="active">Colleges</li>
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
                  <h3 class="box-title">College Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form role="form" action="index.php?action=insertColleges" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">College Name</label>
                      <input type="text" name="name" Required="true" class="form-control" id="exampleInputEmail1" placeholder="Enter College Name">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" name="email" Required="true" class="form-control" id="exampleInputEmail1" placeholder="Enter Email address">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Phone Number</label>
                      <input type="text" name="phone_no" Required="true" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Box Number</label>
                      <input type="text" name="box_no" Required="true" class="form-control" id="exampleInputEmail1" placeholder="Enter Box Number">
                    </div>
                     <div class="form-group">
                      <label>Select</label>
                      <select class="form-control" name="iduniversity" Required="true">
                        <option>Select University</option>
						<?php 
						include('db_connect.php');
							$query_university = mysqli_query($con,"SELECT * FROM university");
							if(mysqli_num_rows($query_university)>0){
								while($rows = mysqli_fetch_array($query_university)){
									$iduniversity = $rows['iduniversity'];
									$name = $rows['name'];
									
							?>
							<option value="<?php echo $iduniversity; ?>"><?php echo $name; ?></option>
							<?php
								}
							
							}
						?>
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Details</label>
                      <textarea class="form-control" name="details" Required="true" rows="3" placeholder="Enter Details..."></textarea>
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
                  <h3 class="box-title">List of registered Colleges</h3>
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
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>University</th>
                      <th>Phone Number</th>
                      <th>Box Number</th>
					   <th>Action</th>
                    </tr>
					<?php 
					include('db_connect.php');
					$query = mysqli_query($con,"SELECT * FROM college");
					if(mysqli_num_rows($query)>0){
						while($row = mysqli_fetch_array($query)){
							$idcollege = $row['idcollege'];
							$name = $row['name'];
							$email = $row['email'];
							$phone_no = $row['phone_no'];
							$box_no = $row['box_no'];
							$iduniversity = $row['iduniversity'];
					?>
					<tr>
                      <td><?php echo $idcollege; ?>.</td>
                      <td><?php echo $name; ?></td>
                      <td><?php
						$select = mysqli_query($con,"SELECT * FROM university WHERE iduniversity='$iduniversity'");
						$uni = mysqli_fetch_array($select);
					  echo $uni['name'];
					  ?></td>
                      <td><?php echo $phone_no; ?></td>
                      <td><?php echo $box_no; ?></td>
                      <td>
                       <a href="#" id="myBtn"> <i class="fa fa-edit"></i> </a>
                        <a href="index.php?action=deleteColleges&id=<?php echo $idcollege;?>"> <i class="fa fa-trash-o"></i> </a>
					  </td>
                    </tr>

						<!-- The Modal -->
						<div id="myModal" class="modal">

						  <!-- Modal content -->
						  <div class="modal-content">
							<span class="close">×</span>
							<?php 
							$edit = mysqli_query($con,"select * from college where idcollege='$idcollege'");
							$college = mysqli_fetch_array($edit);
							?>
							<form role="form" action="index.php?action=editColleges&id=<?php echo $idcollege;?>" method="POST">
							  <div class="box-body">
								<div class="form-group">
								  <label for="exampleInputEmail1">College Name</label>
								  <input type="text" name="name" Required="true" class="form-control" id="exampleInputEmail1" value="<?php echo $college['name'];?>">
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Email address</label>
								  <input type="email" name="email" Required="true" class="form-control" id="exampleInputEmail1" value="<?php echo $college['email'];?>">
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Phone Number</label>
								  <input type="text" name="phone_no" Required="true" class="form-control" id="exampleInputEmail1" value="<?php echo $college['name'];?>">
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Box Number</label>
								  <input type="text" name="box_no" Required="true" class="form-control" id="exampleInputEmail1" value="<?php echo $college['box_no'];?>">
								</div>
								 <div class="form-group">
								  <label>Select</label>
								  <select class="form-control" name="iduniversity" Required="true">
									<option>Select University</option>
									<?php 
									include('db_connect.php');
										$query_university = mysqli_query($con,"SELECT * FROM university");
										if(mysqli_num_rows($query_university)>0){
											while($rows = mysqli_fetch_array($query_university)){
												$iduniversity = $rows['iduniversity'];
												$name = $rows['name'];
												
										?>
										<option value="<?php echo $iduniversity; ?>"><?php echo $name; ?></option>
										<?php
											}
										
										}
									?>
									
								  </select>
								</div>
								<div class="form-group">
								  <label>Details</label>
								  <textarea class="form-control" name="details" Required="true" rows="3" ><?php echo $college['details'];?></textarea>
								</div>
							  </div><!-- /.box-body -->

							  <div class="box-footer">
								<button type="submit" name="submit" class="btn btn-primary">Update</button>
							  </div>
							</form>
						  </div>

						</div>	
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
<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 70px; /* Location of the box */
    padding-left: 400px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>

<script>
// Get the modal
var modal = document.getElementById('myModal');
// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script> 

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


<?php //add school forms
function Schools(){
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
                  <h3 class="box-title">School Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form role="form" action="index.php?action=insertSchools" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Scholl Name</label>
                      <input type="text" name="name" Required="true" class="form-control" id="exampleInputEmail1" placeholder="Enter Scholl Name">
                    </div>
					
                     <div class="form-group">
                      <label>Select</label>
                      <select class="form-control" name="idcollege" Required="true">
                        <option>Select College</option>
						<?php 
						include('db_connect.php');
							$query_college = mysqli_query($con,"SELECT * FROM college");
							if(mysqli_num_rows($query_college)>0){
								while($rows = mysqli_fetch_array($query_college)){
									$idcollege = $rows['idcollege'];
									$name = $rows['name'];
									
							?>
							<option value="<?php echo $idcollege; ?>"><?php echo $name; ?></option>
							<?php
								}
							
							}
						?>
                        
                      </select>
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
                  <h3 class="box-title">List of registered Schools</h3>
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
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>College</th>
                      <th>University</th>
					   <th>Action</th>
                    </tr>
					<?php 
					include('db_connect.php');
					$query = mysqli_query($con,"SELECT * FROM school");
					if(mysqli_num_rows($query)>0){
						while($row = mysqli_fetch_array($query)){
							$idschool = $row['idschool'];
							$name = $row['name'];
							$idcollege = $row['idcollege'];
							
					?>
					<tr>
                      <td><?php echo $idcollege; ?>.</td>
                      <td><?php echo $name; ?></td>
					  <td><?php 
					  $sel = mysqli_query($con,"SELECT * FROM college WHERE idcollege='$idcollege'");
						$coll = mysqli_fetch_array($sel);
						$college_name = $coll['name'];
						$iduniversity = $coll['iduniversity'];						
					  echo $college_name;
					  ?></td>
					  
                      <td><?php
						$select = mysqli_query($con,"SELECT * FROM university WHERE iduniversity='$iduniversity'");
						$uni = mysqli_fetch_array($select);
					  echo $uni['name'];
					  ?></td>
                      <td>
                       <a href="#" id="myBtn"> <i class="fa fa-edit"></i> </a>
                        <a href="index.php?action=deleteSchools&id=<?php echo $idschool;?>"> <i class="fa fa-trash-o"></i> </a>
					  </td>
                    </tr>

						<!-- The Modal -->
						<div id="myModal" class="modal">

						  <!-- Modal content -->
						  <div class="modal-content">
							<span class="close">×</span>
							<?php 
							$edit = mysqli_query($con,"select * from school where idschool='$idschool'");
							$school = mysqli_fetch_array($edit);
							?>
							<form role="form" action="index.php?action=editSchools&id=<?php echo $idschool;?>" method="POST">
							  <div class="box-body">
								<div class="form-group">
									  <label for="exampleInputEmail1">Scholl Name</label>
									  <input type="text" name="name" Required="true" class="form-control" id="exampleInputEmail1" value="<?php echo $school['name'];?>" >
									</div>
									
									 <div class="form-group">
									  <label>Select</label>
									  <select class="form-control" name="idcollege" Required="true">
										<option>Select College</option>
										<?php 
										include('db_connect.php');
											$query_college = mysqli_query($con,"SELECT * FROM college");
											if(mysqli_num_rows($query_college)>0){
												while($rows = mysqli_fetch_array($query_college)){
													$idcollege = $rows['idcollege'];
													$name = $rows['name'];
													
											?>
											<option value="<?php echo $idcollege; ?>"><?php echo $name; ?></option>
											<?php
												}
											
											}
										?>
										
									  </select>
									</div>
							  </div><!-- /.box-body -->

							  <div class="box-footer">
								<button type="submit" name="submit" class="btn btn-primary">Update</button>
							  </div>
							</form>
						  </div>

						</div>
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
<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 70px; /* Location of the box */
    padding-left: 400px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>

<script>
// Get the modal
var modal = document.getElementById('myModal');
// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

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


<?php //add courses form
function Courses(){
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
            <li class="active">Courses</li>
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
                  <h3 class="box-title">Course Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form role="form" action="index.php?action=insertCourses" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Course Name</label>
                      <input type="text" name="name" Required="true" class="form-control" id="exampleInputEmail1" placeholder="Enter Course Name">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Course Tuition</label>
                      <input type="text" name="tuition" Required="true" class="form-control" id="exampleInputEmail1" placeholder="Enter Course Tuition">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Course Duration</label>
                      <input type="text" name="duration" Required="true" class="form-control" id="exampleInputEmail1" placeholder="Enter Course Duration">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Pujab Cut-off-points</label>
                      <input type="text" name="cp_pujab" Required="true" class="form-control" id="exampleInputEmail1" placeholder="Enter Pujab Cut-off-points">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Private Cut-off-points</label>
                      <input type="text" name="cp_private" Required="true" class="form-control" id="exampleInputEmail1" placeholder="Enter Private Cut-off-points">
                    </div>
					
                     <div class="form-group">
                      <label>Select</label>
                      <select class="form-control" name="idschool" Required="true">
                        <option>Select School</option>
						<?php 
						include('db_connect.php');
							$query_school = mysqli_query($con,"SELECT * FROM school");
							if(mysqli_num_rows($query_school)>0){
								while($rows = mysqli_fetch_array($query_school)){
									$idschool = $rows['idschool'];
									$name = $rows['name'];
									
							?>
							<option value="<?php echo $idschool; ?>"><?php echo $name; ?></option>
							<?php
								}
							
							}
						?>
                        
                      </select>
                    </div>
					<div class="form-group">
                      <label>Details</label>
                      <textarea class="form-control" name="details" Required="true" rows="3" placeholder="Enter Details..."></textarea>
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
                  <h3 class="box-title">List of registered Courses</h3>
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
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>College</th>
                      <th>University</th>
                      <th>Tuition</th>
                      <th>Cut-off-points</th>
					   <th>Action</th>
                    </tr>
					<?php 
					include('db_connect.php');
					$query = mysqli_query($con,"SELECT * FROM course");
					if(mysqli_num_rows($query)>0){
						while($row = mysqli_fetch_array($query)){
							$idcourse = $row['idcourse'];
							$name = $row['name'];
							$idschool = $row['idschool'];
							$tuition = $row['tuition'];
							$cp_private = $row['cp_private'];
							$se = mysqli_query($con,"SELECT * FROM school WHERE idschool='$idschool'");
							$sch = mysqli_fetch_array($se);
							$college_name = $sch['name'];
							$idcollege = $sch['idcollege'];
							
					?>
					<tr>
                      <td><?php echo $idcollege; ?>.</td>
                      <td><?php echo $name; ?></td>
					  <td><?php 
					  $sel = mysqli_query($con,"SELECT * FROM college WHERE idcollege='$idcollege'");
						$coll = mysqli_fetch_array($sel);
						$college_name = $coll['name'];
						$iduniversity = $coll['iduniversity'];						
					  echo $college_name;
					  ?></td>
					  
                      <td><?php
						$select = mysqli_query($con,"SELECT * FROM university WHERE iduniversity='$iduniversity'");
						$uni = mysqli_fetch_array($select);
					  echo $uni['name'];
					  ?></td>
					  <td><?php echo $tuition; ?></td>
					  <td><?php echo $cp_private; ?></td>
                      <td>
                       <a href="#" id="myBtn"> <i class="fa fa-edit"></i> </a>
                        <a href="index.php?action=deleteCourse&id=<?php echo $idcourse;?>"> <i class="fa fa-trash-o"></i></a>
					  </td>
                    </tr>
						<!-- The Modal -->
						<div id="myModal" class="modal">

						  <!-- Modal content -->
						  <div class="modal-content">
							<span class="close">×</span>
							<?php 
							$edit = mysqli_query($con,"select * from course where idcourse='$idcourse'");
							$course = mysqli_fetch_array($edit);
							?>
							<form role="form" action="index.php?action=editCourses&id=<?php echo $idcourse;?>" method="POST">
							  <div class="box-body">
								<div class="form-group">
								  <label for="exampleInputEmail1">Course Name</label>
								  <input type="text" name="name" Required="true" class="form-control" id="exampleInputEmail1" value="<?php echo $course['name'];?>">
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Course Tuition</label>
								  <input type="text" name="tuition" Required="true" class="form-control" id="exampleInputEmail1" value="<?php echo $course['tuition'];?>">
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Course Duration</label>
								  <input type="text" name="duration" Required="true" class="form-control" id="exampleInputEmail1" value="<?php echo $course['duration'];?>">
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Pujab Cut-off-points</label>
								  <input type="text" name="cp_pujab" Required="true" class="form-control" id="exampleInputEmail1" value="<?php echo $course['cp_pujab'];?>">
								</div>
								<div class="form-group">
								  <label for="exampleInputEmail1">Private Cut-off-points</label>
								  <input type="text" name="cp_private" Required="true" class="form-control" id="exampleInputEmail1" value="<?php echo $course['cp_private'];?>">
								</div>
								
								 <div class="form-group">
								  <label>Select</label>
								  <select class="form-control" name="idschool" Required="true">
									<option>Select School</option>
									<?php 
									include('db_connect.php');
										$query_school = mysqli_query($con,"SELECT * FROM school");
										if(mysqli_num_rows($query_school)>0){
											while($rows = mysqli_fetch_array($query_school)){
												$idschool = $rows['idschool'];
												$name = $rows['name'];
												
										?>
										<option value="<?php echo $idschool; ?>"><?php echo $name; ?></option>
										<?php
											}
										
										}
									?>
									
								  </select>
								</div>
								<div class="form-group">
								  <label>Details</label>
								  <textarea class="form-control" name="details" Required="true" rows="3" ><?php echo $course['details'];?></textarea>
								</div>
							  </div><!-- /.box-body -->

							  <div class="box-footer">
								<button type="submit" name="submit" class="btn btn-primary">Update</button>
							  </div>
							</form>
						  </div>

						</div>
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
	  
	  <style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 70px; /* Location of the box */
    padding-left: 400px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>



<script>
// Get the modal
var modal = document.getElementById('myModal');
// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
	  
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


<?php //add essential subjects form
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

<?php //add relevant subjects form
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

<?php //add subject form
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

<?php //add opportunity form
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














<?php //Logout function
function Logout(){
	// remove all session variables
	session_unset();
	// destroy the session
	session_destroy();
	echo '<meta content="1;index.php?action=Login" http-equiv="refresh" />';
}
?>




























