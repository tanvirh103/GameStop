<?php
    require_once('../Models/user-info-model.php');
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }         
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
    if($row['role']=="Business Client"){}else if($row['role']=="Manager"){}else{
        popup("Error!","You can not access this page.");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
    <div class="header"></div><br><br>
    <center>
        <font color="#1B6392" face="times new roman" size="12">Dashboard</font><br>
        <hr color="#1B6392" width="530px"><br>
        <?php
            if($row['role'] == "Business Client"){
            echo "<table width=\"60%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\">
            <tr align=\"center\">
                <td>
                    <a href=\"manage-product.php\"><font color=\"black\" face=\"times new roman\" size=\"6\">Manage Product</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"manage-order.php\"><font color=\"black\" face=\"times new roman\" size=\"6\">Manage Order</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"update-inventory.php\"><font color=\"black\" face=\"times new roman\" size=\"6\">Update Inventory</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"sales-history.php\"><font color=\"black\" face=\"times new roman\" size=\"6\">Sales History</font></a>
                    <br><br><br><br><br>
                </td>
            </tr>
        </table>";
        }else if($row['role'] == "Manager"){
            echo"<table width=\"60%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\">
            <tr align=\"center\">
                <td>
                    <a href=\"manage-product.php\"><font color=\"black\" face=\"times new roman\" size=\"6\">Manage Product</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"manage-customer.php\"><font color=\"black\" face=\"times new roman\" size=\"6\">Manage Customer</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"manage-review.php\"><font color=\"black\" face=\"times new roman\" size=\"6\">Manage Customer Review</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"sales-report.php\"><font color=\"black\" face=\"times new roman\" size=\"6\">Sales Report</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"helpline-message.php\"><font color=\"black\" face=\"times new roman\" size=\"6\">Helpline Messages</font></a>
                    <br><br>
                </td>
            </tr>
        </table>";
    }
        ?>
        <br><br>
    </center>
    <br><br>
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