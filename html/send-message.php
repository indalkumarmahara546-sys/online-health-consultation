<?php
session_start();
include("../db.php");

if(isset($_POST['message'])){

    $doctor_id = $_POST['doctor_id'];
    $user_id = $_SESSION['user_id'];
    $message = mysqli_real_escape_string($conn,$_POST['message']);

    mysqli_query($conn,"
        INSERT INTO messages(doctor_id,user_id,sender,message)
        VALUES('$doctor_id','$user_id','patient','$message')
    ");
}
?>