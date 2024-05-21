<?php
    require_once('message-controller.php');
    require_once('../Models/product-info-model.php');
    if(isset($_POST['Upload'])){

        $srcPoster = $_FILES['poster']['tmp_name'];

        //Null value checking
        if(empty($srcPoster)) popup("Error!", "No file selected.");

        $poster = 'Uploads/Products/'.$_FILES['poster']['name'];
        $desPoster = "../Uploads/Products/".$_FILES['poster']['name'];
        
        if(move_uploaded_file($srcPoster, $desPoster)){}
        else
        {
            popup("Error!", "Could not upload the poster, Please try again.");
        }
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $id = $_COOKIE['id'];

        echo  $id,$title,$description,$category, $price,$quantity;

        //Null value checking
        if(strlen(trim($title)) == 0 || strlen(trim($description)) == 0 ||  strlen(trim($category)) == 0 ||  strlen(trim($price)) == 0 || strlen(trim($quantity)) == 0) popup("Error!", "You can not leave any fields empty.");

        //Price validation
        if(!is_numeric($price)) popup("Error!", "Price has to be a number.");

        //Quantity validation
        if(!is_numeric($quantity)) popup("Error!", "Quantity has to be a number.");

        $status = uploadProduct($id,$title, $description, $category, $poster, $price, $quantity);
        
        if($status) popup("Congratulations!", "Your product has been uploaded.");
        else popup("Error!", "Could not upload Product.");
        
    }
?>