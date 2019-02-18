<?php
	require 'Database.php';
	require 'User.php';
	require 'UserBL.php';
	
	$objUser = new User();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$IsWEB = $_POST['isweb'];
	
	if($username != '' && $password != null) {
		//TODO Support special characters
		$usrBL = new UserBL($database);
		$usrFinder = new User();	
		
		$usrFinder->Username = $username;
		$usrFinder->Password = $password;
		
		$objUser->SetValuesFromData($usrBL->selectUser($usrFinder));
	}
	
	//$data = $database->select('users',["[>]userbyrestaurant" => ["UserID" => "UserID"]],['users.UserID','users.Username','users.Password','users.Name','users.Lastname','users.IsAdministrator'],['users.Username'=>$username,'users.Password'=>$password]);	
	
	//$resultEncoded = json_encode($data);
	
	if($IsWEB == "1") {
		if($objUser->UserID == -1){
			header('Location: ../html_pages/MainPage.php?Error=WrongUsername');	
		}else{
			session_start();
			$_SESSION["UserID"] = $objUser->UserID;
			
			header('Location: ../html_pages/UserLandingPage.php');
		}
		
	}
	
	echo json_encode($objUser);	
?>
