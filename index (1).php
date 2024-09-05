<?php
$mysqli = new mysqli("localhost", "root", "", "garciacrud");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garcia CRUD</title>
</head>
<body>
    <h1>Product List</h1>
    <a href="create.php">Add New Product</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['Id']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Description']; ?></td>
            <td><?php echo $row['Price']; ?></td>
            <td><?php echo $row['Quantity']; ?></td>
            <td><?php echo $row['Created_at']; ?></td>
            <td><?php echo $row['Updated_at']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $row['Id']; ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $row['Id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>