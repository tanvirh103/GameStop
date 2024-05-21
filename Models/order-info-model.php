<?php
    require_once('../Models/database.php');
    function viewOrder($id){
        $con = dbConnection();
        $sql = "select productinfo.productid,productinfo.productname,productinfo.productcategory,productinfo.productquantity,orderinfo.purchaseprice,orderinfo.purchasequantity,orderinfo.orderid from orderinfo,productinfo where orderinfo.productowner='$id'=productinfo.productowner='$id' and orderinfo.productid=productinfo.productid and orderstatus='Waiting';";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    function acceptOrder($oid,$id){
        $con = dbConnection();
        $sql = "UPDATE orderinfo SET orderstatus = 'Accept' WHERE orderid = '{$oid}' and productowner='{$id}'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    function RejectOrder($oid,$id){
        $con = dbConnection();
        $sql = "UPDATE orderinfo SET orderstatus = 'Reject' WHERE orderid = '{$oid}' and productowner='{$id}'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    function orderQuantity($id){
        $conn=dbConnection();
        $sql="SELECT * FROM orderinfo WHERE orderid='$id'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        return $row;
    }
    function viewRejectorder($id){
        $con = dbConnection();
        $sql = "select productinfo.productid,productinfo.productname,productinfo.productcategory,productinfo.productquantity,orderinfo.purchaseprice,orderinfo.purchasequantity,orderinfo.orderid,orderinfo.orderstatus from orderinfo,productinfo where orderinfo.productowner='$id'= productinfo.productowner='$id' and orderinfo.productid=productinfo.productid and orderstatus='Reject'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
?>