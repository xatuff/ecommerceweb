<?php
/*
DELETE.PHP
Deletes a specific entry from the 'record' table
*/
// connect to the database
ob_start();
include('connect-db2.php');
// check if the 'id' variable is set in URL, and check that it is valid
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
// get id value
$id = $_GET['id'];
// delete the entry
$result = mysql_query("DELETE FROM record WHERE id=$id")
or die(mysql_error());
// redirect back to the view page
header("Location: view2.php");
}
else
// if id isn't set, or isn't valid, redirect back to view page
{
header("Location: view2.php");
}
?>