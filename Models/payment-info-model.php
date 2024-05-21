<?php
    require_once('../Models/database.php');
    function paymentadd($userid,$productowner,$productid,$oderquantity,$purchaseprice,$purchaseDate){
        $conn=dbConnection();
        $sql="INSERT INTO paymentinfo VALUES ('','$userid','$productowner','$productid','$oderquantity','$purchaseprice','$purchaseDate','Active')";
        $result=mysqli_query($conn,$sql);
        echo $result;
        if($result){
            return true;
        }else{
            return false;
        }
    }

    function viewPayment($id){
        $con=dbConnection();
        $sql="select* from paymentinfo where sellerid='$id'";
        $result=mysqli_query($con,$sql);
        return $result;
    }

    function viewAllPayment(){
        $con=dbConnection();
        $sql="select* from paymentinfo";
        $result=mysqli_query($con,$sql);
        return $result;
    }

?>