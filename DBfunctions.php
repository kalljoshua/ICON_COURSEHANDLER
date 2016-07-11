<?php //-- insert University Details--
function insertUniversity(){

include('db_connect.php');
	if(isset($_POST['submit'])){
	$name = $_POST['name'];	
	$email = $_POST['email'];	
	$phone_no = $_POST['phone_no'];	
	$box_no = $_POST['box_no'];	
	$location = $_POST['location'];	
	$details = $_POST['details'];	
		
		$insert = mysqli_query($con,"INSERT INTO university (iduniversity,name,email,phone_no,box_no,location,details) 
			VALUES('','$name','$email','$phone_no','$box_no','$location','$details')");
			
			if($insert){
				echo '<meta content="1;index.php?action=Universities" http-equiv="refresh" />';
			}else{
				echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
				echo "nah sucess ".mysqli_error($connect);
			}
	
	
	}

}
?>

<?php //-- insert Colleges Details--
function insertColleges(){

include('db_connect.php');
	if(isset($_POST['submit'])){
	$name = $_POST['name'];	
	$email = $_POST['email'];	
	$phone_no = $_POST['phone_no'];	
	$box_no = $_POST['box_no'];	
	$iduniversity = $_POST['iduniversity'];	
	$details = $_POST['details'];	
		
		$insert = mysqli_query($con,"INSERT INTO college (idcollege,name,email,phone_no,box_no,details,iduniversity) 
			VALUES('','$name','$email','$phone_no','$box_no','$details','$iduniversity')");
			
			if($insert){
				echo '<meta content="1;index.php?action=Colleges" http-equiv="refresh" />';
			}else{
				echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
				echo "nah sucess ".mysqli_error($connect);
			}
	
	
	}

}
?>

<?php //-- insert Schools Details--
function insertSchools(){

include('db_connect.php');
	if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$idcollege = $_POST['idcollege'];
		
		$insert = mysqli_query($con,"INSERT INTO school (idschool,name,idcollege) 
			VALUES('','$name','$idcollege')");
			
			if($insert){
				echo '<meta content="1;index.php?action=Schools" http-equiv="refresh" />';
			}else{
				echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
				echo "nah sucess ".mysqli_error($connect);
			}
	
	
	}

}
?>

<?php //-- insert Courses Details--
function insertCourses(){

include('db_connect.php');
	if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$tuition = $_POST['tuition'];
	$duration = $_POST['duration'];
	$cp_pujab = $_POST['cp_pujab'];
	$cp_private = $_POST['cp_private'];
	$details = $_POST['details'];
	$idschool = $_POST['idschool'];
		
		$insert = mysqli_query($con,"INSERT INTO course (idcourse,name,tuition,duration,cp_pujab,cp_private,details,idschool) 
			VALUES('','$name','$tuition','$duration','$cp_pujab','$cp_private','$details','$idschool')");
			
			if($insert){
				echo '<meta content="1;index.php?action=Courses" http-equiv="refresh" />';
			}else{
				echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
				echo "nah sucess ".mysqli_error($connect);
			}
	
	
	}

}
?>



