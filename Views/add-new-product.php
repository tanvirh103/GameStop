<?php
require_once('../Models/user-info-model.php');
require_once('../Controllers/message-controller.php');
if (!isset($_COOKIE['flag'])) {
    popup("Error!", "You need to sign-in in order to access this page.");
}
$id = $_COOKIE['id'];
$row = UserInfo($id);
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
    <title>Add New Product</title>
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
    <div class="header"></div><br>
    <center>
        <font color="#1B6392" face="times new roman" size="7">Add New Product</font><br><br>
        <hr color="#1B6392" width="530px"><br><br>
        <form action="../Controllers/upload-product-controller.php" method="POST" enctype="multipart/form-data">
            <table width="50%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                    <td>
                        <font color="black" face="times new roman" size="6">Product Name: </font>
                    </td>
                    <td>
                        <input type="text" size="60px" name="title" id="title" onkeyup="validateTitle()">
                        <br>
                        <font color="red" face="times new roman" size="3" id="titleError"></font>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <font color="black" face="times new roman" size="6">Product Description : </font>
                    </td>
                    <td>
                        <textarea cols="57" rows="7" name="description" id="description" onkeyup="validateDescription()"></textarea>
                        <br>
                        <font color="red" face="times new roman" size="3" id="descriptionError"></font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="black" face="times new roman" size="6">Product Category : </font>
                    </td>
                    <td>
                        <select name="category" id="category" onchange="validateCategory()">
                            <option value="" selected>Select Product Category</option>
                            <option value="Gamepad">Gamepad</option>
                            <option value="Gaming Chair">Gaming Chair</option>
                            <option value="Keyboard">Keyboard</option>
                            <option value="Mouse">Mouse</option>
                            <option value="Mouse Pad">Mouse Pad</option>
                        </select>
                        <br>
                        <font color="red" face="times new roman" size="3" id="categoryError"></font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="black" face="times new roman" size="6">Upload Picture : </font>
                    </td>
                    <td>
                        <table cellspacing="0" cellpadding="7" bgcolor="#1B6392">
                            <tr>
                                <td>
                                    <input type="file" name="poster" accept=".png,.jpg,.jpeg"><br><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="black" face="times new roman" size="6">Product Price : </font>
                    </td>
                    <td>
                        <input type="text" size="60px" name="price" id="price" onkeyup="validatePrice()">
                        <br>
                        <font color="red" face="times new roman" size="3" id="priceError"></font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="black" face="times new roman" size="6">Product Quantity : </font>
                    </td>
                    <td>
                        <input type="text" size="60px" name="quantity" id="quantity" onkeyup="validateQuantity()">
                        <br>
                        <font color="red" face="times new roman" size="3" id="quantityError"></font>
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <br>
                        <input class="btn-submit" type="submit" name="Upload" value="Upload" id="submitButton">
                    </td>
                </tr>
            </table><br>
        </form>
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
    <script>
        function isNotEmpty(inputValue) {
            return inputValue.trim() !== '';
            checkFormValidity();
        }

        function validateCategory() {
            let category = document.getElementById('category').value;
            let categoryErrorElement = document.getElementById('categoryError');
            if (category === '') {

                categoryErrorElement.innerHTML = "Category cannot be empty.";
            } else {

                categoryErrorElement.innerHTML = "";
            }
            checkFormValidity();
        }

        function validateTitle() {
            let titleInput = document.getElementById('title');
            let titleError = document.getElementById('titleError');
            if (!isNotEmpty(titleInput.value) || titleInput.value.length > 100) {
                titleError.textContent = "Title must not be empty and should be 100 characters or less.";
            } else {
                titleError.textContent = "";
            }
            checkFormValidity();
        }

        function validateDescription() {
            let descriptionInput = document.getElementById('description');
            let descriptionError = document.getElementById('descriptionError');
            if (descriptionInput.value.length == 0) {
                descriptionError.textContent = "Description should not be empty.";
            } else if (descriptionInput.value.length > 500) {
                descriptionError.textContent = "Description should be 500 characters or less.";
            } else {
                descriptionError.textContent = "";
            }
            checkFormValidity();
        }


        function validatePrice() {
            let priceInput = document.getElementById('price').value;

            if (priceInput === '') {
                document.getElementById('priceError').innerHTML = "Price cannot be empty.";
            } else if (isNaN(priceInput) || parseFloat(priceInput) <= 0) {
                document.getElementById('priceError').innerHTML = "Please enter a valid positive number for the price.";
            } else {
                document.getElementById('priceError').innerHTML = "";
            }
            checkFormValidity();
        }

        function validateQuantity() {
            let quantity = document.getElementById('quantity').value;
            if (quantity === '') {
                document.getElementById('quantityError').innerHTML = "Quantity cannot be empty.";
            } else if (isNaN(quantity) || parseFloat(quantity) <= 0) {
                document.getElementById('quantityError').innerHTML = "Please enter a valid positive number for the price.";
            } else {
                document.getElementById('quantityError').innerHTML = "";
            }
            checkFormValidity();
        }

        function checkFormValidity() {
            let titleInput = document.getElementById('title').value;
            let descriptionInput = document.getElementById('description').value;
            let priceInput = document.getElementById('price').value;
            let quantity = document.getElementById('quantity').value;
            let category = document.getElementById('category').value;

            let categoryError = document.getElementById('categoryError').innerText;
            let titleError = document.getElementById('titleError').innerText;
            let descriptionError = document.getElementById('descriptionError').innerText;
            let priceError = document.getElementById('priceError').innerText;
            let quantityError = document.getElementById('quantityError').innerText;

            let submitButton = document.getElementById('submitButton');
            console.log(quantity)
            if (
                titleInput === '' ||
                descriptionInput === '' ||
                priceInput === '' ||
                quantity === '' ||
                category === '' ||

                titleError !== '' ||
                descriptionError !== '' ||
                priceError !== '' ||
                quantityError !== '' ||
                categoryError !== ''
            ) {
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }
        }
    </script>
</body>

</html>