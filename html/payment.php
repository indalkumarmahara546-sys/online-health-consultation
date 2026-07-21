<?php
session_start();
include("../db.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM doctors WHERE id='$id'";
$result = mysqli_query($conn,$sql);
$doctor = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>

<title>Payment</title>

<link rel="stylesheet" href="../css/payment.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>

<div class="payment-box">

<h2>Online Consultation Payment</h2>

<img src="../uploads/<?php echo $doctor['profile_picture']; ?>" class="doctor-img">

<h3><?php echo $doctor['fullname']; ?></h3>

<p>
<b>Specialist :</b>
<?php echo $doctor['specialist']; ?>
</p>

<p>
<b>Fee :</b>
Rs.
<?php echo $doctor['fee']; ?>
</p>

<h3>Select Payment Method</h3>

<form action="payment-success.php?id=<?php echo $doctor['id']; ?>" method="POST">

<div class="payment-methods">

    <label>
        <input type="radio" name="payment" value="esewa" required>
        <img src="../photo/esewa-logo.png" alt="eSewa">
    </label>

    <label>
        <input type="radio" name="payment" value="khalti">
        <img src="../photo/khalti-logo.png" alt="Khalti">
    </label>

    <label>
        <input type="radio" name="payment" value="connectips">
        <img src="../photo/connectips-logo.png" alt="Connect IPS">
    </label>

    <label>
        <input type="radio" name="payment" value="bank">
        <img src="../photo/bank-logo.png" alt="Bank">
    </label>

</div>

<button type="submit" class="pay-btn">
    Pay Now
</button>

</form>

</div>

</body>

</html>