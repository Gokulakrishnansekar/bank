<?php 
	$servername =  'localhost';
	$username = 'root';
	
	$password = '';
	$database='bank';
	$conn = mysqli_connect($servername, $username, $password,$database,);
if (!$conn) {
	
  die("Connection failed: " . mysqli_connect_error());
}
$username= $_POST["name"];
$sql="delete cutomer,allcustomers from cutomer inner join allcustomers on cutomer.name='".$username."' and allcustomers.name='".$username."'";

	if($conn->query($sql)==true)
    {
        echo "record deleted successfully";
    }
    else
    echo "record not deleted";
	?>
    <form  action="allcustomers.php">
	
	<button type="submit" id="button" value="submit" 
>ALL CUTOMERS</button>