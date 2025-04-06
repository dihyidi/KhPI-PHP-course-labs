<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
</head>
<body>
<h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
<a href="../logout/logout.php">Logout</a>
</body>
</html>
