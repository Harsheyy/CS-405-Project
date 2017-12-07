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
$sale_date = $_POST['date'];
$sale_time = $_POST['time'];
$type = $_POST['type'];
$sale_address = $_POST['address'];
$sale_city = $_POST['city'];
$sale_state = $_POST['state'];
$sale_zip = $_POST['zipcode'];

if($type === "single" || $type === "community" || $type === "Community"  || $type === "Single" ){        
       // Trying to connect to database
    if ($mysqli->connect_errno) {
        echo "Could not connect to database \n";
        echo "Error: ". $mysqli->connect_error . "\n";
        exit;
    } else {

        $insert_sale_sql = "INSERT INTO yardsale (type, address, date, city, state, zipcode, time, user_email) VALUES ('$type','$sale_address', '$sale_date', '$sale_city', '$sale_state', '$sale_zip', '$sale_time', '$email')";
        
        if ( !$result = $mysqli->query($insert_sale_sql) ) {
            echo "Query failed: ". $mysqli->error. "\n";
            echo $sale_date;
            exit;
        } else {
            echo "Yard sale created successfully.";
        }
    }
} else {
  echo "Enter Single or Community within the Type field"."\n";
}


?>
<br><br>
<form action="dashboard.php" method="post">
<input type='submit' name='submit' value='Click to return to dashboard'/>
</form>
</html>
