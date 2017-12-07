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
$sale_id_del = $_POST['delete'];

$user_email = $_SESSION['email'];

// Trying to connect to database
if ($mysqli->connect_errno) {
    echo "Could not connect to database \n";
    echo "Error: ". $mysqli->connect_error . "\n";
    exit;
} else {

    $delete_sale_sql = "DELETE FROM yardsale WHERE user_email LIKE '$user_email' and sale_id LIKE '$sale_id_del';";
    
    if ( !$result = $mysqli->query($delete_sale_sql) ) {
        echo "Query failed: ". $mysqli->error. "\n";
        exit;
    } else {
        if (empty($sale_id_del)) {
            echo '<p style="font-family:Arial">No ID was entered, so nothing was deleted.</p>';
        } else {
            echo '<p style="font-family:Arial">If you entered a valid sale ID, then the sale was deleted.</p>';
        }
    }
}
?>
<form action="dashboard.php" method="post">
<input type='submit' name='submit' value='Click to return to dashboard'/>
</form>
</html>
