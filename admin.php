<?php
require('config.php');

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location:index.php');
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $id=$_POST['id'];
        $name = $_POST['name'];
        $Description = $_POST['Description'];

        $target_dir = "";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $image = "";

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image= $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        
        $sql = "INSERT INTO plants (id,name,Description,image) VALUES ('$id','$name', '$Description', '$image')";
        $con->query($sql);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        
        $sql = "DELETE FROM plants WHERE id='$id'";
        $con->query($sql);
    }
}

$plants = $con->query("SELECT * FROM plants");
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
    padding: 0;
    background-color: #f9f9f9;
}

h1 {
    color: #4CAF50;
    text-align: center;
}

h2 {
    color: #333;
    margin-top: 30px;
}

form {
    margin-bottom: 20px;
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
}

form input[type="text"],
form input[type="number"],
form input[type="file"] {
    width: calc(100% - 22px);
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
}

form input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #45a049;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

img {
    max-width: 100px;
    border-radius: 5px;
}</style>
    <title>Admin - Manage Plants</title>
</head>
<body>
    <h1>Manage Plants</h1>
    
    <h2>Add New Plant</h2>
    <form method="POST" enctype="multipart/form-data">
        id:<input type="number" name="id" required><br>
        Name: <input type="text" name="name" required><br>
        Description:<input type="text" name="Description" required><br>
        Image URL: <input type="file" name="image" required><br>
        <input type="submit" name="add" value="Add Plant">
    </form>

    <h2>Delete Plant</h2>
    <form method="POST">
        Plant ID: <input type="text" name="id" required><br>
        <input type="submit" name="delete" value="Delete Plant">
    </form>

    <h2>Current Plants</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image URL</th>
        </tr>
        <?php while ($row = $plants->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['Description']; ?></td>
            <td><img src="<?php echo htmlspecialchars($row['image']);?>"width="100px"></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php $con->close(); ?>