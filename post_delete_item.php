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

// POST data from homepage.php
$sale_id = $_POST["sale_id4"];
$item_name = $_POST["item_name"];


if ($mysqli->connect_errno) {
    echo "Could not connect to database \n";
    echo "Error: ". $mysqli->connect_error . "\n";
    exit;
} else {

    $delete_item_sql = "DELETE FROM item WHERE name LIKE '$item_name' and belonging_sale_id LIKE '$sale_id';";
    
    if ( !$result = $mysqli->query($delete_item_sql) ) {
        echo "Query failed: ". $mysqli->error. "\n";
        //echo $sale_date;
        exit;
    } else {
        echo "Item deleted successfully.";
    }
}



?>
<br><br>
<form action="dashboard.php" method="post">
<input type='submit' name='submit' value='Click to return to dashboard'/>
</form>
</html>
