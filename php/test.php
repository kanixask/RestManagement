<?php
	require '../php/Database.php';
	require '../php/User.php';
	require '../php/UserBL.php';
	$userBL = new UserBL($database);
	$userFinder = new User();
	$user = new User();
	$userFinder->UserID = 1;	
	$user = $userBL->selectUser($userFinder);
	echo '<span class="login_label"> Welcome '.$user->Name.' </span>';
?>