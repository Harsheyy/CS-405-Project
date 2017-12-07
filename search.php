<?php
$servername="localhost";
$username="root";
$password="harsh";
$dbname="yardsale";

$search_value=$_POST["search"];
$con=new mysqli($servername,$username,$password,$dbname);

if($con->connect_error) {
    echo 'Connection Faild: '.$con->connect_error;
    } else {
        $sql="select * from yardsale where address like '%$search_value%' OR city like '%$search_value%' OR state like '%$search_value%'";

        $res=$con->query($sql);

        echo "<h3><u>Search Results</u></h3>";
        echo "<p>If your search query was empty, all results will be shown.</p>";
        
        $counter = 0;

        while($row=$res->fetch_assoc()) {
            $counter += 1;
            echo "<u>Result #" . $counter . "</u><br>";
            echo "<ul>";
                echo "<li>ID: " . $row["sale_id"] . "</li>";
                echo "<li>Type: " . $row["type"] . "</li>";
                echo "<li>Address:  " . $row["address"] . "</li>";
                echo "<li>City: " . $row["city"] . "</li>";
                echo "<li>State:  " . $row["state"] . "</li>";
                echo "<li>Zipcode:	" . $row["zipcode"] . "</li>";
                echo "<li>Date: " . $row["date"] . "</li>";
                echo "<li>Time: " . $row["time"] . "</li>";
                echo "<li>Contact: " . $row["user_email"] . "</li>";
            echo "</ul>";
        }       
    }
?>


<button onclick="history.go(-1);">Go Back</button>
