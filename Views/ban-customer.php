<?php
    require_once('../Models/user-info-model.php');
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
    $result=getAllUser();
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
    <title>Ban Customers</title>
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
    <div class="header"></div><br>

    <center>
        <font color="#1B6392" face="times new roman" size="12">List Of Customer</font><br>
        <hr color="#1B6392" width="530px"><br>
        <?php 
                if(mysqli_num_rows($result)>0){
                echo "<table width=\"85%\" border=\"0\" cellspacing=\"0\" cellpadding=\"15\">
                <tr>
                <td>
                    <font color=\"#1B6392\" face=\"times new roman\" size=\"5\">Name</font>
                    <hr color=\"#1B6392\" width=\"80px\" align=\"left\">
                </td>
                <td>
                    <font color=\"#1B6392\" face=\"times new roman\" size=\"5\">Username</font>
                    <hr color=\"#1B6392\" width=\"120px\" align=\"left\">
                </td>
                <td>
                    <font color=\"#1B6392\" face=\"times new roman\" size=\"5\">Email</font>
                    <hr color=\"#1B6392\" width=\"80px\" align=\"left\">
                </td>
                <td>
                    <font color=\"#1B6392\" face=\"times new roman\" size=\"5\">Action</font>
                    <hr color=\"#1B6392\" width=\"80px\" align=\"left\">
                </td>
                 </tr>";
            
                    while($w=mysqli_fetch_assoc($result)){
                        $userid=$w['userid'];
                        $name=$w['fullname'];
                        $username=$w['username'];
                        $email=$w['email'];
                        echo "    
                        <tr><td><font color=\"black\" face=\"times new roman\" size=\"5\">$name</font></td>
                        <td><font color=\"black\" face=\"times new roman\" size=\"5\">$username</font></td>
                        <td><font color=\"black\" face=\"times new roman\" size=\"5\">$email</font></td> 
                        <td><a href=\"../Controllers/ban-cutomer-controller.php?id={$userid}\"><font color=\"5799EF\" face=\"times new roman\" size=\"5\">Ban Customer</font></a></td>          
                        </tr>";
                    }
                }else{
                    echo"<tr><br><br><br><td align=\"center\"><font color=\"black\" face=\"times new roman\" size=\"6\">No Customer Found</font></td><br><br><br></tr>";
                }  
            ?>
        </table>
        <br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
    </center>
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