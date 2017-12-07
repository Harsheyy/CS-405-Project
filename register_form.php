<!DOCTYPE HTML>
<html>
	<body>
		<u><h1 style="font-family:Arial;">CS 405 Yard Sale</h1></u>
		<fieldset style="width:30%"><legend>Registration Form</legend>
		<table border="0">
			<tr>
			<form method="POST" action="post_user.php">
				<td>Name</td>
				<td> <input type="text" name="name"></td>
			</tr>
			
			<tr>
				<td>Email</td>
				<td> <input type="text" name="email"></td>
			</tr>
			
			<tr>
				<td>Phone number</td>
				<td> <input type="text" name="phone_number"></td>
			</tr>
			
			<tr>
				<td>Password</td>
				<td> <input type="password" name="pass"></td>
			</tr>
			
			<tr>
				<td>Confirm Password </td>
				<td><input type="password" name="cpass"></td>
			</tr>
			
			<tr>
				<td><input id="button" type="submit" name="submit" value="Sign-Up"></td>
			</form>
			</tr>
		</table>
		</fieldset>
<br>
<button onclick="history.go(-1);">Go Back</button>

</body>
</html>