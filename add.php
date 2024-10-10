<?php
/*
ADD.PHP
Adds 1 to the 'order_quantity' column for a specific entry in the 'record' table
*/
// Connect to the database
ob_start();
include('connect-db2.php');

// Check if the 'id' variable is set in the URL, and check that it is valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Get the id value
    $id = $_GET['id'];
    
    // Update the entry to add 1 to the 'order_quantity' column
    $result = mysql_query("UPDATE record SET order_quantity = order_quantity + 1 WHERE id = $id")
        or die(mysql_error());
    
    // Redirect back to the view page
    header("Location: test4.php");
} else {
    // If id isn't set or isn't valid, redirect back to the view page
    header("Location: test4.php");
}
?>
