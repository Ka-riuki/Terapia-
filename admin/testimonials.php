<?php
include 'config.php';
include 'header.php';

$result = $conn->query("SELECT t.*, u.name AS doctor_name 
                        FROM testimonials t
                        LEFT JOIN users u ON t.doctor_id = u.id
                        ORDER BY t.created_at DESC");
?>

<h1>Testimonials</h1>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Patient Name</th>
        <th>Rating</th>
        <th>Testimonial</th>
        <th>Treatment Type</th>
        <th>Doctor</th>
        <th>Status</th>
        <th>Created At</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['rating']; ?></td>
        <td><?php echo $row['testimonial']; ?></td>
        <td><?php echo $row['treatment_type']; ?></td>
        <td><?php echo $row['doctor_name'] ?? 'N/A'; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><?php echo $row['created_at']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<?php include 'footer.php'; ?>
