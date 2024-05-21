<?php

    require_once('message-controller.php');
    require_once('../Models/product-info-model.php');       
    
    if(isset($_POST['submit'])){
        $id=$_COOKIE['id'];
        $productid=$_POST['productid'];
        $quantity=$_POST['quantity'];
        echo $productid;
        $status=updateInventory($productid,$id,$quantity);
        echo $status;
        if($status) popup("Successfull!", "Your product Inventory has been updated.");
        else popup("Error!", "Could not Update Product Inventory.");
    }
    
?>