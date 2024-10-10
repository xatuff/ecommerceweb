<html>
<body background="background.jpg">
    <style>
        .black_bar {
            background-color: black;
            display: flex;
            align-items: center;
            padding: 10px;
            text-align: center;
            border-radius: 10px;
        }

        .navlogo {
            width: 80px;
            height: auto;
            margin-left: 30px;
            cursor: pointer;
        }

        h2 {
            color: white;
        }

        .navlogo:hover {
            cursor: pointer;
            transform: scale(1.1);
            transition: all 0.4s;
        }

        .pixellogo2 {
            width: 260px;
            height: auto;
            display: inline-block;
            margin: auto;
            cursor: pointer;
        }

        .pixellogo2:hover {
            cursor: pointer;
            transform: scale(1.1);
            transition: all 0.4s;
        }

        .search {
            width: 60px;
            height: auto;
            cursor: pointer;
        }

        .search:hover {
            cursor: pointer;
            transform: scale(1.1);
            transition: all 0.4s;
        }

        .cartlogo {
            width: 80px;
            height: auto;
            margin-right: 1px;
            cursor: pointer;
            padding-left: 10px;
        }

        .cartlogo:hover {
            cursor: pointer;
            transform: scale(1.1);
            transition: all 0.4s;
        }

        .head {
            background-color: black;
            color: white;
            padding-top: 20px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            text-align: center;
            padding-bottom: 20px;
            border-radius: 80px;
            outline: solid white;
        }

        .game {
            background-color: #11378A;
            color: white;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            cursor: pointer;
        }

        .cart {
            color: white;
            cursor: pointer;
        }

        .cartbutt {
            background-color: #F1AB3D;
            color: white;
            border-radius: 30px;
            padding: 10px;
            width: 35vh;
            height: 10vh;
            font-size: 20;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .cartbutt:hover {
            cursor: pointer;
            transform: scale(1.1);
            transition: all 0.4s;
            color: black;
            background-color: white;
        }

        .game2 {
            background-color: white;
            color: black;
        }

        .gametab {
            border-radius: 8px;
        }

        .game-container {
            overflow-x: auto;
            width: 100%;
        }

        .gametab {
            display: inline-block;
            width: 2000px;
            padding: 10px;
            border-spacing: 10px;
        }

        .game-container::-webkit-scrollbar {
            display: flex;
            background-color: rgba(104, 103, 103, 0.792);
            border-radius: 30px;
            border-width: 10px;
        }

        .game-container::-webkit-scrollbar-thumb {
            background-color: white;
            border-radius: 30px;

        }

        .color {
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            background-color: blue;
            color: white;
        }

        .color2 {
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            background-color: white;
            color: black;
        }
        .color3 {
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            background-color: white;
            color: black;
        }
        .info{
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

        }

    </style>

    <div class="black_bar">
        <<a href="test4.php">
        <img src="navbar.jpg" class="navlogo">
    </a>
        <img src="pixellogo2.jpg" class="pixellogo2">
        <a href="mycart.php">
            <img src="cart.jpg" class="cartlogo">
        </a>
    </div>
    </div>

    <h1 class="head">INVOICE</h1>
    <?php
    // Retrieve form inputs
    $username = $_POST['username'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $paymentMethod = $_POST['payment_method'];

    // Display user information
    echo '<table align="center" class="info">';
    echo '<tr><td><h2>NAME: ' . $username . '</h2></td></tr>';
    echo '<tr><td><h2>ADDRESS: ' . $address . '</h2></td></tr>';
    echo '<tr><td><h2>EMAIL: ' . $email . '</h2></td></tr>';
    echo '<tr><td><h2>PAYMENT METHOD: ' . $paymentMethod . '</h2></td></tr>';
    echo '<tr><td><h2><u>YOUR GAME PURCHASE LIST:<u></h2></td></tr>';
    echo '</table>';

    // Generate MySQL query and display the records
    include('connect-db2.php');
    $result = mysql_query("SELECT * FROM record WHERE order_quantity >= 1") or die(mysql_error());

    echo '<table border="0px" class="gametab">';
    echo '<tr align="center">';
    echo '<td width="300px" height="70px" class="color">GAME ICON</td>';
    echo '<td width="300px" class="color2">GAME TITLE</td>';
    echo '<td width="300px" class="color2">QUANTITY</td>';
    echo '<td width="300px" class="color2">TOTAL PRICE</td>';
    echo '</tr>';

    $totalPriceSum = 0; // Variable to store the total price sum

while ($row = mysql_fetch_array($result)) {
    $totalPrice = $row['price'] * $row['order_quantity'];
    $totalPriceSum += $totalPrice; // Add the total price to the sum

    echo '<tr align="center">';
    echo '<td width="300px" height="400px" class="color"><img src="' . $row['picture'] . '" width="300px" height="400px" class="color"></td>';
    echo '<td width="300px" class="game2">' . $row['Title'] . '</td>';
    echo '<td width="300px" class="game2"><h3>&nbsp;&nbsp;' . $row['order_quantity'] . '</h3></td>';
    echo '<td width="300px" class="game2">RM' . $totalPrice . '</td>';
    echo '</tr>';

    // Update quantity
    $newQuantity = $row['Quantity'] - $row['order_quantity'];
    if ($newQuantity >= 0) {
        mysql_query("UPDATE record SET Quantity = $newQuantity, order_quantity = 0 WHERE id = " . $row['id']);
    } else {
        echo 'Insufficient quantity for ' . $row['Title'] . '<br>';
    }
}

// Display the total price sum
echo '<table border="0px" class="gametab">';
echo '<tr align="center">';
echo '<td width="300px" height="70px" class="color3"></td>';
echo '<td width="300px" class="color3"></td>';
echo '<td width="300px" class="color3">TOTAL PRICE:</td>';
echo '<td width="300px" class="color3">RM' . $totalPriceSum . '</td>';
echo '</tr>';

echo '</table><br>';

    ?>
</body>
</html>
