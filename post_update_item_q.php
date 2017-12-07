<html>
<?php
session_start();

// Database information
$servername="localhost";
$username="root";
$password="harsh";
$dbname="yardsale";
$mysqli = new mysqli($servername, $username, $password, $dbname);

// POST data from homepage.php
$new_quantity = $_POST['new_quantity'];
$item_id = $_POST['item_id'];

$user_email = $_SESSION['email'];

// Trying to connect to database
if ($mysqli->connect_errno) {
    echo "Could not connect to database \n";
    echo "Error: ". $mysqli->connect_error . "\n";
    exit;
} else {
    $update_item_q_sql = "UPDATE item SET quantity = '$new_quantity' WHERE item_id LIKE '$item_id';";
    
    if ( !$result = $mysqli->query($update_item_q_sql) ) {
        echo "Query failed: ". $mysqli->error. "\n";
        exit;
    } else {
		echo '<p style="font-family:Arial">If you entered a valid item ID and quantity, the item was updated.</p>';
    }
}
?>
<form action="dashboard.php" method="post">
<input type='submit' name='submit' value='Click to return to dashboard'/>
</form>
</html>
