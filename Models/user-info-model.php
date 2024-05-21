
<?php
    require_once('database.php');
    function addUser($fullname, $username, $phone, $email, $password,$role){
    
        $con = dbConnection();
    
        $sql = "insert into userinfo values('', '{$fullname}' ,'{$username}' ,'{$phone}', '{$email}', '{$password}', 'Uploads/Images/default.jpg', '$role', 'Inactive')";
    
        if(mysqli_query($con, $sql)) return true;
        else return false;
        
    }
    function uniqueEmail($email){

        $con = dbConnection();
        $sql="select email from userinfo where email like '{$email}' ";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
    
        if($count == 1) return false;
        else return true; 
        
    }
    function login($email, $password){
        $con =dbConnection();
        $sql = "select * from userinfo where email ='{$email}' and password ='{$password}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
    
        if($count == 1) 
        {
        $row = mysqli_fetch_assoc($result);
        return $row;
    
        }
        else return false;
    
    }
    
    function userInfo($id){
        $con=dbConnection();
        $sql="select* from userinfo where userid='$id'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        return $row;
    }

    function updateUserInfo( $id,$fullname, $username, $phone, $email){

        $con = dbConnection();
        $sql = "update userinfo set fullname = '$fullname', username = '$username', phone = '$phone',email='$email' where userid = '$id'";
             
        if(mysqli_query($con,$sql)===true) return true;
        else return false; 
        
    }

    function updateProfilePicture( $imagename, $id){

        $con = dbConnection();
        $sql = "update userinfo set profilepic = '$imagename' where userid = '$id'";
             
        if(mysqli_query($con,$sql)===true) return true;
        else return false; 
        
    }
    function changePassword($id,$newpass){
        $con=dbConnection();
        $sql = "update userinfo set password = '$newpass' where userid = '$id'";
        if(mysqli_query($con,$sql)===true) return true;
        else return false; 
    }

    function getAllUser(){
        $con = dbConnection();
        $sql="select* from userinfo where role='Customer' and status='Active'";
        $result=mysqli_query($con,$sql);
        return $result;
    }
    function getAllBanUser(){
        $con = dbConnection();
        $sql="select* from userinfo where Role='Customer' and status='Inactive'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    function banUser($id){
        $con = dbConnection();
        $sql = "update userinfo set status = 'Inactive' where userid = '$id'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    
    function unbanUser($id){
        $con = dbConnection();
        $sql = "update userinfo set status = 'Active' where userid = '$id'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    
?>