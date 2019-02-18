<?php
    require 'Restaurant.php';
    require 'RestaurantBL.php';
    require 'Database.php';
    
    $objRes = new Restaurant();
    $objResBL = new RestaurantBL($database);
    
    $objRes->RestaurantID = $_POST['RestaurantID'];
    $Action = $_POST['Action'];
    
    if($Action == "update"){
        $objRes->Name = $_POST['Name'];
        $objRes->Description = $_POST['Description'];
        $objRes->Phone = $_POST['Phone'];
        
        $objResBL->updateRestaurant($objRes);
    }else if($Action == "delete"){
        $objResBL->deleteRestaurant($objRes->RestaurantID);
    }
    
    
    header('Location: ../html_pages/EditRestaurants.php');
?>