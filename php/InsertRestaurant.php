<?php
    require 'Database.php';
    require 'Restaurant.php';
    require 'RestaurantBL.php';
    
    session_start();
    
    $name = $_POST['Name'];
	$description = $_POST['Description'];
    $phone = $_POST['Phone'];
    
    $resBL = new RestaurantBL($database);
    $objRes = new Restaurant();
    
    $objRes->Name = $name;
    $objRes->Description = $description;
    $objRes->Phone = $phone;
    
    $id = $resBL->insertRestaurant($objRes);
    $RestID = $database->id();
    $UserID = $_SESSION['UserID'];
    
    $resBL->insertRestaurantByUser($UserID, $RestID);
    
    header('Location: ../html_pages/Restaurants.php?Message=OK');
?>