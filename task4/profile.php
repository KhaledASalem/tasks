<?php
require_once 'db.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = (int) $_SESSION['user_id'];
$stmt = mysqli_prepare(
    $conn,
    'SELECT id, name, email, created_at FROM users WHERE id = ? LIMIT 1'
);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
if (!$user) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
}

$name       = htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8');
$email      = htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8');
$id         = htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8');
$created_at = htmlspecialchars($user['created_at'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - User Authentication System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Profile</h1>
        <p class="welcome-msg">Welcome, <?php echo $name; ?></p>

        <div class="profile-info">
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Registration Date:</strong> <?php echo $created_at; ?></p>
        </div>

        <a href="logout.php" class="btn btn-logout">Logout</a>
    </div>
</body>
</html>
