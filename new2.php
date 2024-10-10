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
<style>
    .headnew{
        color: white;
        text-align: center;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    .newtab{
        border-radius: 10px;
        padding: 5px;
        color: white;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        background-color: #F1AB3D;
    }
    .tabcol{
        padding: 20px;
        background-color:#18181b ;
    }
    .tabcol2{
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
    }
    .tabcol3{
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
    }
    .inbox{
        border-radius: 8px;
        text-align: center;
    }
    .submit{
        display: block;
        background-color:#F1AB3D ;
        color: white;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        border-radius: 15px;
        font-size: 35px;
        padding: 10px;
        letter-spacing: 3px;
        width: 300px;
    }
    .submit:hover{
        cursor: pointer;
        transform: scale(1.1);
        transition: all 0.4s;
        color: black;
        background-color: white;
    }
</style>
</head>
<body background="background.jpg">
<?php
// if there are any errors, display them
if ($error != '')
{
echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}
?> 
<h1 class="headnew">NEW GAME RECORD</h1>
<form action="" method="post">
<div>

<table align="center" class="newtab" border="1">

<tr align="center">
<td colspan="2" class="tabcol tabcol2"><strong>TITLE<br></strong> <input type="text" class="inbox" name="title" value="<?php echo $title; ?>"/></td><br>
</tr>

<tr align="center">
<td colspan="2" class="tabcol"><strong>CD PICTURE<br></strong> <input type="text" class="inbox" name="picture" value="<?php echo $picture; ?>"/></td><br>
</tr>

<tr align="center">
<td class="tabcol"><strong>GENRE<br></strong>
<select name="genre" class="inbox">
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
</td>

<td class="tabcol"><strong>QUANTITY<br></strong> <input type="text" class="inbox" name="quantity" value="<?php echo $quantity; ?>"/></td>
</tr>

<tr align="center" class="tabrow">
<td class="tabcol"><strong>YEARS<br></strong><input type="number" class="inbox" name="years" value="<?php echo $years; ?>" min="2004" max="2023"/></td>
<td class="tabcol"><strong>PRICE<br></strong><input type="number" class="inbox" name="price" value="<?php echo $price; ?>" min="1"/></td>
</tr>

<tr align="center" class="tabrow">
<td colspan="2" class="tabcol tabcol3"><strong>AVAILABILITY</strong><br><br>
Not Available<input type = "radio" name = "availability" value = "No" />

Available<input type="radio" name="availability" value="Yes" />
</td>
</tr>

<br/>
</table>
<br><br>

<center><input type="submit" name="submit" value="Submit" class="submit"></center>

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
    $Price = mysql_real_escape_string(htmlspecialchars($_POST['price']));
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