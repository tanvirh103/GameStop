<?php
    require_once('../Models/user-info-model.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpline</title>
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
                        <font color=\"white\" face=\"times new roman\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In</font>
                    </a>";
        } else{
            $id=$_COOKIE['id'];
            $row=userInfo($id);
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

        } 
        ?>
    </div>
    <div class="header"></div><br><br><br>
    <center>
        <font color="#1B6392" face="times new roman" size="12">Helpline</font><br>
        <hr color="#1B6392" width="530px"><br>
    </center>
    <table width="100%" border="0" cellspacing="0" cellpadding="15" align="center">

        <tr>
            <form action="../Controllers/helpline-controller.php" method="post">
            <td align="center">
                <font color="black" face="times new roman" size="6">Email : helpline.gamestop@gmail.com</font><br><br>
                <input type="email" id="email" placeholder="Enter Your Email Address" size="58px" onkeyup="checkMail()" name="sender"><br><br>
                    <font color="red" face="times new roman" size="3" id="mailError"></font>
                    <br>
                    <br>
                <textarea name="message" cols="57" rows="15"></textarea><br><br>
                <button name="submit" id="submitButton">Send</button>
            </td>
            </form>
        </tr>
    </table>
    <br><br><br><br>
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
    </div>
    <script>
    function checkMail() {
            let mail = document.getElementById('email').value;
            let atPos = mail.indexOf('@');
            let dotPos = mail.lastIndexOf('.');

            if (!mail) {
                document.getElementById('mailError').innerHTML = "Email cannot be empty.";
            } else if (atPos === -1 || atPos === 0 || dotPos === -1 || dotPos <= atPos + 1 || dotPos === mail.length - 1) {
                document.getElementById('mailError').innerHTML = "Invalid email address.";
            } else {
                document.getElementById('mailError').innerHTML = "";
            }
            checkFormValidity();
        }
        function checkFormValidity() {
        
        let email = document.getElementById('email').value;
       
        let mailError = document.getElementById('mailError').innerText;
 

        let submitButton = document.getElementById('submitButton');

        if (
           
            mailError !== '' 
        ) {
            submitButton.disabled = true;
        } else {
            submitButton.disabled = false;
        }
    }
    </script>
</body>
</html>