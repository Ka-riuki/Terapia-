<?php
include 'config.php';
include 'header.php';

// Fetch totals
$totalUsers = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];
$totalAppointments = $conn->query("SELECT COUNT(*) AS total FROM appointments")->fetch_assoc()['total'];
$totalTestimonials = $conn->query("SELECT COUNT(*) AS total FROM testimonials")->fetch_assoc()['total'];
?>

<style>
/* Modern button style */
.dashboard-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    font-weight: 600;
    padding: 12px 24px;
    border-radius: 30px;
    transition: all 0.3s ease-in-out;
    text-decoration: none;
    color: #fff !important;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.dashboard-btn i {
    margin-right: 8px;
    font-size: 1.2rem;
}

.dashboard-btn-primary {
    background: linear-gradient(45deg, #007bff, #0056b3);
}
.dashboard-btn-primary:hover {
    background: linear-gradient(45deg, #0056b3, #00408f);
    transform: translateY(-3px);
}

.dashboard-btn-success {
    background: linear-gradient(45deg, #28a745, #1e7e34);
}
.dashboard-btn-success:hover {
    background: linear-gradient(45deg, #1e7e34, #155d27);
    transform: translateY(-3px);
}

.dashboard-btn-info {
    background: linear-gradient(45deg, #17a2b8, #11707f);
}
.dashboard-btn-info:hover {
    background: linear-gradient(45deg, #11707f, #0c4f59);
    transform: translateY(-3px);
}
</style>

<div class="container my-5">
    <h1 class="mb-4 text-center">Admin Dashboard</h1>

    <div class="row g-4">

        <!-- Total Users Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-start border-primary h-100 text-center p-4">
                <h5 class="card-title">Total Users</h5>
                <h2 class="card-text mb-3"><?php echo $totalUsers; ?></h2>
                <a href="users.php" class="dashboard-btn dashboard-btn-primary">
                    <i class="fas fa-users"></i> View Users
                </a>
            </div>
        </div>

        <!-- Total Appointments Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-start border-success h-100 text-center p-4">
                <h5 class="card-title">Total Appointments</h5>
                <h2 class="card-text mb-3"><?php echo $totalAppointments; ?></h2>
                <a href="appointments.php" class="dashboard-btn dashboard-btn-success">
                    <i class="fas fa-calendar-check"></i> View Appointments
                </a>
            </div>
        </div>

        <!-- Total Testimonials Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-start border-info h-100 text-center p-4">
                <h5 class="card-title">Total Testimonials</h5>
                <h2 class="card-text mb-3"><?php echo $totalTestimonials; ?></h2>
                <a href="testimonials.php" class="dashboard-btn dashboard-btn-info">
                    <i class="fas fa-comment-dots"></i> View Testimonials
                </a>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>
