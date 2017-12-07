<html>
<?php

// insert.php: inserts data from register into table

// Database information
$servername="localhost";
$username="root";
$password="harsh";
$dbname="yardsale";
$mysqli = new mysqli($servername, $username, $password, $dbname);

// POST Data from register.php
$user_name = $_POST['name'];
$user_email = $_POST['email'];
$user_pw = $_POST['pass'];
$user_cpw = $_POST['cpass'];
$user_phone = $_POST['phone_number'];

// Trying to connect to database
if ($mysqli->connect_errno) {
    echo "Could not connect to database \n";
    echo "Error: ". $mysqli->connect_error . "\n";
    exit;
} else {
    if ($user_cpw != $user_pw) {
        echo "Passwords don't match, try again.";
    } else {
        $insert_query = "INSERT INTO user (name, email, phone_number, password) VALUES ('$user_name', '$user_email', '$user_phone', '$user_pw')";
        if (!$result = $mysqli->query($insert_query)) {
            echo "Make sure you entered your phone number correctly - only digits.";
    
        } else {
            echo "You have registered successfully, $user_name.";
        }
    }
   
}
?>
<br><br>
<form action="index.php" method="post">
<input type='submit' name='submit' value='Click to return to home page'/>
</form>

</html>
