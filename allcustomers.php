<!DOCTYPE html>
<html>
<head>
	<title>cusomters</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="content" >
	<form action="onecustomer.php" method="get">

	<table id="customers">
		<thead>
			<tr>
				<th>accout no</th>
				<th>name</th>
				<th>mail</th>
				<th>amount</th>
				<th>transfer</th>
			</tr>
		</thead>
			<tbody>
<?php
$servername =  'localhost';
$username = 'root';
$password = 'root';
$database='bank';
$conn = mysqli_connect($servername, $username, $password,$database,);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Create connection

$sql="select name,id,email_id,amount from customer";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	echo "<tr>";
        echo "<td>".$row["id"] ."</td>" .
        "<td>" . $row["name"]."</td>" .
        "<td>" . $row["email_id"]."</td>" .
        "<td>" . $row["amount"]."</td>" .
        "<td> <button type='submit' name='name' id='button' value=". $row["name"].">transaction</td>"
        ;

        // " - " . $row["name"]. " " . $row["mail"].$row["amount"]. ;
        echo "</tr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);



?>
</tbody>
</table>
</form>
</div>
</body>
</html>