<?php
session_start();
include("../db.php");

$doctor_id = $_GET['doctor_id'];
$user_id = $_SESSION['user_id'];

$sql = mysqli_query($conn,"
SELECT * FROM messages
WHERE doctor_id='$doctor_id'
AND user_id='$user_id'
ORDER BY id ASC
");

while($row=mysqli_fetch_assoc($sql)){

    if($row['sender']=="patient"){

        echo "<div class='user-message'>".$row['message']."</div>";

    }else{

        echo "<div class='doctor-message'>".$row['message']."</div>";

    }

}
?>