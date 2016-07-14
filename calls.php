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
				
			// --Begining of the functions for Universities--		
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
				
			case"editUniversities";
			if(isset($_SESSION['userId']))
				editUniversities();
			else
				Login();
				break;
				
			case"deleteUniversities";
			if(isset($_SESSION['userId']))
				deleteUniversities();
			else
				Login();
				break;
			// --End of the functions for Universities--		
				
			
			// --Begining of the functions for Colleges--
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
				
			case"editColleges";
			if(isset($_SESSION['userId']))
				editColleges();
			else
				Login();
				break;
				
			case"deleteColleges";
			if(isset($_SESSION['userId']))
				deleteColleges();
			else
				Login();
				break;
			// --End of the functions for Colleges--
				
				
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
			
			
			case"subjects";
			if(isset($_SESSION['userId']))
				addsubject();
			else
				Login();
				break;
				
			
			case"insertnewsubject";
			if(isset($_SESSION['userId']))
				insertnewsubject();
			
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