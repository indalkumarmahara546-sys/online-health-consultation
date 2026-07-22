<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include("../db.php");

$id=$_GET['id'];

$sql="SELECT * FROM doctors WHERE id='$id'";
$result=mysqli_query($conn,$sql);
$doctor=mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>

<title>Consultation</title>

<link rel="stylesheet" href="../css/consult-Now.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>

<div class="chat-container">

<div class="chat-header">

<img src="../uploads/<?php echo $doctor['profile_picture']; ?>">

<div>

<h2>Dr. <?php echo $doctor['fullname']; ?></h2>

<p class="online">
🟢 Online
</p>

</div>

</div>

<div class="chat-body" id="chat-box">

</div>

<div class="chat-footer">

   <input type="text"id="message"placeholder="Type your message...">

    <button class="send"onclick="sendMessage()">
       <i class="fas fa-paper-plane"></i>
        </button>
   <button class="voice">
        <i class="fas fa-phone"></i>
    </button>

    <button class="video">
        <i class="fas fa-video"></i>
    </button>

</div>

</body>

</html>