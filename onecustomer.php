<!DOCTYPE html>
<html>
<head>

	<title>customer</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="styles.css">
	
</head>
<body onload="myFunction() " style="margin:0;">
	<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">

<?php 


$name=$_GET["name"];
 
$servername =  'localhost';
$username = 'root';
$password = 'root';
$database='bank';
$conn = mysqli_connect($servername, $username, $password,$database,);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql="select name,id,email_id,amount from customer where name='".$name."'";

$result = mysqli_query($conn, $sql);
if (!empty($result) && $result->num_rows > 0) {
  // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
    	
        echo "<div id='onecus'><div>acc_no  " . $row["id"]."</div>" .
        "<div>name  :" . $row["name"]."</div>" .
        "<div>mail  :" . $row["email_id"]."</div>" .
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
$sql="select name from customer where name!='".$name."'";


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
       	<button type='submit' name='submit' id='sub' >&#10146; initiate</button> 
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
	$sql="select amount from customer where name='".$send."'";		
				


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
    	$sql = "UPDATE customer SET amount='".$curamntsend."' WHERE name='". $sendername."' AND '".$curamntsend."'>0";
   if ($conn->query($sql) === TRUE ) {
   	$sql = "UPDATE customer SET amount='".$curamntrecv."' WHERE name='". $send."' AND '".$curamntsend."'>0";
   	if ( $conn->query($sql) === TRUE ){
   		//$sql = "UPDATE customers SET amount='".$curamntrecv."' WHERE name='". $send."'";
   			$sql="select amount from customer where name='".$send."'";	
   			$result = mysqli_query($conn, $sql);
   			if (mysqli_num_rows($result) > 0) {
   				while($row = mysqli_fetch_assoc($result))  
   					//echo $send."  :receiver  has new  balance of: ".$row["amount"]."<br>";

   				$sql="select amount from customer where name='".$sendername."'";	
   				$result = mysqli_query($conn, $sql);
   			if (mysqli_num_rows($result) > 0) {
   				while($row = mysqli_fetch_assoc($result)) 
   				//echo $sendername.": sender has new  balance of: ".$row["amount"]."<br>";
   				$total=$curamntsend;

   			$sql=" insert into transhistory(sender,receiver,tranfer_amount) values('".$sendername."','".$send."',".$amount.")";
   		//	$result=mysqli_query($conn,$sql);
   			 if ($conn->query($sql) === TRUE ) {
   			 		$total=$curamntsend;
   		 echo "<div class='isa_success'>
        <i class='fa fa-check'></i>
       transaction successfull</div>";
   		 
   
}
else
{
	echo "error in update history";
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
<form  action='index.html'>
	<button type='submit'  value='submit' id='allcus' style='float:right' >HOME</button>
	

	</form>

<form  action='history.php'>
	<button type='submit'  value='submit' id='allcus' style='float:left' >HISTORY</button>
	
	<br>
	</form>
";
?>


	<script type="text/javascript">

        var x = "<?php echo"$total"?>";
        
        document.getElementById("total").innerHTML=x;
      var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}

    </script>



</body>
</html>