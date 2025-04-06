<?php
$mysqli = new mysqli("mysql", "started-user", "started-password", "started");
if ($mysqli->connect_error) {
    exit("Connection failed: " . $mysqli->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
    echo "Success!<br/><a href='../login/login.html'>Login</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
