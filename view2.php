<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>View Records</title>
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


                .pixellogo2{
                    width: 260px;
                    height: auto;
                    display: inline-block;
                    margin: auto;
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

                .homelogo{
                    background-color: #333;
                    border-radius: 8px;
                    padding: 10px;
                    outline: solid white;
                }

                .tablerec{
                    color: white;
                    align-items: center;
                    margin-left: auto;
                    margin-right: auto;
                    border: solid white;
                    border-radius: 8px;
                    background-color: #18181b;
                    border-spacing: 20px;
                }

                .head{
                    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                    color: white;
                    text-align: center;
                    font-size: 5vh;
                }

                .mainhead{
                    background-color: black;
                    border-radius: 80px;
                    padding-top: 20px;
                    padding-bottom: 20px;
                    outline: solid white;
                    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                    color: white;
                    text-align: center
                }

                .gottuffed{
                    text-align: center;
                    color: white;
                    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                }

                .adminbutt{
                    border-radius: 8px;
                    padding: 15px;
                }

                .adminbutt:hover {
                    cursor: pointer;
                    transform: scale(1.1);
                    transition: all 0.4s;
                }

                .sidebar {
                    position: fixed;
                    top: 0;
                    left: -300px;
                    width: 130px;
                    height: 100vh;
                    background-color: #333;
                    transition: left 0.3s ease;
                    z-index: 999;
                    border-top-right-radius: 20px;
                    border-bottom-right-radius: 20px;
                }

                .sidebar label {
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    z-index: 1;
                    cursor: pointer;
                }

                .sidebar label span {
                    display: block;
                    width: 30px;
                    height: 4px;
                    background-color: white;
                    margin-bottom: 6px;
                }

                .sidebar ul {
                    list-style-type: none;
                    padding: 0;
                    margin-top: 50px;
                }

                .sidebar ul li {
                    padding: 10px;
                    color: white;
                }

                .sidebar ul li:hover {
                    background-color: #555;
                }

                /* CSS code to show the sidebar when targeted */
                .sidebar:target {
                    left: 0;
                }
</style>
</head>
<body background="background.jpg">
<div class="black_bar">
    <a href="#sidebar"><img src="navbar.jpg" class="navlogo"></a>
    <img src="pixellogo2.jpg" class="pixellogo2" id="home">
 </div>

 <div class="sidebar" id="sidebar">
        <label for="sidebar" onclick="location.href='#'">
        <span></span>
        <span></span>
        <span></span>
    </label>
    <ul>
        <hr>
        <li align="center"><a href="view2.php#home"><img src="home.jpg" class="homelogo" style="width: 50px; height: 50px;"></a></li>
        <li align="center"><a href="view2.php#media"><img src="cut.jpg" class="homelogo" style="width: 50px; height: 50px;"></a></li>
    </ul>
</div>
<?php
/*
VIEW.PHP
Displays all data from 'players' table.
*/
// connect to the database
ob_start();
include ('connect-db2.php');

// get results from database
$result = mysql_query("SELECT * FROM record") or die(mysql_error());

// update Availability to "No" if Quantity is 0
mysql_query("UPDATE record SET Availability='No' WHERE Quantity=0") or die(mysql_error());

// display data in table
echo "<h1 class='mainhead'>ADMIN</h1><br><br><h3 class='head'id='gamerecords'>View Game Records</h3>";
echo "<p class='gottuffed'>Admins! Make sure to use correct File and Save File in the same Location!</p>";
echo "<table cellpadding='10' class='tablerec'>";
echo "<tr> <th><u>Title</th> <th><u>Game ID</th><th><u>CD File</th> <th><u>Genre</th> <th><u>Years</th><th><u>Price</th>
<th><u>Quantity</th><th><u>Availability</th><th></th><th></th><th></th></tr>";
// loop through results of database query, displaying them in the table
while($row = mysql_fetch_array( $result )) {
    // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td>' . $row['Title'] . '</td>';
    echo '<td align="center">' . $row['id'] . '</td>';
    echo '<td>' . $row['picture'] . '</td>';
    echo '<td>' . $row['Genre'] . '</td>';
    echo '<td align="center">' . $row['Years'] . '</td>';
    echo '<td align="center">RM ' . $row['price'] . '</td>';
    echo '<td align="center">' . $row['Quantity'] . '</td>';
    echo '<td align="center">' . $row['Availability'] . '</td>';
    echo '<td><a href="edit2.php?id=' . $row['id'] . '"><button class="adminbutt">Edit</button></a></td>';
    echo '<td><a href="delete2.php?id=' . $row['id'] . '"><button class="adminbutt">Delete</button></a></td>';
    echo '<td><a href="test2.php?id='.$row['id'].'"><button class="adminbutt">View</button></a></td>';
    echo "</tr>";
}
// close table>
echo "</table>";
ob_start();
include ('connect-db2.php');

// get results from database
$result = mysql_query("SELECT * FROM record") or die(mysql_error());
echo "<br><br><br><h3 class='head' id='media'>Game Records Media</h3>";
echo "<table cellpadding='10' class='tablerec' width='1110'>";
echo "<tr> <th><u>Title</th> <th><u>Game ID</th><th><u>CD Pic</th><th><u>Preview</th><th><u>Preview 2</th><th><u>Preview 3</th><th></th>";
// loop through results of database query, displaying them in the table
while($row = mysql_fetch_array( $result )) {
    // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td align="center">' . $row['Title'] . '</td>';
    echo '<td align="center">' . $row['id'] . '</td>';
    echo '<td align="center">' . '<img src="' . $row['picture'] . '" alt="' . $row['Title'] . '" width="100" height="100">' . '</td>';
    echo '<td align="center">' . '<img src="' . $row['preview'] . '" alt="' . $row['Title'] . '" width="100" height="100">' . '</td>';
    echo '<td align="center">' . '<img src="' . $row['preview2'] . '" alt="' . $row['Title'] . '" width="100" height="100">' . '</td>';
    echo '<td align="center">' . '<img src="' . $row['preview3'] . '" alt="' . $row['Title'] . '" width="100" height="100">' . '</td>';


    echo '<td><a href="edit3.php?id=' . $row['id'] . '"><button class="adminbutt">Edit</button></a></td>';
    echo "</tr>";
    
}
// close table>
echo "</table>";
?>
<br>
<br>
<p align="center"><a href="new2.php"><button class="adminbutt">NEW RECORD</button></a></p>
</body>
</html>