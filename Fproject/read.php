<?php
include 'db.php';
include 'auth.php';
check_login();

$id = $_GET['id'];

$sql = "SELECT * FROM `Order` WHERE id_order='$id'";
$result = $conn->query($sql);
$order = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Order Details</title>
</head>
<body>
    <h1>Order Details</h1>
    <p>Customer Name: <?php echo $order['customer_name']; ?></p>
    <p>Product Name: <?php echo $order['product_name']; ?></p>
    <p>Date: <?php echo $order['date']; ?></p>
    <p>Quantity: <?php echo $order['number']; ?></p>
    <p>Price: <?php echo $order['price']; ?></p>
    <p>Total Price: <?php echo $order['total_price']; ?></p>
    <a href="index.php">
        <button>Back to Orders</button>
    </a>
</body>
</html>
