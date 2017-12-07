<!DOCTYPE HTML>
<!-- HOMEPAGE.PHP -->

<html>
<body>
	<!-- Heading stuff -->
	<u><h1 style="font-family:Arial;">CS 405 Yard Sale</h1></u>
	<h2 style="font-family:Arial;">Welcome to the yard sale webpage!</h2>
	<p style="font-family:Arial;">Continue by logging in or registering a new account!</p>

	<!-- Table with outline -->
	<fieldset style="width:30%"><legend><p style="font-family:Arial;">Log-in Form</p></legend>
		<table border="0">

			<!-- Log in -->
			<form method="POST" action="post_login.php">
				<tr>
					<td>Email</td>
					<td> <input type="text" name="email"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td> <input type="password" name="pass"></td>
				</tr>
				<tr>
					<td><input id="button" type="submit" name="submit" value="Log in"></td>
				
			</form>
			
			<!-- Register -->
			<form method="POST" action="register_form.php">
				
					<td><input id="button" type="submit" name="submit" value="Register"></td>
				</tr>
			</form>

		</table>
	</fieldset>

	<br>

	<fieldset style="width:30%"><legend><p style="font-family:Arial;">Search Form</p></legend>
		<table border="0">
			<!-- Search -->
			<form method="POST" action="search.php">
				<tr>
					<td><input type="submit" value="Search for location"></td>
					<td><input type="text" name="search" placeholder="Location keywords"></td>
				</tr>
			</form>

			<form method="POST" action="search_item.php">
				<tr>
					<td><input type="submit" value="Search for item"></td>
					<td><input type="text" name="search" placeholder="Item keywords"></td>
				</tr>
			</form>

		</table>
	</fieldset>
	<br>
	<p style="font-family:Arial;font-size:70%"><i>Created by Harsh Desai and Steven Penava</i></p>
	<p style="font-family:Arial;font-size:70%"><i>For project purposes, if you want to use manager control, please log into email: Admin and password: password.</i></p>


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
        $sql="select * from ad";

        $res=$con->query($sql);
        $counter = 0;

        while($row=$res->fetch_assoc()) {
            $counter += 1;
            echo "<u>AD #" . $counter . "</u><br>";
            echo "<ul>";
                $sale_id = $row["sid"];
                echo "<li> Sale ID: " . $sale_id . "</li>";
                echo "<br>";

                $sql_sale ="select * from yardsale where sale_id like '%$sale_id%'";

                $res2 = $con->query($sql_sale);

                while($row2 = $res2->fetch_assoc()) {
                    echo "<li>Type: " . $row2["type"] . "</li>"; // FIX FIX FIX
                    echo "<li>Address:  " . $row2["address"] . "</li>";
                    echo "<li>City: " . $row2["city"] . "</li>";
                    echo "<li>State:  " . $row2["state"] . "</li>";
                    echo "<li>Sale " . "$sale_id" . " Zipcode:  " . $row2["zipcode"] . "</li>";
                    echo "<li>Date: " . $row2["date"] . "</li>";
                    echo "<li>Time: " . $row2["time"] . "</li>";
                    echo "<li>Contact: " . $row2["user_email"] . "</li>";
                }
            
            echo "</ul>";
        }     
    }
?>
</body>

</html>


