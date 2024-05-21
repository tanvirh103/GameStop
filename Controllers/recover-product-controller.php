<?php
    require_once('../Models/product-info-model.php'); 
    require_once('message-controller.php'); 
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $id=$_GET['pid'];
    

     if(unBanProduct($id)){
        popup("Success!","Product has been UnBan successfully");
     }else{
        popup("Error!", "Could not UnBan Product. Please try again."); 
     }

?>
