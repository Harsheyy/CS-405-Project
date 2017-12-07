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
        $sql_item ="select * from item where name like '%$search_value%'";

        $res=$con->query($sql_item);

        echo "<h3><u>Search Results</u></h3>";
        echo "<p>If your search query was empty, all results will be shown.</p>";
        
        $counter = 0;

        while($row=$res->fetch_assoc()) {
            $counter += 1;
            echo "<u>Result #" . $counter . "</u><br>";
            echo "<ul>";
                $sale_id = $row["belonging_sale_id"];

                echo "<li>Item ID: " . $row["item_id"] . "</li>";
                echo "<li>Item Name: " . $row["name"] . "</li>";
                echo "<li>Item Price: " . $row["price"] . "</li>";
                echo "<li>Item Quantity: " . $row["quantity"] . "</li>";
                echo "<li>Belonging Sale ID: " . $sale_id . "</li>";

                echo "<br>";

                $sql_sale ="select * from yardsale where sale_id like '$sale_id'";

                $res2 = $con->query($sql_sale);

                while($row2 = $res2->fetch_assoc()) {
                    echo "<li>Sale " . "$sale_id" . " Type: " . $row2["type"] . "</li>"; // FIX FIX FIX
                    echo "<li>Sale " . "$sale_id" . " Address:  " . $row2["address"] . "</li>";
                    echo "<li>Sale " . "$sale_id" . " City: " . $row2["city"] . "</li>";
                    echo "<li>Sale " . "$sale_id" . " State:  " . $row2["state"] . "</li>";
                    echo "<li>Sale " . "$sale_id" . " Zipcode:  " . $row2["zipcode"] . "</li>";
                    echo "<li>Sale " . "$sale_id" . " Date: " . $row2["date"] . "</li>";
                    echo "<li>Sale " . "$sale_id" . " Time: " . $row2["time"] . "</li>";
                    echo "<li>Sale " . "$sale_id" . " Contact: " . $row2["user_email"] . "</li>";
                }
            
            echo "</ul>";
        }       
    }
?>




<button onclick="history.go(-1);">Go Back</button>
