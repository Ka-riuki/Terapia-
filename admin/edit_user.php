<?php
include 'config.php';  // <-- ADD THIS
include 'header.php';

if(!isset($_GET['id'])){
    header("Location: users.php");
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();

if(isset($_POST['update_user'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'];

    $stmt = $conn->prepare("UPDATE users SET name=?, email=?, password=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $password, $id);

    if($stmt->execute()){
        echo "<p style='color:green;'>User updated successfully!</p>";
        $user['name'] = $name;
        $user['email'] = $email;
    } else {
        echo "<p style='color:red;'>Error updating user!</p>";
    }
}
?>

<h1>Edit User</h1>
<form method="POST" style="max-width:500px; background:#fff; padding:20px; border-radius:10px; box-shadow:0 4px 8px rgba(0,0,0,0.1);">
    <label>Name</label><br>
    <input type="text" name="name" value="<?php echo $user['name']; ?>" required style="width:100%; padding:10px; margin-bottom:15px;"><br>
    <label>Email</label><br>
    <input type="email" name="email" value="<?php echo $user['email']; ?>" required style="width:100%; padding:10px; margin-bottom:15px;"><br>
    <label>Password (leave blank to keep current)</label><br>
    <input type="password" name="password" style="width:100%; padding:10px; margin-bottom:15px;"><br>
    <button type="submit" name="update_user" style="padding:10px 20px; background:#2980b9; color:#fff; border:none; border-radius:5px; cursor:pointer;">Update User</button>
</form>

<?php include 'footer.php'; ?>
