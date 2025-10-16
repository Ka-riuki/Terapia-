<?php
$password = "admin123"; // the password you want
$hash = password_hash($password, PASSWORD_DEFAULT);
echo "Password: $password<br>";
echo "Hash: $hash";
?>
