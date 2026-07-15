<?php
include("../db.php");

// Dashboard Cards
$totalDoctors = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM doctors"));
$totalAppointments = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM book_appointments"));
$pendingAppointments = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM book_appointments WHERE status='Pending'"));

// Today's Appointments
$sql = "SELECT * FROM book_appointments
        WHERE appointment_date = CURDATE()
        ORDER BY appointment_time ASC";

$result = mysqli_query($conn,$sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>

    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   
    <link rel="stylesheet" href="../css/Admin-Dashboard.css">
</head>

<body>

<!-- Hamburger Menu -->
<div class="menu-toggle" onclick="toggleMenu()">
    <i class="fas fa-bars"></i>
</div>

<!-- Sidebar -->
<div class="sidebar">

    <div class="logo">
        <i class="fas fa-heart-pulse"></i>
        <span>MyHealth</span>
    </div>
    <ul>
        <li><a href="#" class="active"><i class="fas fa-home"></i> <span>Dashboard</span></a> </li>
        <li> <a href="#"><i class="fas fa-calendar-alt"></i><span>My Schedule</span></a></li>
        <li><a href="manage-doctors.php"><i class="fa-solid fa-user-doctor"></i><span>Doctor</span></a></li>
        <li><a href="manage-patient.php"><i class="fas fa-users"></i><span>Patients</span></a> </li>
        <li><a href="#"><i class="fas fa-file-medical"></i> <span>Prescriptions</span></a> </li>
        <li><a href="#"><i class="fas fa-chart-line"></i> <span>Reports</span></a></li>
        <li><a href="#"><i class="fas fa-cog"></i><span>Settings</span></a></li>
    </ul>

    <div class="doctor-profile">

        <img src="https://img.freepik.com/free-photo/senior-doctor-with-her-colleagues-hospital_23-2149363065.jpg?w=740"
        alt="Doctor">
        <h4>Dr. Ram Sharma</h4>
        <p>Cardiologist</p>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">

    <div class="topbar">

        <h1>Welcome, Our Hospital</h1>
        <button class="logout-btn"> <i class="fas fa-sign-out-alt"></i> Logout </button>
    </div>

    <!-- Dashboard Cards -->
    <div class="dashboard-cards">
                <div class="card">
            <div class="icon">
                <i class="fa-solid fa-user-doctor"></i>
            </div>
            <div class="info">
                <h3><h3><?php echo $totalDoctors; ?></h3></h3>
                <p>Total Doctors</p>
            </div>
        </div>

        <div class="card">
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="info">
                <h3><?php echo $totalAppointments; ?></h3>
                <p>Total Appointments</p>
            </div>
        </div>

        <div class="card">
            <div class="icon">
                <i class="fas fa-hourglass-half"></i>
            </div>
            <div class="info">
                <h3><?php echo $pendingAppointments; ?></h3>
                <p>Pending Appointments</p>
            </div>
        </div>

        <div class="card">
            <div class="icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="info">
                <h3>4.8</h3>
                <p>Average Rating</p>
            </div>
        </div>
    </div>

    <div class="section-header">
        <h2>Today's Appointments</h2>

       <a href="manage-patient.php" class="view-all">
    View All
    <i class="fas fa-chevron-right"></i>
</a>
    </div>

    <div class="appointment-table-container">

        <table class="appointment-table">
<thead>
<tr>
    <th>Patient Name</th>
    <th>Phone</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Time</th>
    <th>Date</th>
    <th>Department</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</thead>
                <tr>
                   <tbody>

<?php
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
?>

<tr>

<td><?php echo $row['patient_name']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['age']; ?></td>
<td><?php echo $row['gender']; ?></td>


<td><?php echo $row['appointment_time']; ?></td>

<td><?php echo $row['appointment_date']; ?></td>

<td><?php echo $row['department']; ?></td>

<td>

<?php
if($row['status']=="Pending")
{
    echo "<span class='status-pending'>Pending</span>";
}
elseif($row['status']=="Approved")
{
    echo "<span class='status-confirmed'>Approved</span>";
}
else
{
    echo "<span style='color:red;font-weight:bold;'>Rejected</span>";
}
?>

</td>

<td>

<a href="view-appointment.php?id=<?php echo $row['id']; ?>">
<button class="action-btn">
View Details
</button>
</a>

</td>

</tr>

<?php
    }
}
else
{
?>

<tr>
<td colspan="6" style="text-align:center;">
No Appointments Today
</td>
</tr>

<?php
}
?>

</tbody>
    
        </table>
    </div>
    </div>
<!-- End Main Content -->

<script>

function toggleMenu() {

    document.querySelector(".sidebar").classList.toggle("active");

}

// Sidebar बन्द गर्न बाहिर click गर्दा

document.addEventListener("click", function(e){

    const sidebar = document.querySelector(".sidebar");
    const menu = document.querySelector(".menu-toggle");

    if(
        !sidebar.contains(e.target) &&
        !menu.contains(e.target)
    ){
        sidebar.classList.remove("active");
    }

});

</script>

</body>
</html>