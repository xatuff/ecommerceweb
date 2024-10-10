<?php
/*
EDIT.PHP
Allows user to edit specific entry in database
*/
// creates the edit record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable
function renderForm($id, $title,$picture, $preview,$preview2, $preview3,$error)
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Edit Record</title>
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
        border-bottom-left-radius: 10px;
    }
    .tabcol4{
        border-bottom-right-radius: 10px;
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
<h1 class="headnew">EDIT GAME RECORD MEDIA </h1>

<form action="" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<div>
<table align="center" class="newtab" border="1">
<tr align="center">
<td colspan="2" class="tabcol tabcol2"><p><strong>Game ID:</strong> <?php echo $id; ?></p></td>
</tr>

<tr>
<td colspan="2" class="tabcol"><p><strong>Title:</strong> <?php echo $title; ?></p></td>
</tr>

<tr align="center">
<td class="tabcol"><strong>PICTURE<br><br></strong> <input type="text" class="inbox" name="picture" value="<?php echo $picture;?>"/></td><br/>
<td class="tabcol"><strong>PREVIEW 1<br><br></strong> <input type="text" class="inbox" name="preview" value="<?php echo $preview;?>"/></td><br/>
</tr>

<tr align="center">
<td class="tabcol tabcol3"><strong>PREVIEW 2<br><br></strong> <input type="text" class="inbox" name="preview2" value="<?php echo $preview2;?>"/></td><br/>
<td class="tabcol tabcol4"><strong>PREVIEW 3<br><br></strong> <input type="text" class="inbox" name="preview3" value="<?php echo $preview3;?>"/></td><br/>
</tr>

</table>
<br><br>

<center><input type="submit" class="submit" name="submit" value="Submit"></center>

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
$title = $_POST['title'];
$picture = mysql_real_escape_string(htmlspecialchars($_POST['picture']));
$preview = mysql_real_escape_string(htmlspecialchars($_POST['preview']));
$preview2 = mysql_real_escape_string(htmlspecialchars($_POST['preview2']));
$preview3 = mysql_real_escape_string(htmlspecialchars($_POST['preview3']));
 // check that firstname/lastname fields are both filled in
if ($picture == '' || $preview == '')
{
// generate error message
$error = 'ERROR: Please fill in all required fields!';
 //error, display form
renderForm($picture,$preview,$preview2, $preview3,$error);
}
else
{
// save the data to the database
mysql_query("UPDATE record SET picture='$picture',preview='$preview', preview2='$preview2' ,preview3='$preview3' WHERE
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
$preview = $row['preview'];
$preview2 = $row['preview2'];
$preview3 = $row['preview3'];
// show form
renderForm($id,$title, $picture, $preview,$preview2,$preview3,'');
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