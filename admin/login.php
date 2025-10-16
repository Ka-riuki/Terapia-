<?php
session_start();
include 'config.php';

if(isset($_SESSION['admin_id'])){
    header("Location: dashboard.php");
    exit();
}

$error = "";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admins WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){
        $admin = $result->fetch_assoc();
        if(password_verify($password, $admin['password'])){
            $_SESSION['admin_id'] = $admin['admin_id'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Admin not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
<style>
body { font-family: Arial, sans-serif; background:#f0f2f5; display:flex; justify-content:center; align-items:center; height:100vh; }
.login-box { background:#fff; padding:30px; border-radius:10px; box-shadow:0 4px 8px rgba(0,0,0,0.1); width:300px; }
.login-box h2 { text-align:center; margin-bottom:20px; }
.login-box input { width:100%; padding:10px; margin:10px 0; border:1px solid #ccc; border-radius:5px; }
.login-box button { width:100%; padding:10px; background:#2980b9; color:#fff; border:none; border-radius:5px; cursor:pointer; }
.error { color:red; text-align:center; }
</style>
</head>
<body>
<div class="login-box">
    <h2>Admin Login</h2>
    <?php if($error) echo "<p class='error'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</div>
</body>
</html>
