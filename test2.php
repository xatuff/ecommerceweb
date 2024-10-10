<?php
//connect to the database
include('connect-db2.php');

//check if id parameter is set
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    //get the id value
    $id = $_GET['id'];
    
    //retrieve the record from the database based on id
    $result = mysql_query("SELECT * FROM record WHERE id=$id") or die(mysql_error());
    
    //check if the record exists
    if(mysql_num_rows($result) == 1){
        //fetch the record as an associative array
        $row = mysql_fetch_assoc($result);
        
        //display the record information
        echo '<p><strong>ID:</strong> '.$row['id'].'</p>';
        echo '<p><img src="'.$row['picture'].'" alt="'.$row['Title'].'"></p>';
        echo '<p><strong>Title:</strong> '.$row['Title'].'</p>';
        echo '<p><strong>Genre:</strong> '.$row['Genre'].'</p>';
        echo '<p><strong>Availability:</strong> '.$row['Availability'].'</p>';
        echo '<p><strong>Quantity:</strong> '.$row['Quantity'].'</p>';
        echo '<p><strong>Years:</strong> '.$row['Years'].'</p>';

        //check if availability is "No"
        if($row['Availability'] == "No") {
            //display a message
            echo '<p>Sorry, this item is not currently available.</p>';
            echo'<a href="view2.php">Return to view.php</a></p>';
        } else {
            //display the quantity input form
            echo '<form action="" method="post">';
            echo '<label for="quantity">Quantity:</label>';
            echo '<input type="number" name="quantity" id="quantity" min="1" max="'.$row['Quantity'].'" required>';
            echo '<input type="submit" name="submit" value="Update Quantity">';
            echo '</form>';

            //check if form is submitted
            if(isset($_POST['submit'])){
                //get the quantity value
                $quantity = $_POST['quantity'];

                //check if quantity is valid
                if($quantity > 0 && $quantity <= $row['Quantity']){
                    //update the record with new quantity
                    $new_quantity = $row['Quantity'] - $quantity;
                    mysql_query("UPDATE record SET Quantity=$new_quantity WHERE id=$id") or die(mysql_error());

                    //display success message
                    echo '<p>Quantity updated successfully.</p>';

                    //update the row variable with new quantity
                    $row['Quantity'] = $new_quantity;
                    mysql_query("UPDATE record SET Availability='No' WHERE Quantity=0") or die(mysql_error());

                    

                    //redirect to view2.php
                    header("Location: view2.php");
                    exit;
                } else {
                    //display error message
                    echo '<p>Invalid quantity input.</p>';
                }
            }
        }
    } else {
        //if the record does not exist
        echo 'Record not found.';
    }
} else {
    //if id parameter is not set or not valid
    echo 'Invalid request.';
}
?>
