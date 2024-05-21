<?php
    require_once('../Models/user-info-model.php'); 
    require_once('../Models/product-info-model.php'); 
    require_once('../Controllers/message-controller.php'); 
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $id =$_COOKIE['id'];
    $row=UserInfo($id);
    $result=getAllGamingchair();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Gaming Chair</title>
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
                    if ($row['role'] == "Manager") {
                        echo "<img src=\"../{$row['profilepic']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                            <select name=\"profile\" onchange=\"location = this.value;\">
                                <option disabled selected hidden> {$row['username']} </option>
                                <option value=\"user-profile.php\">Profile</option>
                                <option value=\"dashboard.php\">Dashboard</option>
                                <option value=\"sales-report.php\">Sales Report</option>
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
    <div class="header"></div><br><br><br>

    <center>
        <font color="#1B6392" face="times new roman" size="10">Gaming Chair</font><br><br><br>
        <hr color="#1B6392" width="400px"><br><br><br>

        <table width="40%" border="0" cellspacing="0" cellpadding="15">
                        <?php 
                                if(mysqli_num_rows($result)>0){
                                    while($crow=mysqli_fetch_assoc($result)){
                                        $pid=$crow['productid'];
                                        $posterURL = $crow['productpic'];
                                        $title = $crow['productname'];
                                        $description = $crow['productdescription'];
                                        $productprice = $crow['productprice'];
                                        if (strlen($description) > 100) {
                                        $description = substr($description, 0, 100) . '...';
                                        }
                                        echo "<tr>                          
                                        <td><a href=\"product-page.php?pid=$pid\"><img src=\"../$posterURL\" width=\"180px\"></a></td>
                                        <td valign=\"top\" align=\"left\">
                                        <a href=\"product-page.php?pid=$pid\"><font color=\"black\" face=\"times new roman\" size=\"6\">$title</font><br></a><br>
                                        <font color=\"black\" face=\"times new roman\" size=\"4\">$description</font><br><br>
                                        <font color=\"black\" face=\"times new roman\" size=\"4\">Price:$productprice</font><br><br>";
                                    }
                                    
                                }else{
                                    echo"<tr><td align=\"center\"><font color=\"black\" face=\"times new roman\" size=\"6\">No Mobile Found</font></td></tr>";
                                }
                                ?>
                </table><br><br><br>
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