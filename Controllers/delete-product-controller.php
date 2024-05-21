<?php
    require_once('message-controller.php');
    require_once('../Models/product-info-model.php');
    $productid=$_GET['pid'];
    $id=$_COOKIE['id'];
    $status=deleteProduct($productid,$id);
    if($status) popup("Successfull!", "Your product has been deleted.");
    else popup("Error!", "Could not delete Product.");
?>