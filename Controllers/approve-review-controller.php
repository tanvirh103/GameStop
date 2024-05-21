<?php
    require_once('../Models/review-info-model.php');
    require_once('message-controller.php'); 
    $reviewid=$_GET['reviewid'];
    $result=acceptReview($reviewid);
    if ($result) {
        popup("Success!", "Review Approved Successfully");
    } else {
        popup("Error!", "Failed Please try again later");
    }
?>