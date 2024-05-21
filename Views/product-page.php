<?php
    require_once('../Models/user-info-model.php'); 
    require_once('../Models/product-info-model.php'); 
    require_once('../Models/review-info-model.php'); 
    require_once('../Controllers/message-controller.php'); 

    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $id = $_COOKIE['id'];
    $row = UserInfo($id);
    $pid = $_GET['pid'];
    $result=getReview($pid);
    
    $crow = getProductById($pid);
    if ($crow) {
        $title = $crow['productname'];
        $productcategory = $crow['productcategory'];
        $posterURL = $crow['productpic'];
        $productprice = $crow['productprice'];
        $description = $crow['productdescription'];
        $productquantity = $crow['productquantity'];
        $productstatus=$crow['productstatus'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div class="first">
    <a href="../index.php"><img src="../Uploads/logo.png" alt="Logo"  width="120px" height="70px"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="search.php"><button class="header-button">Search GameStop</button></a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
        if (!isset($_COOKIE['flag'])) {
            echo "<a href=\"Views/signin.html\">
                        <font color=\"white\" face=\"times new roman\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In</font>
                    </a>";
        } else if ($row['role'] == "Manager") {
                echo "<img src=\"../{$row['profilepic']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                    <select name=\"profile\" onchange=\"location = this.value;\">
                        <option disabled selected hidden> {$row['username']} </option>
                        <option value=\"user-profile.php\">Profile</option>
                        <option value=\"dashboard.php\">Dashboard</option>
                        <option value=\"sales-Report.php\">Sales Report</option>
                        <option value=\"settings.php\">Settings</option>
                        <option value=\"logout-page.php\">Log Out</option>
                    </select>";
            } else if($row['role'] == "Business Client"){
                echo"<img src=\"../{$row['profilepic']}\" width=\"40px\">&nbsp;&nbsp;&nbsp;
                <select name=\"profile\" onchange=\"location = this.value;\">
                    <option disabled selected hidden>{$row['username']}</option>
                    <option value=\"../index.php\">Home Page</option>
                    <option value=\"user-profile.php\">Profile</option>
                    <option value=\"dashboard.php\">Dashboard</option>
                    <option value=\"sales-history.php\">Sales History</option>
                    <option value=\"settings.php\">Settings</option>
                    <option value=\"logout-page.php\">Log Out</option>
                </select>";
            }
        ?>
    </div>
    <div class="header"></div><br>
    <center>
        <font color="#1B6392" face="times new roman" size="7">Product Details</font><br><br>
        <hr color="#1B6392" width="400px"><br><br>
        <img src="../<?php echo $posterURL; ?>" width="300px">
    </center>
    <center>
    <table width="90%" border="1" cellspacing="0" cellpadding="15" bordercolor="#1B6392">
        <tr>
            <td>
                <font color="black" face="times new roman" size="6"><?php echo $title; ?></font><br><br>
                <font color="black" face="times new roman" size="4"><?php echo $productcategory; ?> |</font>
                <font color="black" face="times new roman" size="4">Available Quantity: <?php echo $productquantity; ?>|</font>
                <font color="black" face="times new roman" size="4">Product Status: <?php echo $productstatus; ?></font><br><br>
                <hr color="#1B6392" width="100%"><br><br>
                <font color="black" face="times new roman" size="6">Description : </font><br>
                <hr color="#1B6392" width="170px" align="left"><br>
                <font color="black" face="times new roman" size="5"><?php echo $description; ?></font><br><br><br>
                <hr color="#1B6392" width="100%"><br>
                <font color="black" face="times new roman" size="6">Product Price:</font>
                <font color="black" face="times new roman" size="6"><?php echo $productprice; ?></font>
                <hr color="#1B6392" width="100%"><br>
                <font color="black" face="times new roman" size="6">Comments:</font><br><br>
                <?php
                if(mysqli_num_rows($result)>0){
                    while($com=mysqli_fetch_assoc($result)){
                        $username=$com['username'];
                        $review=$com['review'];
                        echo"<font color=\"black\" face=\"times new roman\" size=\"5\">Username: {$username}</font><br>
                        <font color=\"black\" face=\"times new roman\" size=\"5\">Review: {$review}</font><br><br>
                        ";
                    }
                }else{
                    echo"<font color=\"black\" face=\"times new roman\" size=\"5\">No Review Found</font><br>";
                }
                ?>
            </td>
        </tr>
    </table>
    </center>
    <br><br><br>
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
