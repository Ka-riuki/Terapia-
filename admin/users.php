<?php
include 'config.php';   // <-- ADD THIS
include 'header.php';
?>

<h1>Manage Users</h1>

<a href="add_user.php" style="display:inline-block; margin-bottom:15px; padding:10px 20px; background:#27ae60; color:#fff; text-decoration:none; border-radius:5px;">
    Add New User
</a>

<table border="1" cellpadding="10" cellspacing="0" width="100%" style="background:#fff; border-radius:10px; overflow:hidden;">
<tr style="background:#34495e; color:#fff;">
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Actions</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM users");
while($user = $result->fetch_assoc()){
    echo "<tr>
        <td>{$user['id']}</td>
        <td>{$user['name']}</td>
        <td>{$user['email']}</td>
        <td>
            <a href='edit_user.php?id={$user['id']}' style='padding:5px 10px; background:#27ae60; color:#fff; text-decoration:none; border-radius:5px;'>Edit</a> 
            <a href='delete_user.php?id={$user['id']}' onclick='return confirm(\"Are you sure?\")' style='padding:5px 10px; background:#c0392b; color:#fff; text-decoration:none; border-radius:5px;'>Delete</a>
        </td>
    </tr>";
}
?>
</table>

<?php include 'footer.php'; ?>
