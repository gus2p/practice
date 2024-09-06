<?php
include 'db.php';
include 'auth.php';
check_login();

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $product_name = $_POST['product_name'];
    $date = $_POST['date'];
    $number = $_POST['number'];
    $price = $_POST['price'];
    $total_price = $_POST['total_price'];

    $sql = "UPDATE `Order` SET customer_name='$customer_name', product_name='$product_name', date='$date', number='$number', price='$price', total_price='$total_price' WHERE id_order='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $sql = "SELECT * FROM `Order` WHERE id_order='$id'";
    $result = $conn->query($sql);
    $order = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Update Order</title>
</head>
<body>
    <form method="post">
        <input type="text" name="customer_name" value="<?php echo $order['customer_name']; ?>" required>
        <input type="text" name="product_name" value="<?php echo $order['product_name']; ?>" required>
        <input type="date" name="date" value="<?php echo $order['date']; ?>" required>
        <input type="number" name="number" value="<?php echo $order['number']; ?>" required>
        <input type="number" name="price" value="<?php echo $order['price']; ?>" required>
        <input type="number" name="total_price" value="<?php echo $order['total_price']; ?>" required>
        <button type="submit">Update</button>
        <a href="index.php">
            <button>Back to Orders</button>
        </a>
    </form>
</body>
</html>

