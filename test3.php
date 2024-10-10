<html>
    <title>test</title>
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
                color: white;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            .font{
                color: white;                
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            .add{
                color: white;
                background-color: #F1AB3D;
                width: 250px;
                height: 50px;
                text-align: center;
                cursor: pointer;
                margin-top: 50px;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }
            
            .add:hover {
                cursor: pointer;
                transform: scale(1.1);
                transition: all 0.4s;
                color: black;
                background-color: white;
            }

            .out{
                outline: 2px solid white;
                height: 50vh;
                width: 100vh;
                background-position: center;
                justify-content: center;
                border-radius: 10px;
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
        <?php
        //connect to the database
        include('connect-db2.php');

        //check if id parameter is set
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            //get the id value
            $id = $_GET['id'];

            //retrieve the record from the database based on id
            $result = mysql_query("SELECT * FROM record WHERE id=$id") or die(mysql_error());

            //check if the record exists
            if(mysql_num_rows($result) == 1){
                //fetch the record as an associative array
                $row = mysql_fetch_assoc($result);
                echo "<table border='0px' align='center'>";

                if ($row['Availability'] == "No") {
                    // Display a message for unavailable item
                    echo "<tr>";
                    echo "<td><img src='" . $row['picture'] . "' width='350' height='450'></td>";
                    echo "<td class='font' align='center' width='300px'><br><br><br><br><br><br>TITLE: " . $row['Title'] . "<br>PRICE: RM" . $row['price'] . "<br>GENRE: " . $row['Genre'] . "
                    <br>YEAR PUBLISHED: " . $row['Years'] . "<br><br><br><br><br><br><b style='color: red'<br>(ITEM IS NOT AVAILABLE)</b><br><button class='add' onclick=\"window.location.href='test4.php'\">RETURN BACK TO HOME</button></td>";
                } else {
                    // Display the quantity input form if available
                    if ($row['order_quantity'] < $row['Quantity']) {
                        echo "<tr>";
                        echo "<td><img src='" . $row['picture'] . "' width='350' height='450'></td>";
                        echo "<td class='font' align='center' width='300px'><br><br><br><br><br><br>TITLE: " . $row['Title'] . "<br>PRICE: RM" . $row['price'] . "<br>GENRE: " . $row['Genre'] . "
                        <br>YEAR PUBLISHED: " . $row['Years'] . "<br><br><br><br><br><br><b style='color: limegreen'<br>(AVAILABLE)</b><br><button class='add' onclick=\"window.location.href='add.php?id=" . $row['id'] . "'\">ADD TO CART</button></td>";
                    }else{
                        echo "<tr>";
                    echo "<td><img src='" . $row['picture'] . "' width='350' height='450'></td>";
                    echo "<td class='font' align='center' width='300px'><br><br><br><br><br><br>TITLE: " . $row['Title'] . "<br>PRICE: RM" . $row['price'] . "<br>GENRE: " . $row['Genre'] . "
                    <br>YEAR PUBLISHED: " . $row['Years'] . "<br><br><br><br><br><br><b style='color: red'<br>(ITEM IS NOT AVAILABLE)</b><br><button class='add' onclick=\"window.location.href='test4.php'\">RETURN BACK TO HOME</button></td>";
                    }
                }
                


echo "</tr>";

echo "<tr height='100px'>";
echo "<td class='font'><br><br><h2><u>OVERVIEW</u></h2></td>";
echo "<td></td>";
echo "</tr>";
echo "</table>";

echo "<center>";
echo "<div class='out'>";
echo "<img src='" . $row['preview'] . "' alt='Game Overview' style='height: 50vh; width: 100vh; background-position: center; justify-content: center; border-radius: 10px;'><br><br><br><br>";
echo "<img src='" . $row['preview2'] . "' alt='Game Overview' style='height: 50vh; width: 100vh; background-position: center; justify-content: center; border-radius: 10px;'><br><br><br><br>";
echo "<img src='" . $row['preview3'] . "' alt='Game Overview' style='height: 50vh; width: 100vh; background-position: center; justify-content: center; border-radius: 10px;'><br><br><br><br>";
echo "</div>";
echo "<br>";
echo "</center>";
                ?>
        <?php
            } else {
                //if the record does not exist
                echo 'Record not found.';
            }
        } else {
            //if id parameter is not set or not valid
            echo 'Invalid request.';
        }
        ?>
    </body>
</html>
