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
$new_time = $_POST['update_time'];
$sale_id_upd = $_POST['sale_id2'];
$user_email = $_SESSION['email'];

// Trying to connect to database
if ($mysqli->connect_errno) {
    echo "Could not connect to database \n";
    echo "Error: ". $mysqli->connect_error . "\n";
    exit;
} else {
    $update_time_sql = "UPDATE yardsale SET time = '$new_time' WHERE sale_id LIKE '$sale_id_upd';";
    
    if ( !$result = $mysqli->query($update_time_sql) ) {
        echo "Query failed: ". $mysqli->error. "\n";
        exit;
    } else {
    	if (empty($new_time) || empty($sale_id_upd)) {
            echo '<p style="font-family:Arial">Either no time or ID was entered, so nothing was updated.</p>';
        } else {
    		echo '<p style="font-family:Arial">If you entered a valid sale ID and time, the time was updated.</p>';
    	}
    }
}
?>
<form action="dashboard.php" method="post">
<input type='submit' name='submit' value='Click to return to dashboard'/>
</form>
</html>
