<?php
    require_once('../Models/order-info-model.php');
    require_once('../Models/product-info-model.php');
    require_once('../Models/payment-info-model.php');
    require_once('message-controller.php');            
    $id=$_COOKIE['id'];
    $oid=$_GET['oid'];
    $pid=$_GET['pid'];
    $row=availableQuantity($pid);
    $row1=orderQuantity($oid);
    $avaiablequantity=$row['productquantity'];
    $oderquantity=$row1['purchasequantity'];
    $finalQuantity=$avaiablequantity-$oderquantity;
    $userid=$row1['userid'];
    $productowner=$row1['productowner'];
    $productid=$row1['productid'];
    $purchaseprice=$row1['purchaseprice'];
    $purchaseDate = date("d-m-Y");
    $result=acceptOrder($oid,$id);
    $result1=updateInventory($pid,$id,$finalQuantity);
    $result2=paymentadd($userid,$productowner,$productid,$oderquantity,$purchaseprice,$purchaseDate);
    if ($result && $result1 && $result2) {
        popup("Success!", "Order confirmed.");
    } else {
        popup("Error!", "Failed Please try again later");
    }

?>