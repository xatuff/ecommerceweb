<?php
/*
EDIT.PHP
Allows user to edit specific entry in database
*/
// creates the edit record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable
function renderForm($id, $title,$picture, $genre,$price, $availability,$quantity, $years,$error)
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Edit Record</title>
</head>
<body>
<?php
// if there are any errors, display them
if ($error != '')
{
echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}
?> 
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>
<div>
<p><strong>Game ID:</strong> <?php echo $id; ?></p>
<strong>Title: *</strong> <input type="text" name="title" value="<?php echo
$title; ?>"/><br/>
<strong>Picture: *</strong> <input type="text" name="picture" value="<?php echo $picture;
?>"/><br/>
<strong>Genre: *</strong> <input type="text" name="genre" value="<?php echo $genre;
?>"/><br/>
<strong>Price: *</strong> <input type="number" name="price" value="<?php echo $price; ?>"/>
<br/>
<?php 
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    //get the id value
    $id = $_GET['id'];
    
    //retrieve the record from the database based on id
    $result = mysql_query("SELECT * FROM record WHERE id=$id") or die(mysql_error());
if(mysql_num_rows($result) == 1){
$row = mysql_fetch_assoc($result);
//retrieve the record from the database based on id
if($row['Availability'] == "No") {
echo"<strong> Availability: *</strong><br/>";
echo'Not Available<input type = "radio" name = "availability" value = "No" checked />';
echo'Available<input type="radio" name="availability" value="Yes"/><br>';

}else{
    echo"<strong> Availability: *</strong><br/>";
    echo'Not Available<input type = "radio" name = "availability" value = "No" />';
    
    echo'Available<input type="radio" name="availability" value="Yes" checked/><br>';
}
}

}
?>
<strong>Quantity: *</strong> <input type="number" name="quantity" value="<?php echo $quantity;
?>"/><br/>
<strong>years: *</strong>
<input type="number" name="years" value="<?php echo $years; ?>" min="2004" max="2023"/></br>
<p>* Required</p>
<input type="submit" name="submit" value="Submit">
</div>
</form>
</body>
</html>
<?php
}
// connect to the database
ob_start();
Include ('connect-db2.php');
// check if the form has been submitted. If it has, process the form and save it to the database
if (isset($_POST['submit']))
{
// confirm that the 'id' value is a valid integer before getting the form data
if (is_numeric($_POST['id']))
{
// get form data, making sure it is valid
$id = $_POST['id'];
$title = mysql_real_escape_string(htmlspecialchars($_POST['title']));
$picture = mysql_real_escape_string(htmlspecialchars($_POST['picture']));
$genre = mysql_real_escape_string(htmlspecialchars($_POST['genre']));
$availability = mysql_real_escape_string(htmlspecialchars($_POST['availability']));
$quantity = mysql_real_escape_string($_POST['quantity']);
$years = mysql_real_escape_string($_POST['years']);
$price = mysql_real_escape_string($_POST['price']);
 // check that firstname/lastname fields are both filled in
if ($title == '' || $genre == '')
{
// generate error message
$error = 'ERROR: Please fill in all required fields!';
 //error, display form
renderForm($title,$picture,$genre,$price, $availability,$quantity,$years, $error);
}
else
{
// save the data to the database
mysql_query("UPDATE record SET Title='$title', picture='$picture',Genre='$genre', Availability='$availability' ,Quantity='$quantity',Years='$years',price='$price' WHERE
id='$id'")
or die(mysql_error());
// once saved, redirect back to the view page
ob_start();
header("Location: view2.php");
}
}
else
{
// if the 'id' isn't valid, display an error
echo 'Error!';
}
}
else
// if the form hasn't been submitted, get the data from the db and display the form
{
// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{
// query db
$id = $_GET['id'];
$result = mysql_query("SELECT * FROM record WHERE id=$id")
or die(mysql_error());
$row = mysql_fetch_array($result);
// check that the 'id' matches up with a row in the databse
if($row)
{
// get data from db
$title = $row['Title'];
$picture = $row['picture'];
$genre = $row['Genre'];
$price = $row['price'];
$availability = $row['Availability'];
$quantity = $row['Quantity'];
$years = $row['Years'];
// show form
renderForm($id,$title, $picture, $genre,$price, $availability,$quantity,$years, '');
}
else
// if no match, display result
{
echo "No results!";
}
}
else
// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
{
echo 'Error!';
}
}
?>