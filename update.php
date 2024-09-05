<?php
$mysqli = new mysqli("localhost", "root", "", "garciadb");

$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM products WHERE Id = $id");
$product = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $stmt = $mysqli->query("UPDATE products SET Name='$name', Description='$description', Price='$price', Quantity='$quantity' WHERE Id=$id");

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
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="POST" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $product['Name']; ?>"><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"><?php echo $product['Description']; ?></textarea><br>
        
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" value="<?php echo $product['Price']; ?>"><br>
        
        <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity" value="<?php echo $product['Quantity']; ?>"><br><br>
        
        <input type="submit" value="Update Product">
    </form>
</body>
</html>