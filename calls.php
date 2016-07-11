<?php 
include("functions.php");
include("DBfunctions.php");
include("db_connect.php");
		if(!empty($_REQUEST['action'])){
			switch($_REQUEST['action']){
				
			case"index";
			if(isset($_SESSION['userId']))
				index();
			else
				Login();
				break;
				
			case"Universities";
			if(isset($_SESSION['userId']))
				Universities();
			else
				Login();
				break;
				
			case"insertUniversity";
			if(isset($_SESSION['userId']))
				insertUniversity();
			else
				Login();
				break;
				
			case"Colleges";
			if(isset($_SESSION['userId']))
				Colleges();
			else
				Login();
				break;
				
			case"insertColleges";
			if(isset($_SESSION['userId']))
				insertColleges();
			else
				Login();
				break;
				
				
			// --Begining of the functions for Schools--	
			case"Schools";
			if(isset($_SESSION['userId']))
				Schools();
			else
				Login();
				break;
				
			case"insertSchools";
			if(isset($_SESSION['userId']))
				insertSchools();
			else
				Login();
				break;
			
			case"editSchools";
			if(isset($_SESSION['userId']))
				editSchools();
			else
				Login();
				break;
			
			case"deleteSchools";
			if(isset($_SESSION['userId']))
				deleteSchools();
			else
				Login();
				break;
			// --End of the functions for Schools--
			
			// --Begining of the functions for courses--	
			case"Courses";
			if(isset($_SESSION['userId']))
				Courses();
			else
				Login();
				break;
				
			case"insertCourses";
			if(isset($_SESSION['userId']))
				insertCourses();
			else
				Login();
				break;
				
			case"editCourses";
			if(isset($_SESSION['userId']))
				editCourses();
			else
				Login();
				break;
				
			case"deleteCourse";
			if(isset($_SESSION['userId']))
				deleteCourse();
			else
				Login();
				break;
			// --End of the functions for courses--	
			
							
			case"Login";
				Login();
				break;
				
			case"authenticate";
				authenticate();
				break;
				
			case"Logout";
				Logout();
				break;
				
			
			}
		}else{
		if(isset($_SESSION['userId']))
			index();
		else
		Login();
		}
?>