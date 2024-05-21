<?php
    require_once('database.php');

    function uploadProduct($id, $title, $description, $category, $poster, $price, $quantity)
    {
        $con = dbConnection();

        $sql = "insert into productinfo values('','{$id}' ,'{$title}' ,'{$description}','{$category}', '{$poster}', '{$price}' ,'{$quantity}' , 'Inactive' )";

        if (mysqli_query($con, $sql)) return true;
        else return false;
    }

    function getAllProductByOwner($id)
    {
        $con = dbConnection();
        $sql = "select* from productinfo where productowner='$id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function getProductById($id){
        $con=dbConnection();
        $sql="select* from productinfo where productid='$id'";
        $result=mysqli_query($con,$sql);
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        return $row;
    }

    function updateProduct($productid,$id,$title, $description, $category, $poster, $price, $quantity) {
        $con = dbConnection();
    
        $sql = "UPDATE productinfo SET productname = '{$title}', productdescription = '{$description}', productcategory = '{$category}', productpic = '{$poster}', productprice = '{$price}', productquantity = '{$quantity}' , productstatus='Inactive' WHERE productid = '{$productid}' and productowner='{$id}'";
    
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    function getAllProduct($id)
    {
        $con = dbConnection();
        $sql = "select* from productinfo where productowner='$id' and productstatus='Active'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function deleteProduct($productid,$id) {
        $con = dbConnection();
    
        $sql = "UPDATE productinfo SET productstatus='Delete' WHERE productid = '{$productid}' and productowner='{$id}'";
    
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    function getAllProductByProductId($productid,$id)
    {
        $con = dbConnection();
        $sql = "select* from productinfo where productowner='$id' and productid='$productid' and productstatus='Active'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    
    function updateInventory($productid,$id,$quantity) {
        $con = dbConnection();
    
        $sql = "UPDATE productinfo SET productquantity = '{$quantity}' WHERE productid = '{$productid}' and productowner='{$id}'";
    
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    function availableQuantity($id){
        $conn=dbConnection();
        $sql="SELECT * FROM productinfo WHERE productid='$id'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        return $row;
    }

    function searcProduct($title) {
        $con = dbConnection();
        $sql = "SELECT * FROM productinfo WHERE productname LIKE '%$title%' and productstatus='Active' or productcategory ='%$title%' ;";
        $result = mysqli_query($con, $sql);
        return $result;
    }

    function getAllMouse(){
        $con=dbConnection();
        $sql="select* from productinfo where productcategory='Mouse' and productstatus='Active'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    
    function getAllMousepad(){
        $con=dbConnection();
        $sql="select* from productinfo where productcategory='Mouse Pad' and productstatus='Active'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    
    function getAllKeyboard(){
        $con=dbConnection();
        $sql="select* from productinfo where productcategory='Keyboard' and productstatus='Active'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    
    function getAllGamingchair(){
        $con=dbConnection();
        $sql="select* from productinfo where productcategory='Gaming Chair' and productstatus='Active'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    function getAllActiveProduct(){
        $con = dbConnection();
        $sql = "select* from productinfo where productstatus='Active'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    function getAllSuspendProduct(){
        $con = dbConnection();
        $sql = "select* from productinfo where productstatus='Suspend'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    function banProduct($id){
        $con = dbConnection();
        $sql = "update productinfo set productstatus = 'Suspend' where productid = '$id'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    
    
    }
    function unBanProduct($id){
        $con = dbConnection();
        $sql = "update productinfo set productstatus = 'Active' where productid = '$id'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    

?>