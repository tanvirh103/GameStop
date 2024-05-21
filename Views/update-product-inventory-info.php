<?php
    require_once('../Models/user-info-model.php');
    require_once('../Models/product-info-model.php');
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }         
    $id=$_COOKIE['id'];
    $productid=$_GET['pid'];
    $result=getAllProductByProductId($productid,$id);
    $row=UserInfo($id);
    if($row['role']=="Business Client"){}else{
        popup("Error!","You can not access this page.");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product Inventory</title>
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
                    <option value="sales-history.php">Sales History</option>
                    <option value="settings.php">Settings</option>
                    <option value="logout-page.php">Log Out</option>
                </select>
        
    </div>
    <div class="header"></div>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row1 = mysqli_fetch_assoc($result)) {
            $productid = $row1['productid'];
            $productname = $row1['productname'];
            $productquantity = $row1['productquantity'];
            $productprice = $row1['productprice'];
            $productpic=$row1['productpic'];
            $productstatus=$row1['productstatus'];

        }
    }
    ?>
    <center>
        <font face="times new roman" size="7" color="#1B6392">Update Product Inventory</font>
        <hr width="30%" color="#1B6392"><br><br>
        <img src=<?php echo "../{$productpic}" ?> width="170px">
    </center>
    <table align="center" width="auto" cellspacing="0" cellpadding="25px" border="1" bordercolor="#1B6392">
        <center></center>
        <br>
        <form action="../Controllers/update-inventory-controller.php" method="post">
            <tr>
                <td>
                    <font face="times new roman">Product ID:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <font face="times new roman" name="productid"><?php echo $productid ?></font><br><br>
                    <input type="hidden" name="productid" value="<?php echo $productid ?>">
                    <font face="times new roman">Product Status :</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <font face="times new roman" name="productstatus"><?php echo $productstatus ?></font><br><br>
                    <font face="times new roman">Product Name :</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <font face="times new roman" name="productname"><?php echo $productname ?></font><br><br>
                    <font face="times new roman">Available Quantity :</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <font face="times new roman" name="productquantity"><?php echo $productquantity ?></font><br><br>
                    <font face="times new roman">Product Price :</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <font face="times new roman" name="productprice"><?php echo $productprice ?></font><br><br>
                    <font face="times new roman">Update Quantity :</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="number" id="quantity" name="quantity" onkeyup="checkquantity()"><br>
                    <font face="times new roman" color="red" id="quantityerror"></font><br>
                    <button name="submit" id="submit">Confirm Purchase</button>
                </td>
            </tr>
        </form>
    </table><br><br>
    <script>
        function checkquantity() {
            let password = document.getElementById('quantity').value;
            if (password.length == 0) {
                document.getElementById("quantityerror").innerHTML = "Quantity should be added";
            } else {
                document.getElementById("quantityerror").innerHTML = "";
            }
            checkpurchase();
        }

        function checkpurchase() {
            let quantity = document.getElementById('quantity').value;

            let quantityerror = document.getElementById('quantityerror').innerText;

            let submitButton = document.getElementById('submit');

            if (
                quantity === '' ||
                quantityerror !== ''
            ) {
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }


        }
    </script>
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