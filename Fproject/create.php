<?php
include 'db.php';
include 'auth.php';
check_login();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $product_name = $_POST['product_name'];
    $date = $_POST['date'];
    $number = $_POST['number'];
    $price = $_POST['price'];
    $total_price = $_POST['total_price'];

    $sql = "INSERT INTO `Order` (customer_name, product_name, date, number, price, total_price)
            VALUES ('$customer_name', '$product_name', '$date', '$number', '$price', '$total_price')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Create Order</title>
</head>
<body>
    <form method="post">
        <input type="text" name="customer_name" placeholder="Customer Name" required>
        <input type="text" name="product_name" placeholder="Product Name" required>
        <input type="date" name="date" required>
        <input type="number" name="number" placeholder="Quantity" required>
        <input type="number" name="price" placeholder="Price" required>
        <input type="number" name="total_price" placeholder="Total Price" required>
        <button type="submit">Create</button>
    </form>
</body>
</html>
