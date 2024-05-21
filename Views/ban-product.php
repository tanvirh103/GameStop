<?php
    require_once('../Models/user-info-model.php');
    require_once('../Models/product-info-model.php');
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
    $result=getAllActiveProduct();
    if($row['role']=="Manager"){}else{
        popup("Error!","You can not access this page.");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ban Product</title>
    <link rel="stylesheet" href="../style.css">
</head>

<div class="first">
    <a href="../index.php"><img src="../Uploads/logo.png" alt="Logo"  width="120px" height="70px"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="Views/search.php"><button class="header-button">Search GameStop</button></a>
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
                        <option value=\"sales-report.php\">Sales History</option>
                        <option value=\"settings.php\">Settings</option>
                        <option value=\"logout-page.php\">Log Out</option>
                    </select>";
        }
        ?>
    </div>
    <div class="header"></div><br><br><br>
    <center>
        <font color="#1B6392" face="times new roman" size="12">List Of Product</font><br><br><br>
        <hr color="#1B6392" width="530px"><br><br><br>
        <?php 
                if(mysqli_num_rows($result)>0){
                echo " <table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"15\">
                <tr>
                    <td>
                        <font color=\"#1B6392\" face=\"times new roman\" size=\"5\">Product Name</font>
                        <hr color=\"#1B6392\" width=\"80px\" align=\"left\">
                    </td>
                    <td>
                        <font color=\"#1B6392\" face=\"times new roman\" size=\"5\">Product Category</font>
                        <hr color=\"#1B6392\" width=\"120px\" align=\"left\">
                    </td>
                    <td>
                        <font color=\"#1B6392\" face=\"times new roman\" size=\"5\">Product Price</font>
                        <hr color=\"#1B6392\" width=\"80px\" align=\"left\">
                    </td>
                    <td>
                        <font color=\"#1B6392\" face=\"times new roman\" size=\"5\">Product Quantity</font>
                        <hr color=\"#1B6392\" width=\"80px\" align=\"left\">
                    </td>
                    <td>
                    <font color=\"#1B6392\" face=\"times new roman\" size=\"5\">Action</font>
                    <hr color=\"#1B6392\" width=\"80px\" align=\"left\">
                </td>
                </tr>";
                while($w=mysqli_fetch_assoc($result)){
                    $productid=$w['productid'];
                    $productname=$w['productname'];
                    $productcategory=$w['productcategory'];
                    $productprice=$w['productprice'];
                    $productquantity=$w['productquantity'];
                    echo "    
                    <tr>
                    <td><font id=\"productname\" color=\"black\" face=\"times new roman\" size=\"5\">$productname</font></td>
                    <td><font id=\"productcategory\" color=\"black\" face=\"times new roman\" size=\"5\">$productcategory</font></td> 
                    <td><font id=\"productprice\" color=\"black\" face=\"times new roman\" size=\"5\">$productprice</font></td>
                    <td><font id=\"productquantity\" color=\"black\" face=\"times new roman\" size=\"5\">$productquantity</font></td>
                    <td><a href=\"../Controllers/ban-product-controller.php?pid={$productid}\"><font color=\"5799EF\" face=\"times new roman\" size=\"5\">Ban Product</font></a></td>          
                        </tr>";
                    }
                }else{
                    echo"<tr><td align=\"center\"><font color=\"black\" face=\"times new roman\" size=\"6\">No Product Found</font></td></tr>";
                }  
            ?>
        </table>
        
        <br><br><br>
    </center>
    <br><br><br><br><br><br>
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
