


<!DOCTYPE html>
<head>
    <title>GKBANK</title>
    <meta name="viewport"
     content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <style>
        	body{ 
    background-image: url(bank1.jpg) ;
  background-blend-mode: multiply;
 background-position: center;
background-repeat: no-repeat;
background-size:inherit;
background-attachment: fixed;
   background-size: cover;
   
   } 
    </style>
</head>
<body>
    
    <div class="parent">
        
        <div class="container form">
            <h2>GK BANK</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get"> 
        <div class="floating-label-group">
            <input type="text" name="uname" id="name" required
             autocomplete="off" class="form-control"  >
             <label class="floating-label">username</label>
        </div>
        <div class="floating-label-group">
            <input type="password" id="password" required name="password"
             autocomplete="off" class="form-control">
             <label class="floating-label">password</label>
        </div>
    <!--    <div class="floating-label-group">
            <input type="mail" id="email" required
             autocomplete="off" class="form-control">
             <label class="floating-label">email</label>
        </div>  -->
        <div>
            <button id="submit" name="submit">login</button>
        </div>
       
    </form>
        </div>
      
        <?php

$servername =  'localhost';
$username = 'root';
$password = '';
$database='bank';
$conn = mysqli_connect($servername, $username, $password,$database,);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else
 {
    
    if(isset($_GET['submit'])) 
    { 
    
   $name= $_GET['uname'];
 
   $pass= $_GET['password'];

   $sql="select password from cutomer where name='".$name."'";
   //echo $sql;
   $result = mysqli_query($conn, $sql);
if (!empty($result) && $result->num_rows > 0) {
  // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
       if($pass==$row["password"])
       {
           echo "ho you are admin";
           if($name=='admin')
           header('Location:jscript.html');
          else
           header('Location:onecustomer.php?name='.$name);
           

       }  
       else
       {
           echo "<h2 style='padding:20px'>your password is not correct</h2>";
       }  
    }
}
else
{
    echo "<h2 style='padding:20px'>something wrong</h2>";
}
}
 }
?>

    </div>
   
    <script src="index.js" ></script>
</body >
    </html>