<?php
    require_once('../Models/order-info-model.php');
    require_once('message-controller.php'); 
    $id=$_COOKIE['id'];
    $oid=$_GET['oid'];
    $pid=$_GET['pid'];
    $result=RejectOrder($oid,$id);
    if ($result) {
        popup("Success!", "Order Rejected.");
    } else {
        popup("Error!", "Failed Please try again later");
    }
?>