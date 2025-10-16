<?php
include 'config.php';   // defines $conn
include 'header.php';

if(isset($_POST['add_user'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role']; // doctor or patient

    // Check if email already exists
    $stmt_check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if($stmt_check->num_rows > 0){
        echo "<p style='color:red;'>Error: Email already exists!</p>";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $role);

        if($stmt->execute()){
            echo "<p style='color:green;'>User added successfully!</p>";
        } else {
            echo "<p style='color:red;'>Error adding user: ".$stmt->error."</p>";
        }
        $stmt->close();
    }
    $stmt_check->close();
}
?>

<h1>Add New User</h1>
<form method="POST" style="max-width:500px; background:#fff; padding:20px; border-radius:10px; box-shadow:0 4px 8px rgba(0,0,0,0.1);">
    <label>Name</label><br>
    <input type="text" name="name" required style="width:100%; padding:10px; margin-bottom:15px;"><br>

    <label>Email</label><br>
    <input type="email" name="email" required style="width:100%; padding:10px; margin-bottom:15px;"><br>

    <label>Password</label><br>
    <input type="password" name="password" required style="width:100%; padding:10px; margin-bottom:15px;"><br>

    <label>Role</label><br>
    <select name="role" required style="width:100%; padding:10px; margin-bottom:15px;">
        <option value="">Select Role</option>
        <option value="doctor">Doctor</option>
        <option value="patient">Patient</option>
    </select><br>

    <button type="submit" name="add_user" style="padding:10px 20px; background:#27ae60; color:#fff; border:none; border-radius:5px; cursor:pointer;">Add User</button>
</form>

<?php include 'footer.php'; ?>
