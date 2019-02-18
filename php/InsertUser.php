<?php
    require 'Database.php';
    require 'User.php';
    require 'UserBL.php';
    
    $objUser = new User();
    $objUserBL = new UserBL($database);
    
    $objUser->Username = $_POST['Username'];
    $objUser->Password = $_POST['Password'];
    $objUser->Name = $_POST['Name'];
    $objUser->Lastname = $_POST['Lastname'];
    $objUser->Email = $_POST['Email'];
    $objUser->IsAdministrator = 1;
    
    $objUserBL->insertUser($objUser);
    
    session_start();
    
    $_SESSION['UserID'] = $database->id();
    
    header('Location: ../html_pages/UserLandingPage.php');
?>