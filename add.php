<!DOCTYPE html>
<html>
<head>
<meta name="viewport"
     content="width=device-width,initial-scale=1.0">
    <title>add customer</title>
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
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    

<div class="parent">
<div class="container form " style="width: 400px;">
<h2>FILL CUSTOMER DETAILS</h2>
<?php

if(!mysqli_connect("localhost","root","","bank"))
echo  "not connected";
else{
    echo "<form id='add' action='done.php' method='post'>";
echo " <div class='floating-label-group'>
<input type='number' name='acc'  class='form-control' required autocomplete='off'>
<label class='floating-label' style='left: 54px;'>enter account number</label></div>";


echo "<div  class='floating-label-group'>
<input type='text' class='form-control' name='mail' required autocomplete='off'>
<label class='floating-label' style='left: 54px;'>enter mail id</label>

</div>";

echo "<div  class='floating-label-group'>
<input type='number' name='amount' class='form-control'  required autocomplete='off'>
<label class='floating-label' style='left: 54px;'>enter initial amount</label>
</div>";

echo "<div  class='floating-label-group'>
<input type='text' class='form-control' name='name'  required autocomplete='off'>
<label class='floating-label' style='left: 54px;'>enter account holder name</label>

</div>";


echo "<div  class='floating-label-group'>
<input type='text' class='form-control' name='pass'  required autocomplete='off'>
<label class='floating-label' style='left: 54px;'>account holder password</label>
</div>";
echo " <div>
<button id='submit' name='submit'>add customer</button>
</div>";
echo "</form>
</div>";
}



?>

</body>
</html>