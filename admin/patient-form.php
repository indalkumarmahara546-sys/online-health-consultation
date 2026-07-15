<?php
include("../db.php");

if(isset($_POST['save'])){

    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $problem = $_POST['problem'];

    $sql = "INSERT INTO patients(fullname,age,gender,phone,email,address,problem)
            VALUES('$fullname','$age','$gender','$phone','$email','$address','$problem')";

    if(mysqli_query($conn,$sql)){
        echo "<script>
        alert('Patient Added Successfully');
        window.location='manage-patients.php';
        </script>";
    }else{
        echo "<script>alert('Failed to Add Patient');</script>";
    }

}
?>
<form method="POST">
    <input type="text" name="fullname" required>

<input type="number" name="age" required>

<select name="gender" required>
    <option value="">Select Gender</option>
    <option>Male</option>
    <option>Female</option>
</select>

<input type="text" name="phone" required>

<input type="email" name="email" required>

<textarea name="address" required></textarea>

<textarea name="problem" required></textarea>
<button type="submit" name="save">
    Save Patient
</button>
