<?php
include 'db.php';
include 'auth.php';
check_login();

$sql = "SELECT * FROM `Order`";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .button.logout {
            background-color: #dc3545;
        }
        .button.logout:hover {
            background-color: #c82333;
        }
        .button.view {
            background-color: #28a745;
        }
        .button.view:hover {
            background-color: #218838;
        }
        .button.edit {
            background-color: #ffc107;
            color: #212529;
        }
        .button.edit:hover {
            background-color: #e0a800;
        }
        .button.delete {
            background-color: #dc3545;
        }
        .button.delete:hover {
            background-color: #c82333;
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
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <a href="logout.php" class="button logout">Logout</a>
    <h1>Orders</h1>
    <a href="create.php" class="button">Create New Order</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['customer_name']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['number']; ?></td>
                <td><?php echo $row['total_price']; ?></td>
                <td>
                    <a href="read.php?id=<?php echo $row['id_order']; ?>" class="button view">View</a>
                    <a href="update.php?id=<?php echo $row['id_order']; ?>" class="button edit">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id_order']; ?>" class="button delete">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
