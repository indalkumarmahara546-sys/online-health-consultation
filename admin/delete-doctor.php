<?php
include("../db.php");

$id = $_GET['id'];

$sql = "SELECT profile_picture FROM doctors WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($row){
    $photo = $row['profile_picture'];

    
    if(file_exists("../uploads/" . $photo)){
        unlink("../uploads/" . $photo);
    }

    
    mysqli_query($conn, "DELETE FROM doctors WHERE id='$id'");
}

header("Location: manage-doctors.php");
exit();
?>