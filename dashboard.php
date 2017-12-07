

<!DOCTYPE HTML>
<!-- DASHBOARD.PHP -->

<html>
	<body>
		<!-- Heading stuff -->
		<u><h1 style="font-family:Arial;">CS 405 Yard Sale</h1></u>
		<!-- Log in form -->
		
		<!-- Table with outline -->
		<fieldset style="width:75%"><legend><p style="font-family:Arial;">User Dashboard</p></legend>
			<table border="0">
				<tr>
					<td>
						<p style="font-family:Arial"><u>My Yard Sales</u></p>

					</td>
				</tr>

						
				<!-- populate table -->
				<!-- SELECT COUNT(user_email) FROM yardsale WHERE user_email LIKE "steven.penava@gmail.com" -->
				<?php 
					session_start();
					$user_email = $_SESSION['email'];
					
					$servername="localhost";
					$username="root";
					$password="harsh";
					$dbname="yardsale";
					$mysqli = new mysqli($servername, $username, $password, $dbname);
					
					if ($mysqli->connect_errno) {
					    echo "Could not connect to database \n";
					    echo "Error: ". $mysqli->connect_error . "\n";
					    exit;
					} else {
						$get_count_sql = "SELECT * FROM yardsale WHERE user_email LIKE '$user_email';";
					    if (!$result = $mysqli->query($get_count_sql)) {
					        echo "Query failed: ". $mysqli->error. "\n";
					        exit;
					    } else {
					    	$counter = 0;
					    	if (mysqli_num_rows($result) > 0) {
					    		
					    		echo "<tr><td>";

					    		while($row = mysqli_fetch_assoc($result)) {
					    			$counter += 1;

					    			$current_id = $row["sale_id"];

					    			echo "<b>Yardsale " . $counter . "<br></b>";
					    			echo "Address: " . $row["address"] . "<br>City: " . $row["city"] . "<br>Type: " . $row["type"] . "<br>State: " . $row["state"] . "<br>Zip: " . $row["zipcode"] . "<br>Date: " . $row["date"] . "<br>Time: " . $row["time"] . "<br>Sale ID: " . $current_id;
					    			echo "<br>";
					    			echo "Items: <br>";

					    			$get_items_sql = "SELECT * FROM item WHERE belonging_sale_id LIKE '$current_id';";
					    			if (!$result2 = $mysqli->query($get_items_sql)) {
								     	echo "Query failed: ". $mysqli->error. "\n";
								     	exit;
								    } else {
								    	while($row = mysqli_fetch_assoc($result2)) {
								    		echo " - Item name: " . $row["name"] . "<br>";
								    		echo " - Item price: $" . $row["price"] . "<br>";
								    		echo " - Item quantity: " . $row["quantity"] . "<br>";
								    		echo " - Item ID: " . $row["item_id"] . "<br>";
								    		echo "<br>";
								    	}
								    }
					    			
					    		}					    		
					    		echo "</td></tr>";



					    	} else {

					    	}
					    }
					}
				?>
				<tr>
					<td><u><p style="font-family:Arial;">Edit Sales</p></u></td>
				</tr>
				<tr>
					<!-- Create -->
					<td>
						<form method="POST" action="sale_form.php"><input id="button" type="submit" name="submit" value="Create Yard Sale"></td></form>
					</td>
	
					
				</tr>


				<form method="POST" action="post_delete.php">
					<tr>
						<td><input id="button" type="submit" name="submit" value="Delete sale:"></td>
						<td> <input type="text" name="delete" placeholder="Enter Sale ID..."></td>
					</tr>
				</form>

				<form method="POST" action="post_update_time.php">
					<tr>
						<td><input id="button" type="submit" name="submit" value="Update sale time:"></td>
						<td> <input type="text" name="sale_id2" placeholder="Enter Sale ID..."></td>
						<td> <input type="time" name="update_time" placeholder="HH:MM:SS"></td>
					</tr>
				</form>

				<tr>
					<td><u><p style="font-family:Arial;">Edit Items</p></u></td>
				</tr>

				<form method="POST" action="post_delete_item.php">
					<tr>
						<td><input id="button" type="submit" name="submit" value="Delete item from sale:"></td>
						<td> <input type="text" name="sale_id4" placeholder="Enter Sale ID..."></td>
						<td> <input type="text" name="item_name" placeholder="Item name..."></td>
					</tr>
				</form>

				<form method="POST" action="post_update_item_q.php">
					<tr>
						<td><input id="button" type="submit" name="submit" value="Update item quantity:"></td>
						<td> <input type="text" name="item_id" placeholder="Enter item ID..."></td>
						<td> <input type="number" name="new_quantity" placeholder="Enter new quantity..."></td>
					</tr>
				</form>

				<form method="POST" action="post_add_item.php">
					<tr>
						<td><input id="button" type="submit" name="submit" value="Add item to sale:"></td>
						<td> <input type="text" name="sale_id3" placeholder="Enter Sale ID..."></td>
						<td> <input type="text" name="item_name" placeholder="Item name..."></td>
						<td> <input type="number" name="quantity" placeholder="Item quantity..."></td>
						<td> <input type="text" name="price" placeholder="Item price..."></td>
					</tr>
				</form>

				<tr>
					<td><u><p style="font-family:Arial;">Account</p></u></td>
				</tr>


				<td>
						<form method="POST" action="index.php"><input id="button" type="submit" name="submit" value="Sign Out"></td></form>
					</td>

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
	</body>
</html>