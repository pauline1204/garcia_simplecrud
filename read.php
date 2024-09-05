<?php
$mysqli = new mysqli("localhost", "root", "", "garciadb");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $stmt = $mysqli->query("INSERT INTO products (Name, Description, Price, Quantity) 
        VALUES ('$name', '$description', '$price', '$quantity')");

    if ($stmt) {
        header("Location: index.php");
    } else {
        echo "Error: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
    <h1>Add New Product</h1>
    <form method="POST" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>
        
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price"><br>
        
        <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity"><br><br>
        
        <input type="submit" value="Add Product">
    </form>
</body>
</html>
