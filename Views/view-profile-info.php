<?php
require_once('../Models/user-info-model.php');
require_once('../Controllers/message-controller.php');
if (!isset($_COOKIE['flag'])) {
    popup("Error!", "You need to sign-in in order to access this page.");
}
$id = $_COOKIE['id'];
$row = UserInfo($id);
$flag = 0;
if(isset($_GET['id'])){
$id2 = $_GET['id'];
$row2 = UserInfo($id2);
if($id!=$id2) $flag = 1;
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile Info</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="first">
        <a href="../index.php"><img src="../Uploads/logo.png" alt="Logo" width="120px" height="70px"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
        } else {
            $id = $_COOKIE['id'];
            $row = UserInfo($id);
            if ($row['role'] == "Business Client") {
                echo "<img src=\"../{$row['profilepic']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                    <select name=\"profile\" onchange=\"location = this.value;\">
                        <option disabled selected hidden> {$row['username']} </option>
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
    <div class="header"></div>
        <br>
    <center>
        <img src=<?php echo "../{$row['profilepic']}" ?> width="100px">
        <br><br><br>

        <table width="40%" border="2" cellspacing="10" cellpadding="25" bordercolor="#1B6392">
            <tr>
            <?php
                if($flag==0){

                    echo "<td>
                    <font color=\"black\" face=\"times new roman\" size=\"6\">Full Name : {$row['fullname']} </font><br><br>
                    <font color=\"black\" face=\"times new roman\" size=\"6\">Username : {$row['username']} </font><br><br>
                    <font color=\"black\" face=\"times new roman\" size=\"6\">Phone Number : {$row['phone']} </font><br><br>
                    <font color=\"black\" face=\"times new roman\" size=\"6\">Email : {$row['email']} </font><br><br>
                    <font color=\"black\" face=\"times new roman\" size=\"6\">Role : {$row['role']} </font><br>
                </td>";

                }else{

                        echo "<td>
                        <font color=\"black\" face=\"times new roman\" size=\"6\">Full Name : {$row2['fullname']} </font><br><br>
                        <font color=\"black\" face=\"times new roman\" size=\"6\">Username : {$row2['username']} </font><br><br>
                        <font color=\"black\" face=\"times new roman\" size=\"6\">Phone Number : {$row2['phone']} </font><br><br>
                        <font color=\"black\" face=\"times new roman\" size=\"6\">Email : {$row2['email']} </font><br><br>
                        <font color=\"black\" face=\"times new roman\" size=\"6\">Role : {$row2['role']} </font><br>
                    </td>";

                }

            ?>
            </tr>
        </table>
    </center>
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
</body>

</html>