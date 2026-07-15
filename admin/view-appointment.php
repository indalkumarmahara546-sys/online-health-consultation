<?php
include("../db.php");

if(!isset($_GET['id'])){
    die("Invalid Request");
}

$id = $_GET['id'];

$sql = "SELECT * FROM book_appointments WHERE id='$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==0){
    die("Appointment Not Found");
}

$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Appointment</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#f4f7fc;
padding:40px;
}

.container{
max-width:700px;
margin:auto;
background:#fff;
padding:30px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,.1);
}

h2{
text-align:center;
margin-bottom:25px;
color:#0d6efd;
}

table{
width:100%;
border-collapse:collapse;
}

table td{
padding:14px;
border-bottom:1px solid #ddd;
}

.title{
font-weight:bold;
width:220px;
background:#f8f9fa;
}

.back-btn{
display:inline-block;
margin-top:25px;
padding:10px 20px;
background:#0d6efd;
color:white;
text-decoration:none;
border-radius:5px;
}

.back-btn:hover{
background:#0b5ed7;
}

.pending{
color:#ffc107;
font-weight:bold;
}

.approved{
color:green;
font-weight:bold;
}

.rejected{
color:red;
font-weight:bold;
}

</style>

</head>

<body>

<div class="container">

<h2>
<i class="fa-solid fa-eye"></i>
Appointment Details
</h2>

<table>

<tr>
<td class="title">Patient Name</td>
<td><?php echo $row['patient_name']; ?></td>
</tr>

<tr>
<td class="title">Phone</td>
<td><?php echo $row['phone']; ?></td>
</tr>

<tr>
<td class="title">Age</td>
<td><?php echo $row['age']; ?></td>
</tr>

<tr>
<td class="title">Gender</td>
<td><?php echo $row['gender']; ?></td>
</tr>

<tr>
<td class="title">Department</td>
<td><?php echo $row['department']; ?></td>
</tr>

<tr>
<td class="title">Appointment Date</td>
<td><?php echo $row['appointment_date']; ?></td>
</tr>

<tr>
<td class="title">Appointment Time</td>
<td><?php echo $row['appointment_time']; ?></td>
</tr>

<tr>
<td class="title">Problem</td>
<td><?php echo $row['message']; ?></td>
</tr>

<tr>
<td class="title">Status</td>

<td>

<?php

if($row['status']=="Pending")
{
echo "<span class='pending'>Pending</span>";
}
elseif($row['status']=="Approved")
{
echo "<span class='approved'>Approved</span>";
}
else
{
echo "<span class='rejected'>Rejected</span>";
}

?>

</td>

</tr>

</table>

<a href="manage-patient.php" class="back-btn">
<i class="fa-solid fa-arrow-left"></i> Back
</a>

</div>

</body>
</html>