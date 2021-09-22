<!DOCTYPE html>
<html>
<head>
	<title>history</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="content">
	

	<table id="customers">
		<thead>
			<tr>
				<th>sender</th>
				<th>receiver</th>
				<th>amount</th>
				<th>time</th>
			</tr>
		</thead>
			<tbody>
<?php
$servername =  'localhost';
$username = 'root';
$password = '';
$database='bank';
$conn = mysqli_connect($servername, $username, $password,$database,);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql="select * from transhistory";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
    	echo "<tr>";
        echo "<td>".$row["sender"] ."</td>" .
        "<td>" . $row["receiver"]."</td>" .
        "<td>" . $row["transfer_amount"]."</td>" .
        "<td>" . $row["time"]."</td>" ;

        echo "</tr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);



?>

</tbody>
</table>


</div>
<form action="index.php">
	<button type="submit" style="text-align: center; margin-left: 40%"  id="button">home</button>
</form>

</body>
</html>