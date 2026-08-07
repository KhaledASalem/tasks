<?php
require_once 'db.php';

if (isset($_SESSION['user_id'])) {
    header('Location: profile.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Authentication System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome</h1>
        <p class="subtitle">login or register to access your profile
        </p>

        <a href="login.php" class="btn" style="margin-bottom: 12px; display:block;">Login</a>
        <a href="register.php" class="btn" style="background:#182848; display:block;">Register</a>
    </div>
</body>
</html>
