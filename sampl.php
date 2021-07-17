<!DOCTYPE html>
<html>
<head>
	<title>sample</title>
	
</head>
<body>
	<h1 id="head">this is easy</h1>
<?php
        $name = "Hello World";
        echo "<div id='frst'>this is in div</div>";	
       
    ?>
  
    <script type="text/javascript">

        var x = "<?php echo"$name"?>";
        
        document.getElementById("head").innerHTML=x;
        alert("hi");
    </script>

</body>
</html>