<?php
include("../db.php");

// Approve Appointment
if(isset($_GET['approve']))
{
    $id = $_GET['approve'];

    mysqli_query($conn,"UPDATE book_appointments SET status='Approved' WHERE id='$id'");

    header("Location: manage-patient.php");
    exit();
}

// Reject Appointment
if(isset($_GET['reject']))
{
    $id = $_GET['reject'];

    mysqli_query($conn,"UPDATE book_appointments SET status='Rejected' WHERE id='$id'");

    header("Location: manage-patient.php");
    exit();
}

// Delete Appointment
if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query($conn,"DELETE FROM book_appointments WHERE id='$id'");

    header("Location: manage-patient.php");
    exit();
}

// Dashboard Cards
$total = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM book_appointments"));

$pending = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM book_appointments WHERE status='Pending'"));

$approved = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM book_appointments WHERE status='Approved'"));

$rejected = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM book_appointments WHERE status='Rejected'"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Patients</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<link rel="stylesheet" href="../css/manage-patient.css">

</head>

<body>

<div class="container">

<div class="header">

<h2><i class="fa-solid fa-calendar-check"></i>Manage Patients</h2>

<div class="search-box">
<input type="text" id="searchInput" placeholder="Search Patient..."onkeyup="searchPatient()">
</div>

</div>

<div class="cards">

<div class="card total"><h2><?php echo $total; ?></h2><p>Total</p></div>

<div class="card pending"><h2><?php echo $pending; ?></h2><p>Pending</p></div>

<div class="card approved"><h2><?php echo $approved; ?></h2><p>Approved</p></div>

<div class="card rejected"><h2><?php echo $rejected; ?></h2><p>Rejected</p></div>

</div>

<table id="appointmentTable">

<thead>

<tr>

<th>ID</th>
<th>Patient</th>
<th>Phone</th>
<th>Age</th>
<th>Gender</th>
<th>Department</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
<th>Action</th>

</tr>

</thead>

<tbody>
    <?php

$sql = "SELECT * FROM book_appointments ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['patient_name']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['age']; ?></td>
<td><?php echo $row['gender']; ?></td>
<td><?php echo $row['department']; ?></td>
<td><?php echo $row['appointment_date']; ?></td>
<td><?php echo $row['appointment_time']; ?></td>

<td>

<?php

if($row['status']=="Pending")
{
    echo "<span class='pending-status'>Pending</span>";
}
elseif($row['status']=="Approved")
{
    echo "<span class='approved-status'>Approved</span>";
}
else
{
    echo "<span class='rejected-status'>Rejected</span>";
}

?>

</td>

<td>

<a href="view-appointment.php?id=<?php echo $row['id']; ?>"><button class="action-btn view"> View</button></a>

<a href="?approve=<?php echo $row['id']; ?>"><button class="action-btn approve">Approve</button></a>

<a href="?reject=<?php echo $row['id']; ?>"><button class="action-btn reject">Reject</button></a>

<a href="?delete=<?php echo $row['id']; ?>"onclick="return confirm('Delete this appointment?')">
<button class="action-btn delete">Delete</button></a>

</td>

</tr>

<?php
}
?>

</tbody>

</table>
</div>

<script>

function searchPatient(){

let input = document.getElementById("searchInput").value.toUpperCase();

let table = document.getElementById("appointmentTable");

let tr = table.getElementsByTagName("tr");

for(let i=1;i<tr.length;i++){

let td = tr[i].getElementsByTagName("td")[1];

if(td){

let txt = td.textContent || td.innerText;

if(txt.toUpperCase().indexOf(input)>-1){

tr[i].style.display="";

}else{

tr[i].style.display="none";

}

}

}

}

</script>

</body>
</html>