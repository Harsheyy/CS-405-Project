<html>
<?php
session_start();

// Database information
$servername="localhost";
$username="root";
$password="harsh";
$dbname="yardsale";
$mysqli = new mysqli($servername, $username, $password, $dbname);

$email = $_SESSION['email'];

$sale_id = $_POST["sale_id3"];
$item_name = $_POST["item_name"];
$item_quantity = $_POST["quantity"];
$price = $_POST["price"];


if ($mysqli->connect_errno) {
    echo "Could not connect to database \n";
    echo "Error: ". $mysqli->connect_error . "\n";
    exit;
} else {

    $insert_item_sql = "INSERT INTO item (name, price, quantity, belonging_sale_id) VALUES ('$item_name','$price', '$item_quantity', '$sale_id')";
    
    if ( !$result = $mysqli->query($insert_item_sql)) {
        echo "Query failed: ". $mysqli->error. "\n";
        //echo $sale_date;
        exit;
    } else {
        echo "Item added successfully.";
    }
}



?>
<br><br>
<form action="dashboard.php" method="post">
<input type='submit' name='submit' value='Click to return to dashboard'/>
</form>
</html>