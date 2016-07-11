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

<?php //-- update University Details--
function editUniversities(){

include('db_connect.php');
	$iduniversity = $_REQUEST['id'];
	if(isset($_POST['submit'])){
	$name = $_POST['name'];	
	$email = $_POST['email'];	
	$phone_no = $_POST['phone_no'];	
	$box_no = $_POST['box_no'];	
	$location = $_POST['location'];	
	$details = $_POST['details'];	
		
		$insert = mysqli_query($con,"UPDATE university SET name='$name',email='$email',phone_no='$phone_no',box_no='$box_no',
		location='$location',details='$details' WHERE iduniversity=$iduniversity");
			
			if($insert){
				echo '<meta content="1;index.php?action=Universities" http-equiv="refresh" />';
			}else{
				echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
				echo "nah sucess ".mysqli_error($connect);
			}
	
	
	}

}
?>

<?php //-- delete University Details--
function deleteUniversities(){

include('db_connect.php');
	$iduniversity = $_REQUEST['id'];
	
	$insert = mysqli_query($con,"DELETE FROM university WHERE iduniversity = '$iduniversity'");
			
			if($insert){
				echo '<meta content="1;index.php?action=Universities" http-equiv="refresh" />';
			}else{
				echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
				echo "nah sucess ".mysqli_error($con);
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

<?php //-- update Colleges Details--
function editColleges(){

include('db_connect.php');
	$idcollege = $_REQUEST['id'];
	if(isset($_POST['submit'])){
	$name = $_POST['name'];	
	$email = $_POST['email'];	
	$phone_no = $_POST['phone_no'];	
	$box_no = $_POST['box_no'];	
	$iduniversity = $_POST['iduniversity'];	
	$details = $_POST['details'];	
		
		$insert = mysqli_query($con,"UPDATE college SET name='$name',email='$email',phone_no='$phone_no',box_no='$box_no',
		details='$details',iduniversity='$iduniversity' WHERE idcollege='$idcollege'");
			
			if($insert){
				echo '<meta content="1;index.php?action=Colleges" http-equiv="refresh" />';
			}else{
				echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
				echo "nah sucess ".mysqli_error($connect);
			}
	
	
	}

}
?>

<?php //-- delete Colleges Details--
function deleteColleges(){

include('db_connect.php');
	$idcollege = $_REQUEST['id'];
		
		$insert = mysqli_query($con,"DELETE FROM college WHERE idcollege='$idcollege'");
			
			
			if($insert){
				echo '<meta content="1;index.php?action=Colleges" http-equiv="refresh" />';
			}else{
				echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
				echo "nah sucess ".mysqli_error($connect);
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

<?php //-- Update School Details--
function editSchools(){

include('db_connect.php');
	$idschool = $_REQUEST['id'];
	if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$idcollege = $_POST['idcollege'];
		
		$insert = mysqli_query($con,"UPDATE school SET name='$name',idcollege='$idcollege' WHERE idschool='$idschool'");
			
			if($insert){
				echo '<meta content="1;index.php?action=Schools" http-equiv="refresh" />';
			}else{
				echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
				echo "nah sucess ".mysqli_error($connect);
			}
	
	
	}

}
?>

<?php //-- Delete School Details--
function deleteSchools(){

include('db_connect.php');
	$idschool = $_REQUEST['id'];
		
		$insert = mysqli_query($con,"DELETE FROM school WHERE idschool = '$idschool'");
			
			if($insert){
				echo '<meta content="1;index.php?action=Schools" http-equiv="refresh" />';
			}else{
				echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
				echo "nah sucess ".mysqli_error($connect);
			}
	
	

}
?>




<?php //-- insert Course Details--
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

<?php //-- update Course Details--
function editCourses(){

include('db_connect.php');
	$idcourse = $_REQUEST['id'];
	if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$tuition = $_POST['tuition'];
	$duration = $_POST['duration'];
	$cp_pujab = $_POST['cp_pujab'];
	$cp_private = $_POST['cp_private'];
	$details = $_POST['details'];
	$idschool = $_POST['idschool'];
		
		$insert = mysqli_query($con,"UPDATE course SET name='$name',tuition='$tuition',duration='$duration',
		cp_pujab='$cp_pujab',cp_private='$cp_private',details='$details',idschool='$idschool' WHERE idcourse='$idcourse'");
			
			if($insert){
				echo '<meta content="1;index.php?action=Courses" http-equiv="refresh" />';
			}else{
				echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
				echo "nah sucess ".mysqli_error($connect);
			}
	
	
	}

}
?>

<?php //-- Delete Course Details--
function deleteCourse(){

include('db_connect.php');
	$idcourse = $_REQUEST['id'];
			
		$insert = mysqli_query($con,"DELETE FROM course WHERE idcourse = '$idcourse'");
			
			if($insert){
				echo '<meta content="1;index.php?action=Courses" http-equiv="refresh" />';
			}else{
				echo '<meta content="1;index.php?action=index" http-equiv="refresh" />';
				echo "nah sucess ".mysqli_error($connect);
			}
	
	
	

}
?>



