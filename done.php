<!DOCTYPE html>
<head>
    <title>message</title>
</head>
<body>
    

<?php
$name1=$_POST['name'];
$mail=$_POST['mail'];
$accno=$_POST['acc'];
$amount=$_POST['amount'];
$pass=$_POST['pass'];




$conn=mysqli_connect("localhost","root","","bank");
if(!$conn)
echo "not connected";
else

{

    $sql = "INSERT INTO allcustomers (account_no, name, mail_id,amount)
    VALUES ('".$accno."', '".$name1."', '".$mail."','".$amount."')";
     $sql1 = "INSERT INTO  cutomer (name,password)
     VALUES ('".$name1."', '".$pass."')";
    if ($conn->query($sql) === TRUE) {
      echo "<h2>New record created successfully</h2>";

      if ($conn->query($sql1) === TRUE) {
        echo "<h2>password  created successfully</h2>";
  
  
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      

    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();






}

?>
<form  action="allcustomers.php">
	<button type="submit" id="button" value="submit" 
>ALL CUTOMERS</button>
</form>
</body>
</html>