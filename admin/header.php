<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>
<style>
body { font-family: Arial, sans-serif; background:#f0f2f5; margin:0; padding:0; }
.navbar { background:#2c3e50; color:#fff; padding:15px 30px; display:flex; justify-content:space-between; align-items:center; }
.navbar a { color:#fff; text-decoration:none; margin-left:20px; font-weight:bold; }
.navbar a:hover { text-decoration:underline; }
.container { padding:20px; max-width:1200px; margin:auto; }
.card { background:#fff; padding:20px; border-radius:10px; box-shadow:0 4px 8px rgba(0,0,0,0.1); margin-bottom:20px; }
</style>
</head>
<body>
<div class="navbar">
    <div><strong>Admin Panel</strong></div>
    <div>
        <a href="dashboard.php">Dashboard</a>
        <a href="users.php">Users</a>
        <a href="logout.php">Logout</a>
    </div>
</div>
<div class="container">
