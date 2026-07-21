<?php
session_start();
include("../db.php");

$id = $_GET['id'];

$sql = "SELECT * FROM doctors WHERE id='$id'";
$result = mysqli_query($conn,$sql);
$doctor = mysqli_fetch_assoc($result);

$transaction = "TXN".rand(10000000,99999999);
$date = date("d M Y");
$time = date("h:i A");

$payment_method = $_POST['payment'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Successful</title>
    <link rel="stylesheet" href="../css/payment-success.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

<div class="success-box">

<i class="fas fa-check-circle success-icon"></i>

<h2>Payment Successful</h2>

<table>

<tr>
    <td><b>Transaction ID</b></td>
    <td><?php echo $transaction; ?></td>
</tr>

<tr>
    <td><b>Doctor</b></td>
    <td><?php echo $doctor['fullname']; ?></td>
</tr>

<tr>
    <td><b>Amount</b></td>
    <td>Rs. <?php echo $doctor['fee']; ?></td>
</tr>

<tr>
    <td><b>Payment Method</b></td>
    <td><?php echo $payment_method; ?></td>
</tr>

<tr>
    <td><b>Date</b></td>
    <td><?php echo $date; ?></td>
</tr>

<tr>
    <td><b>Time</b></td>
    <td><?php echo $time; ?></td>
</tr>

</table>

<a href="consult-Now.php?id=<?php echo $doctor['id']; ?>">
<button class="continue-btn">
Continue Consultation
</button>
</a>
</a>

</div>

</body>
</html>