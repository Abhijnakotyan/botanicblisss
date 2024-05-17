<?php
$page='plants';
?>
<?php
require('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="plants.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Botanic Bliss</title>
    <link rel="icon" type="image/x-icon" href="logo.ico">
</head>
<body class="body">
<?php include ('nav.php'); ?>
<h1 class="heading">Plants</h1>

<?php $plants = $con->query("SELECT * FROM plants");?>
        <?php while ($row = $plants->fetch_assoc()) { ?>
            <div class="product-item">
            <img class="product-image" src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>"width="100">
           <br> <?php echo $row['name']; ?><br>
        <?php echo $row['Description']; ?>
        </div>
        <?php 
        }
        ?>
    <?php $con->close(); ?>
</body>
</html>