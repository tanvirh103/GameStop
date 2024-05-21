<?php
    require_once('database.php');
    function getAllPendingReview(){
        $con=dbConnection();
        $sql="select * from reviewinfo where reviewstatus='Inactive'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    function acceptReview($oid){
        $con = dbConnection();
        $sql = "UPDATE reviewinfo SET reviewstatus = 'Active' WHERE reviewid = '{$oid}'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    function rejectReview($oid){
        $con = dbConnection();
        $sql = "UPDATE reviewinfo SET reviewstatus = 'Reject' WHERE reviewid = '{$oid}'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function getAllRejectReview(){
        $con=dbConnection();
        $sql="select * from reviewinfo where reviewstatus='Reject'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    function getReview($id){
        $con=dbConnection();
        $sql="select * from reviewinfo where productid='$id' and reviewstatus='Active'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }

?>