<?php
session_start();

$mysqli = new mysqli("mysql", "started-user", "started-password", "started");
if ($mysqli->connect_error) {
    exit("Connection failed: " . $mysqli->connect_error);
}

$username = $_POST['username'];
$password = md5($_POST['password']);

$stmt = $mysqli->prepare("SELECT id, username FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($id, $username);
    $stmt->fetch();

    $_SESSION['user_id'] = $id;
    $_SESSION['username'] = $username;

    header("Location: ../welcome/welcome.php");
    exit();
} else {
    echo "Invalid username or password";
}

$stmt->close();
$mysqli->close();
