<?php
session_start();
require "../config/database.php";

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $q = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user'");
    $admin = mysqli_fetch_assoc($q);

    if ($admin && password_verify($pass, $admin['password'])) {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Login gagal";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/login.css">
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">
        <h1>Admin Login</h1>
        <p>Enter your credentials to continue</p>

        <form method="POST">
            <div class="field">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="field">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" name="login">Login</button>
        </form>
    </div>
</div>

</body>
</html>