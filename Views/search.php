<?php
    require_once('../Models/user-info-model.php');
    require_once('../Controllers/message-controller.php'); 
    require_once('../Models/product-info-model.php');
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $id = $_COOKIE['id'];
    $row = UserInfo($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div class="first">
    <a href="../index.php"><img src="../Uploads/logo.png" alt="Logo"  width="120px" height="70px"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="livesearch" onkeyup="search(this.value)" name="title" placeholder="Search GameStop" size="100px"></a>
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
    <div class="header"></div><br><br>
    <center>
        <font color="#1B6392" face="times new roman" size="10">Search Results</font><br>
        <hr color="#1B6392" width="530px"><br><br><br>
        <table width="40%" bgcolor="black" border="0" cellspacing="0" cellpadding="15"></table>
            <tr><td><font id="message" color="black" face="times new roman" size="6">Please enter a title</font></td></tr>
            <script>
            function search(str){ 
                if(str==""){
                document.getElementById('message').innerHTML="<tr><td align=\"center\"><font color=\"black\" face=\"times new roman\" size=\"6\">Please Type Title</font><br><br><br><br><br>";
                return;
                }
                let xhttp=new XMLHttpRequest(); 
                xhttp.open('post','../Controllers/search-controller.php',true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('name='+str);
                xhttp.onload=function(){
                document.getElementById('message').innerHTML=this.responseText;
                }
            }
            </script>
        </table>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br>
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
