<?php
include("../db.php");

if(isset($_POST['save'])){

    $fullname = $_POST['fullname'];
    $specialist = $_POST['specialist'];
    $qualification = $_POST['qualification'];
    $experience = $_POST['experience'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $fee = $_POST['fee'];

    // Photo Upload
    $photo = $_FILES['photo']['name'];
    $temp = $_FILES['photo']['tmp_name'];

    move_uploaded_file($temp,"../uploads/".$photo);

    $sql = "INSERT INTO doctors(fullname,profile_picture,specialist,qualification,experience,email,phone)
            VALUES('$fullname','$photo','$specialist','$qualification','$experience','$email','$phone')";

    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Doctor Added Successfully');
        window.location='manage-doctors.php';
        </script>";
    }else{
        echo "<script>alert('Failed to Add Doctor');</script>";
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Doctor</title>

<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="../css/Add-Doctor-form.css">
</head>

<body>

<div class="container">

    <div class="header">
        <h2><i class="fa-solid fa-user-doctor"></i> Add New Doctor</h2>
    </div>

    <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label>ID</label>
            <input type="number" placeholder="Enter Doctor ID">
        </div>

        <div class="form-group">
            <label>Profile Picture</label>
            <input type="file" name="photo" accept="image/*">
        </div>

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="fullname" placeholder="Enter Full Name" required>
        </div>

        <div class="form-group">
            <label>Specialist</label>

            <select name="specialist" required>
                <option>Select Specialist</option>
                <option>Cardiologist</option>
                <option>Neurologist</option>
                <option>Orthopedic</option>
                <option>Dermatologist</option>
                <option>Pediatrician</option>
            </select>

        </div>
        
        <div class="form-group">
           <label>Qualification</label>
           <input type="text" name="qualification" placeholder="MBBS, MD, MS" required>
     </div>

     <div class="form-group">
       <label>Experience (Years)</label>
         <input type="number" name="experience" placeholder="Enter Experience" min="0" required>
       </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter Email" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" placeholder="Enter phone number" required>
        </div>

        <div class="buttons">
            <button type="submit" name="save" class="save">
                <i class="fa-solid fa-floppy-disk"></i> Save Doctor
            </button>

            <button type="reset" class="reset">
                <i class="fa-solid fa-rotate-right"></i> Reset
            </button>
        </div>

    </form>

</div>

</body>
</html>