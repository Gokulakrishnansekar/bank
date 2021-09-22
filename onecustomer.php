<!DOCTYPE html>
<html>
<head>

	<title>customer</title>
	
	<link rel="stylesheet" type="text/css" href="styles.css">
	
</head>
<body  onload='myF'style="margin:0;">
	<div id="loader1"></div>

<div >

<?php 


 
$name= $_GET['name'];
$servername =  'localhost';
$username = 'root';
$password = '';
$database='bank';
$conn = mysqli_connect($servername, $username, $password,$database,);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql="select account_no,name,mail_id,amount from allcustomers where name='".$name."'";

$result = mysqli_query($conn, $sql);
if (!empty($result) && $result->num_rows > 0) {
  // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
    	
        echo "<div id='onecus'><div>acc_no  " . $row["account_no"]."</div>" .
        "<div>name  :" . $row["name"]."</div>" .
        "<div>mail  :" . $row["mail_id"]."</div>" .
        "<div>balance :<span id='total' value='".$row["amount"]."'>" . $row["amount"]."</span></div></div>" ;
        	//$x= $row["amount"]-intval("<div id='val'></div>");
    
        $total=$row["amount"];   //total sender amount
        $sendername=$row["name"];  //sender name


}
}

echo "
	<div id ='form'>
 	<form method='post' id='trans'>
 	 <label for='to' style='margin:5%'>Choose your sender:</label>
  <input   list='names' name='to' class='form-control' autocomplete='off' />

<datalist id='names' required>";
$sql="select name from allcustomers where name!='".$name."'";


$result = mysqli_query($conn, $sql);
if (!empty($result) && $result->num_rows > 0) {
  // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
    	
         echo "<option value= ". $row["name"].">";
    }
       echo "

       	</datalist> 

      <label for='browsers'>enter amount:</label>
      <input type='number' id='browsers' min='0' name='amount' required> 
       	<button type='submit' name='submit' id='button' style='background-color: #4CAF50;color:white'>&#10146; initiate</button> 
       	</form></div>";
       	if (isset($_POST['submit'])){


   			$send= $_POST['to'];         //reciever name
   			$amount= $_POST['amount'];   //transfer amount
   			//echo $send;
   			//echo $amount;
   		if($send==NULL||$amount==NULL)
   		{
   			echo "<div class='isa_warning'>
        <i class='fa fa-warning'></i>
        please fill all the fields</div>";
   		}
   		

   		else
   		{


   			//	echo $send."has received amount : ";
			//	echo $amount."<br>";
					$curamntsend= $total-$amount;    //current seder amount
		//	echo $sendername."has new balace: ".$curamntsend."<br>";
	$sql="select amount from allcustomers where name='".$send."'";		
				


$result = mysqli_query($conn, $sql);
if (!empty($result) && $result->num_rows > 0) {
  // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
    	 
    	//echo $send." has already  balance ".$row["amount"]."<br>";
    	$revcvbal=$row["amount"];
    	 $curamntrecv=$revcvbal+$amount;  //current reciver amount

    	//echo $send." has new  balance of: ".$curamntrecv."<br>";
    	}
    	if($curamntsend<0)
    	{
    		    		echo "<div class='isa_warning'>
        <i class='fa fa-warning'></i>
        enter correct amount</div>";
              }
    	else{
    	$sql = "UPDATE allcustomers SET amount='".$curamntsend."' WHERE name='". $sendername."' AND '".$curamntsend."'>0";
   if ($conn->query($sql) === TRUE ) {
   	$sql = "UPDATE allcustomers SET amount='".$curamntrecv."' WHERE name='". $send."' AND '".$curamntsend."'>0";
   	if ( $conn->query($sql) === TRUE ){
   		//$sql = "UPDATE customers SET amount='".$curamntrecv."' WHERE name='". $send."'";
   			$sql="select amount from allcustomers where name='".$send."'";	
   			$result = mysqli_query($conn, $sql);
   			if (mysqli_num_rows($result) > 0) {
   				while($row = mysqli_fetch_assoc($result))  
   					//echo $send."  :receiver  has new  balance of: ".$row["amount"]."<br>";

   				$sql="select amount from allcustomers where name='".$sendername."'";	
   				$result = mysqli_query($conn, $sql);
   			if (mysqli_num_rows($result) > 0) {
   				while($row = mysqli_fetch_assoc($result)) 
   				//echo $sendername.": sender has new  balance of: ".$row["amount"]."<br>";
   				$total=$curamntsend;

   		//	$sql=" insert into transhistory(sender,receiver,tranfer_amount) values('".$sendername."','".$send."',".$amount.")";
            $sql = "INSERT INTO `transhistory` (`sender`, `receiver`, `time`, `transfer_amount`) VALUES ('".$sendername."','".$send."', CURRENT_TIMESTAMP, ".$amount.")";
         //  $sql=" INSERT INTO `transhistory` (`sender`, `receiver`, `time`, `| tranfer_amount`) VALUES ('', '', CURRENT_TIMESTAMP, '')";
   		//	$result=mysqli_query($conn,$sql);
   			 if ($conn->query($sql) === TRUE ) {
   			 		$total=$curamntsend;
   		 echo "<div class='isa_success'>
        <i class='fa fa-check'></i>
       transaction successfull</div>";
   		 
   
}
else
{
	echo "error in last update history";
}
}
 else {
    echo "1select updating record: " . $conn->error;
     }
$conn->close();
}
 else {
    echo "2select updating record: " . $conn->error;
     }

   }
    else {
    echo "3 receiver Error updating record: " . $conn->error;
     }

   } else {
    echo "4 sender Error updating record: " . $conn->error;
     }
}
    }
     else {
  echo "<div class='isa_error'>
    <i class='fa fa-times-circle'></i>
    name is not registered</div>";
}



		}
		 
}


}
  echo"
<form  action='index.php'>
	<button type='submit'  value='submit' id='button' style='float:right ;background-color: #4CAF50;' >HOME</button>
	

	</form>

<form  action='history.php' >
     
	<button type='submit'  value='submit' id='button' style='float:left ;background-color: #4CAF50;' >HISTORY</button>
	
	<br>
	</form>
";
?>


	<script type="text/javascript">

        var x = "<?php echo"$total"?>";
        
        document.getElementById("total").innerHTML=x;
      

    </script>



</body>
</html>