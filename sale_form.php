<!DOCTYPE HTML>
<html>
<body>
        <u><h1 style="font-family:Arial;">CS 405 Yard Sale</h1></u>
        <h2 style="font-family:Arial;">User Dashboard</h2>

        <div id="yardsale">
        <fieldset style="width:30%"><legend><p style="font-family:Arial;">Create a Yard Sale</p></legend>
        <table border="0">

        <!-- Yard Sale fields -->
        <form method="POST" action="post_sale.php">
        <tr>
        <td><p style="font-family:Arial;">Date</p></td>
        <td height="5px"> <input type="date" name="date" placeholder="YYYY-MM-DD"></td>
        </tr>

        <tr>
        <td><p style="font-family:Arial;">Time</p></td>
        <td height="5px"> <input type="time" name="time" placeholder="HH:MM:SS"></td>
        </tr>

        <tr>
        <td><p style="font-family:Arial;">Type (single/community)</p></td>
        <td height="5px"> <input type="text" name="type"></td>
        </tr>

        <tr>
        <td><p style="font-family:Arial;">Address</p></td>
        <td height="5px"> <input type="text" name="address"></td>
        </tr>

        <tr>
        <td><p style="font-family:Arial;">City</p></td>
        <td height="5px"> <input type="text" name="city"></td>
        </tr>

        <tr>
        <td><p style="font-family:Arial;">State</p></td>
        <td height="5px"> <input type="text" name="state"></td>
        </tr>

        <tr>
        <td><p style="font-family:Arial;">Zipcode</p></td>
        <td height="5px"> <input type="text" name="zipcode"></td>
        </tr>

        <!-- Create button -->
        <tr> 
        <td><input id="button" type="submit" name="submit" value="Create"></td> 
        </tr>  
        </td>
	</tr>  
        </form> 
</table>
</fieldset>
<br>
<button onclick="history.go(-1);">Go Back</button>


</html>
