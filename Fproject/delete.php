<?php
include 'db.php';
include 'auth.php';
check_login();

$id = $_GET['id'];

$sql = "DELETE FROM `Order` WHERE id_order='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>