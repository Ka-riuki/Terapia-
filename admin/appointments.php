<?php
include 'config.php';
include 'header.php';

$result = $conn->query("SELECT a.*, u1.name AS patient_name, u2.name AS doctor_name 
                        FROM appointments a
                        LEFT JOIN users u1 ON a.patient_id = u1.id
                        LEFT JOIN users u2 ON a.doctor_id = u2.id
                        ORDER BY a.appointment_date DESC, a.appointment_time DESC");
?>

<h1>Appointments</h1>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Patient</th>
        <th>Doctor</th>
        <th>Date</th>
        <th>Time</th>
        <th>Department</th>
        <th>Status</th>
        <th>Comments</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['patient_name']; ?></td>
        <td><?php echo $row['doctor_name']; ?></td>
        <td><?php echo $row['appointment_date']; ?></td>
        <td><?php echo $row['appointment_time']; ?></td>
        <td><?php echo $row['department']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><?php echo $row['comments']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<?php include 'footer.php'; ?>
