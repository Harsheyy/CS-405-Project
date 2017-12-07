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
$user_email = $_POST['email'];
$user_pw = $_POST['pass'];

$_SESSION['email']= $user_email;

// Trying to connect to database
if ($mysqli->connect_errno) {
    echo "Could not connect to database \n";
    echo "Error: ". $mysqli->connect_error . "\n";
    exit;
} else {

    $validate_email_sql = "SELECT * FROM user where email LIKE '$user_email' and password LIKE '$user_pw'";
    
    if ( !$result = $mysqli->query($validate_email_sql) ) {
        echo "Query failed: ". $mysqli->error. "\n";
        exit;
    } else {
        if ($result->num_rows === 0) {
            echo "Incorrect username/password. Try again." . "\n";
        } else if($user_email === "Admin" && $user_pw === "password"){
            echo "Welcome Manager";
            header("Location: manager.php");
        } else {
            echo "Email exists.";
            header("Location: dashboard.php");
        }
    }
}
?>
<br><br>
<button onclick="history.go(-1);">Go Back</button>
</html>
