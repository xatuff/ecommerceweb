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
        .game{
            background-color: #11378A;
            color: white;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            cursor: pointer;
        }
        .cart{
            color: white;
            cursor: pointer;
        }
        .cartbutt{
            background-color: #F1AB3D;
            color: white;
            border-radius: 30px;
            padding: 10px;
            width: 35vh;
            height: 10vh;
            font-size: 20;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif ;
        }
        .cartbutt:hover {
            cursor: pointer;
            transform: scale(1.1);
            transition: all 0.4s;
            color: black;
            background-color: white;
        }
        .game2{
            background-color: white;
            color:black;
        }
        .gametab{
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
        .game-container::-webkit-scrollbar-thumb{
            background-color: white;
            border-radius: 30px;
            
        }
        .color{
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }
        .color2{
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

    </style>

<div class="black_bar">
    <<a href="test4.php">
    <img src="home.jpg" class="navlogo">
</a>
        <img src="pixellogo2.jpg" class="pixellogo2">
    <a href="mycart.php">
        <img src="cart.jpg" class="cartlogo">
    </a>
</div>
                </div>   

                <h1 class="head">GAMES</h1>
                <?php
/*
VIEW.PHP
Displays all data from 'players' table.
*/
// connect to the database
ob_start();
include ('connect-db2.php');


$result = mysql_query("SELECT * FROM record") or die(mysql_error());

mysql_query("UPDATE record SET Availability='No' WHERE Quantity=0") or die(mysql_error());


// loop through results of database query, displaying them in the table
echo '<div class="game-container">';
echo '<table align="center" class="gametab">';
echo '<tr align="center" class="game">';

while($row = mysql_fetch_array($result)) {
    echo '<td width="300px" height="400px" class="color"><img src="' . $row['picture'] . '" width="300px" height="400px" class="color"></td>';
}

echo '</tr>';
echo '<tr align="center" class="game2">';

mysql_data_seek($result, 0); // Reset the pointer to the beginning of the result set

while($row = mysql_fetch_array($result)) {
    echo '<td class="color2">';
    echo $row['Title'] . ' - ';
    if ($row['Availability'] == 'No') {
        echo '<span style="color: red">Not Available</span>';
    } elseif ($row['Availability'] == 'Yes') {
        echo '<span style="color: limegreen">Available</span>';
    } else {
        echo 'Availability Unknown';
    }
    echo '</td>';
    
}

echo '</tr>';
echo '<tr align="center" class="cart">';

mysql_data_seek($result, 0); // Reset the pointer to the beginning of the result set

while($row = mysql_fetch_array($result)) {
    echo '<td><a href="test3.php?id=' . $row['id'] . '" class="cartbutt">DETAILS</a></td>';
}

echo '</tr>';
echo '</table>';
echo '</div>';
// close table>
echo "</table>";
echo "</div>";
echo "<br><br><br><br><br>";

?>
</body>
</html>