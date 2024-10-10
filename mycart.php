<!DOCTYPE HTML>
<html>
    <body background="background.jpg">
        <style>

            .black_bar{
                background-color: black;
                display: flex;
                align-items: center;
                padding: 10px;
                text-align: center;
                border-radius: 10px;
            }

            .navlogo{
                width: 80px;
                height: auto;
                margin-left: 30px;
                cursor: pointer;
            }
            .navlogo2{
                width: 40px;
                height: auto;
                margin-left: 30px;
                cursor: pointer;
            }

            .navlogo:hover {
                cursor: pointer;
                transform: scale(1.1);
                transition: all 0.4s;
            }

            .pixellogo2{
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

            .search{
                width: 60px;
                height: auto;
                cursor: pointer;
            }

            .search:hover {
                cursor: pointer;
                transform: scale(1.1);
                transition: all 0.4s;
            }

            .cartlogo{
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

            .icon{
                border-spacing: 15px;
                
            }

            .cart{
                background-color: white;
                color: black;
                font-family:fantasy, copperplate;
                letter-spacing: 10px;
                font-size: 15px;
                border-radius: 18px;
                width: 40vh;
                padding-left: 20px;
                outline: 13px solid black;
            }

            .color{
                background-color: #11378A;
                color: white;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                border-radius: 10px;
            }
            .font{
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                background: lightgrey;
                border-radius: 10px;
            }
            .menusystem
            {
                width:1180px;
                height:20px;
                
            }
            a
            {
                display:inline-block;
                height:20px;
                width:220px;
                text-align:center;
                
            }
            .pay
            {
                padding-top:5px;
                color:white;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                padding-left: 10px;
                outline: solid white;
                padding-right: 20px;
                padding-bottom: 10px;
                border-radius: 10px;
            }
            .paymeth{
                border-radius: 8px;
                width: 110px;
                text-align: center;
                margin-left: 25px;
            }

            .paybutt{
                width: 130px;
                font-family:fantasy, copperplate;
                height: 40px;
                letter-spacing: 4px;
                border-radius: 8px;
                color: white;
                background-color: #F1AB3D;
                border-color: white;
            }

            .paybutt:hover {
                cursor: pointer;
                transform: scale(1.1);
                transition: all 0.4s;
                color: black;
                background-color: white;
            }
            .head{
            background-color: black;
            color: white;
            padding-top: 20px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            text-align: center;
            padding-bottom: 20px;
            border-radius: 80px;
            outline: solid white;
        }
        </style>
        
        
        <div class="black_bar">
        <a href="test4.php">
    <img src="home.jpg" class="navlogo">
</a>
            <img src="pixellogo2.jpg" class="pixellogo2">
                    <a href="mycart.php">
    <img src="cart.jpg" class="cartlogo">
</a>
        </div>    
        
        <br>
        <CENTER>
        <table>
            <tr align="center">
                <td class="cart" ><h1>MY CART</h1></td>
            </tr>
        </table><br>
        <?php
ob_start();
include('connect-db2.php');

$result = mysql_query("SELECT * FROM record") or die(mysql_error());

mysql_query("UPDATE record SET Availability='No' WHERE Quantity=0") or die(mysql_error());

// Display the table
echo '<table border="0px" class="icon">';
echo '<tr align="center">';
echo '<td width="300px" height="70px" class="color">GAME ICON</td>';
echo '<td width="300px" class="font">GAME TITLE</td>';
echo '<td width="300px" class="font">QUANTITY</td>';
echo '<td width="300px" class="font">TOTAL PRICE</td>';
echo '</tr>';

while ($row = mysql_fetch_array($result)) {
    if ($row['order_quantity'] >= 1) {
        echo '<tr align="center">';
        echo '<td width="300px" height="400px" class="color"><img src="' . $row['picture'] . '" width="300px" height="400px" class="color"></td>';
        echo '<td width="300px" class="font">' . $row['Title'] . '</td>';
        echo '<td width="300px" class="font"><h3>&nbsp;&nbsp;' . $row['order_quantity'] . '</h3> <a href="minus.php?id=' . $row['id'] . '"><img src="trash.png" alt="Delete" class="navlogo2" width="10" height="10"></a></td>';
        $totalPrice = $row['price'] * $row['order_quantity'];
        echo '<td width="300px" class="font">RM' . $totalPrice . '</td>';
        echo '</tr>';
    }
}

echo '</table><br>';
?>

        <br>
        <p><h3 style="color: white;">( Account )</h3></p>
        <br>
        <form action="invoice.php" method="post">
  <table class="pay">
    <tr>
      <td colspan="3" align="center">
        <h2>PAYMENT METHOD</h2>
      </td>
    </tr>
    <tr>
      <td>
        <label for="username">Your Name:</label>
        <input type="text" id="username" name="username" required>
      </td>
    </tr>
    <tr>
      <td>
        <label for="address">Address:&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <textarea id="address" name="address" required></textarea>
      </td>
    </tr>
    <tr>
      <td>
        <label for="email">Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="email" id="email" name="email" required>
      </td>
    </tr>
    <tr>
      <td>
        <label for="paymeth">Payment Method:</label>
        <select id="paymeth" name="payment_method" class="paymeth">
          <option value="Online Banking">Online Banking</option>
          <option value="Debit Card" selected>Debit Card</option>
          <option value="Credit Card">Credit Card</option>
          <option value="Cash on Delivery">Cash on Delivery</option>
        </select>
      </td>
    </tr>
    <tr>
      <td align="center">
        <input type="submit" value="PAY" class="paybutt">
      </td>
    </tr>
  </table>
</form>

        <br>
        <br>
    </body>
    </html>