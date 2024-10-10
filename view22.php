<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>View Records</title>
</head>
<body>
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
echo "<p><b>View Game Record</b></p>";
echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>Title</th> <th>Game ID</th><th>CD File</th> <th>Genre</th> <th>Years</th><th>Price</th>
<th>Quantity</th><th>Availability</th><th></th><th></th><th></th></tr>";
// loop through results of database query, displaying them in the table
while($row = mysql_fetch_array( $result )) {
    // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td>' . $row['Title'] . '</td>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['picture'] . '</td>';
    echo '<td>' . $row['Genre'] . '</td>';
    echo '<td>' . $row['Years'] . '</td>';
    echo '<td>RM ' . $row['price'] . '</td>';
    echo '<td>' . $row['Quantity'] . '</td>';
    echo '<td>' . $row['Availability'] . '</td>';
    echo '<td><a href="edit2.php?id=' . $row['id'] . '">Edit</a></td>';
    echo '<td><a href="delete2.php?id=' . $row['id'] . '">Delete</a></td>';
    echo '<td><a href="test3.php?id='.$row['id'].'">View</a></td>';
    echo "</tr>";
}
// close table>
echo "</table>";
ob_start();
include ('connect-db2.php');

// get results from database
$result = mysql_query("SELECT * FROM record") or die(mysql_error());
echo "<p><b>Game Records Media</b></p>";
echo "<p>Admins! Make sure to use correct File and Save File in the same Location!</p>";
echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>Title</th> <th>Game ID</th><th>CD Pic</th><th>Preview</th><th>Preview 2</th><th>Preview 3</th><th></th>";
// loop through results of database query, displaying them in the table
while($row = mysql_fetch_array( $result )) {
    // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td>' . $row['Title'] . '</td>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . '<img src="' . $row['picture'] . '" alt="' . $row['Title'] . '" width="100" height="100">' . '</td>';
    echo '<td>' . '<img src="' . $row['preview'] . '" alt="' . $row['Title'] . '" width="100" height="100">' . '</td>';
    echo '<td>' . '<img src="' . $row['preview2'] . '" alt="' . $row['Title'] . '" width="100" height="100">' . '</td>';
    echo '<td>' . '<img src="' . $row['preview3'] . '" alt="' . $row['Title'] . '" width="100" height="100">' . '</td>';


    echo '<td><a href="edit3.php?id=' . $row['id'] . '">Edit</a></td>';
    echo "</tr>";
    
}
// close table>
echo "</table>";
?>
<p><a href="new2.php">Add a new record</a></p>
</body>
</html>