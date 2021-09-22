<!DOCTYPE html>
<html>
<head>
	<title>cusomters</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>



	<div id="content" >
	<form action="delete.php" method="post" > 

	<table id="customers">
		<thead>
			<tr>
				<th>accout no</th>
				<th>name</th>
				<th>mail</th>
				<th>amount</th>
				<th>remove</th>
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


$sql="select name,mail_id,account_no,amount from allcustomers";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	echo "<tr>";
        echo "<td>".$row["account_no"] ."</td>" .
        "<td>" . $row["name"]."</td>" .
        "<td>" . $row["mail_id"]."</td>" .
        "<td>" . $row["amount"]."</td>" .
        "<td> <button type='submit' name='name' id='button' value=". $row["name"].">remove</td>"
        ;

        // " - " . $row["name"]. " " . $row["mail"].$row["amount"]. ;
        echo "</tr>";
    }
	
} else {
    echo "0 results";
}






?>
</tbody>
</table>

</form>
<form action="add.php">
<button type='submit' name='name' id='button' style='float:right'>add cutomers</button>
</form>
<form action="index.php">
<button type='submit' name='name' id='button' style='float:left'>login page</button>
</form>
</div>
</body>
</html>