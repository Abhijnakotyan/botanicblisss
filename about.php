<?php
$page='about';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Botanic Bliss</title>
    <link rel="icon" type="image/x-icon" href="logo.ico">
    
<link rel="stylesheet" href="home.css">
</head>
<body>
<?php include ('nav.php'); ?>
<div class="slideshow">
      <img src="img1.jpg" style="width:100%";>
      <div><pre class="text1">
        Beautify Your Home With Plants
        Find your dream plant for your home decoration
        with us.And we will make it happen
      </pre>
    </div>
    <button  class="onclick="shopNow()">Buy</button>

    </div>
    <script>
        function shopNow() {
            location.href='plants.php';
        }
    </script>
    </body>
    </html>