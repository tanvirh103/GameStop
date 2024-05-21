<?php
    function dbConnection(){
        $conn=mysqli_connect('localhost','root','','gamestop');
        return $conn;
    }
?>