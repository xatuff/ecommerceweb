<?php
/*
NEW.PHP
Allows user to create a new entry in the database
*/
// creates the new record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable
include('connect-db2.php');
function renderForm($title,$picture,$genre,$quantity,$years,$Availability, $error)
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>New Record</title>
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
<div>
<strong>title: *</strong> <input type="text" name="title" value="<?php echo $title; ?>"
/><br/>
<strong>CD picture: *</strong> <input type="text" name="picture" value="<?php echo $picture; ?>"
/><br/>
<strong>Genre: *</strong>
<select name="genre">
  <option value="Action" <?php if ($genre == 'Action') echo 'selected'; ?>>Action</option>
  <option value="Adventure" <?php if ($genre == 'Adventure') echo 'selected'; ?>>Adventure</option>
  <option value="Role-playing (RPG)" <?php if ($genre == 'Role-playing (RPG)') echo 'selected'; ?>>Role-playing (RPG)</option>
  <option value="Strategy" <?php if ($genre == 'Strategy') echo 'selected'; ?>>Strategy</option>
  <option value="Simulation" <?php if ($genre == 'Simulation') echo 'selected'; ?>>Simulation</option>
  <option value="Sports" <?php if ($genre == 'Sports') echo 'selected'; ?>>Sports</option>
  <option value="Puzzle" <?php if ($genre == 'Puzzle') echo 'selected'; ?>>Puzzle</option>
  <option value="Racing" <?php if ($genre == 'Racing') echo 'selected'; ?>>Racing</option>
  <option value="Fighting" <?php if ($genre == 'Fighting') echo 'selected'; ?>>Fighting</option>
  <option value="Others" <?php if ($genre == 'Others') echo 'selected'; ?>>Others</option>
</select>
<br/>

<strong>quantity: *</strong> <input type="text" name="quantity" value="<?php echo $quantity; ?>"
/><br/>
<strong>years: *</strong>
<input type="number" name="years" value="<?php echo $years; ?>" min="2004" max="2023"/></br>
<strong> Availability: *</strong><br/>
Not Available<input type = "radio" name = "availability" value = "No" />

Available<input type="radio" name="availability" value="Yes" />
<br/>
<strong>Price: *</strong> <input type="number" name="price" value="<?php echo $price; ?>"/>
<br/>
<p>* required</p>
<input type="submit" name="submit" value="Submit">
</div>
</form>
</body>
</html>
<?php
}
// connect to the database
ob_start();
include('connect-db2.php');
// check if the form has been submitted. If it has, start to process the form and save it to the database
if (isset($_POST['submit']))
{
    // get form data, making sure it is valid
    $Title = mysql_real_escape_string(htmlspecialchars($_POST['title']));
    $picture = mysql_real_escape_string(htmlspecialchars($_POST['picture']));
    $Genre = mysql_real_escape_string(htmlspecialchars($_POST['genre']));
    $Years = mysql_real_escape_string($_POST['years']);
    $Quantity = mysql_real_escape_string($_POST['quantity']);
    $Availability = mysql_real_escape_string(htmlspecialchars($_POST['availability']));
    $Price = mysql_real_escape_string(htmlspecialchars($_POST['availability']));
    // check to make sure both fields are entered
    if ($Title == '' || $Genre == '')
    {
        // generate error message
        $error = 'ERROR: Please fill in all required fields!';
        // if either field is blank, display the form again
        renderForm($Title,$picture,$Genre,$Years,$Quantity,$Availability,$Price, $error);
    }
    else
    
    {
        // save the data to the database
        mysql_query("INSERT INTO record (Title,picture,Genre,Quantity,Availability,Years,price) VALUES ('$Title','$picture','$Genre','$Quantity','$Availability','$Years','$Price')")
        or die(mysql_error());
        header("Location: view2.php");
    }
}
else
{
    // if the form hasn't been submitted, display the form
    renderForm('','','','','','','','');
}
?>