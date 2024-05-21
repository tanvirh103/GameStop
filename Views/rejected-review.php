<?php
    require_once('../Models/user-info-model.php');
    require_once('../Models/review-info-model.php');
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    
    $id=$_COOKIE['id'];
    $result= getAllRejectReview();
    $row=UserInfo($id);
    if($row['role']=='Manager'){}else{
        popup("Error!","You need to sign-in in order to access this page.");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales History</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reject Review</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div class="first">
    <a href="../index.php"><img src="../Uploads/logo.png" alt="Logo"  width="120px" height="70px"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="Views/search.php"><button class="header-button">Search GameStop</button></a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="../<?php echo $row['profilepic']; ?>" width="40px">&nbsp;&nbsp;&nbsp;
                <select name="profile" onchange="location = this.value;">
                    <option disabled selected hidden><?php echo $row['username']; ?></option>
                    <option value="../index.php">Home Page</option>
                    <option value="user-profile.php">Profile</option>
                    <option value="dashboard.php">Dashboard</option>
                    <option value="sales-report.php">Sales Report</option>
                    <option value="settings.php">Settings</option>
                    <option value="logout-page.php">Log Out</option>
                </select>
        
    </div>
    <div class="header"></div><br>
    <center>
        <font color="#1B6392" face="times new roman" size="12">Reject Review</font><br><br>
        <hr color="#1B6392" width="530px"><br>
        <?php 
           
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"15\">
            <tr>
                <td>
                    <font color=\"#1B6392\" face=\"times new roman\" size=\"5\">Review ID</font>
                    <hr color=\"#1B6392\" width=\"140px\" align=\"left\">
                </td>
                <td>
                    <font color=\"#1B6392\" face=\"times new roman\" size=\"5\">Username</font>
                    <hr color=\"#1B6392\" width=\"170px\" align=\"left\">
                </td>
                <td>
                    <font color=\"#1B6392\" face=\"times new roman\" size=\"5\">Product ID</font>
                    <hr color=\"#1B6392\" width=\"130px\" align=\"left\">
                </td>
                <td>
                    <font color=\"#1B6392\" face=\"times new roman\" size=\"5\">Review</font>
                    <hr color=\"#1B6392\" width=\"160px\" align=\"left\">
                </td>
                <td>
                    <font color=\"#1B6392\" face=\"times new roman\" size=\"5\">Review Status</font>
                    <hr color=\"#1B6392\" width=\"100px\" align=\"left\">
                </td>
            </tr>";
                while($w=mysqli_fetch_assoc($result)){
                    $reviewid=$w['reviewid'];
                    $username=$w['username'];
                    $productid=$w['productid'];
                    $review=$w['review'];
                    $status=$w['reviewstatus'];
                    echo "
                    <td><font id=\"productname\" color=\"black\" face=\"times new roman\" size=\"5\">$reviewid</font></td>
                    <td><font id=\"productcategory\" color=\"black\" face=\"times new roman\" size=\"5\">$username</font></td> 
                    <td><font id=\"productprice\" color=\"black\" face=\"times new roman\" size=\"5\">$productid</font></td>
                    <td><font id=\"productquantity\" color=\"black\" face=\"times new roman\" size=\"5\">$review</font></td>
                    <td><font id=\"productquantity\" color=\"black\" face=\"times new roman\" size=\"5\">$status</font></td>
                    </tr>";
                }
            }else{
                echo"<tr><br><br><br><td align=\"center\"><font color=\"black\" face=\"times new roman\" size=\"6\">No Rejected Review Found</font></td><br><br><br></tr>";
            }
        ?>
        </table>
        <br><br><br>
        <br><br><br>
    </center>
    <br><br><br><br><br><br><br><br>
    <div class="footer">
            <center>
                <a href="about-us.php">
                    <font color="white" face="times new roman" size="4">About Us</font>
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="helpline.php">
                    <font color="white" face="times new roman" size="4">Helpline</font>
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="faq.php">
                    <font color="white" face="times new roman" size="4">FAQ</font>
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="terms-and-services.php">
                    <font color="white" face="times new roman" size="4">Terms and Services</font>
                </a><br><br>
                <font color="white" face="times new roman" size="3">GameStop</font><br>
                <font color="white" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
                <font color="white" face="times new roman" size="1">© 2024 by GameStop.com, Inc.</font>
            </center>
    </div>
</body>
</html>