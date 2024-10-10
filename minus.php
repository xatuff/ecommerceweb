<?php
/*
MINUS.PHP
Subtracts 1 from the 'order_quantity' column for a specific entry in the 'record' table
*/

// Connect to the database
ob_start();
include('connect-db2.php');

// Check if the 'id' variable is set in the URL and check that it is valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Get the id value
    $id = $_GET['id'];

    // Retrieve the current 'order_quantity' value for the record
    $result = mysql_query("SELECT order_quantity FROM record WHERE id = $id") or die(mysql_error());

    if (mysql_num_rows($result) == 1) {
        // Fetch the current 'order_quantity' value
        $row = mysql_fetch_assoc($result);
        $orderQuantity = $row['order_quantity'];

        if ($orderQuantity > 0) {
            // Update the entry to subtract 1 from the 'order_quantity' column
            $result = mysql_query("UPDATE record SET order_quantity = order_quantity - 1 WHERE id = $id") or die(mysql_error());
        }
    }
}

// Redirect back to the view page
header("Location: mycart.php");
?>
