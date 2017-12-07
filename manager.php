<!DOCTYPE HTML>
<!-- HOMEPAGE.PHP -->

<html>
<body>
	<fieldset style="width:30%"><legend><p style="font-family:Arial;">Manager Page</p></legend>
		<table border="0">

			<form method="POST" action="search.php">
				<tr>
					<td><input type="submit" value="View all Yard Sales"></td>
				</tr>
			</form>

			<tr>
				<td><u><p style="font-family:Arial;">Create a promo:</p></u></td>
			</tr>
			<!-- Yard Sale fields -->
			<form method="POST" action="manager.php">
				<tr>
					<td><p style="font-family:Arial;">Enter the Sale ID</p></td>
					<td height="5px"> <input type="text" name="sid"></td>
				</tr>

				<tr>
					<td><p style="font-family:Arial;">Start Date</p></td>
					<td height="5px"> <input type="datetime" name="sdate" placeholder="YYYY-MM-DD"></td>
				</tr>

				<tr>
					<td><p style="font-family:Arial;">End Date</p></td>
					<td height="5px"> <input type="datetime" name="edate" placeholder="YYYY-MM-DD"></td>
				</tr>

				<tr> 
					<td><input id="button" type="submit" name="submit" value="Create"></td> 
				</tr> 
			</form> 
		</table>
	</fieldset>

	<td>
		<form method="POST" action="index.php">
			<input id="button" type="submit" name="submit" value="Sign Out"></td>
		</form>
	</td>

	<fieldset style="width:30%"><legend><p style="font-family:Arial;">Cost:</p></legend>
		<table border="0">
			<?php
	// Database information
			$servername="localhost";
			$username="root";
			$password="harsh";
			$dbname="yardsale";
			$con = new mysqli($servername, $username, $password, $dbname);

			$sale = $_POST['sid'];
			$sdate = $_POST['sdate'];
			$edate = $_POST['edate'];

			if($con->connect_error) {
				echo 'Connection Faild: '.$con->connect_error;
			} else {

				echo "Cost of promotion is $5 per items sold in your yard sale."."<br>";

				$sql="select * from item where belonging_sale_id like '%$sale%'";

				$res=$con->query($sql);

				$counter = 0;
				while($row=$res->fetch_assoc()) {
					$counter += 1;
				}

				$price = $counter * 5;
				echo "Your cost for promotion is $". $price."\n";
				$insert_ad_sql = "INSERT INTO ad (sid, start, end, price) VALUES ('$sale','$sdate', '$edate', '$price')";
				$con->query($insert_ad_sql);

			}
			?>


		</table>
	</fieldset>

	<fieldset style="width:30%"><legend><p style="font-family:Arial;">Revenue:</p></legend>
		<table border="0">
			<?php
			$total_sql="SELECT sum(price) as total FROM ad";

			$result = $con->query($total_sql);

			while ($row2 = mysqli_fetch_assoc($result))
			{ 
				echo "Total revenue is $".$row2['total'];
			}
			?>

		</table>
	</fieldset>
</body>

</html>
