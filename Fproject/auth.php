<?php
session_start();

function check_login() {
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
}

function login($username, $password) {
    global $conn;

    $sql = "SELECT * FROM User WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        return true;
    } else {
        return false;
    }
}

function logout() {
    session_destroy();
    header("Location: login.php");
}
?>
