<?php
include("../db.php");

$id = $_GET['id'];

$sql = "SELECT * FROM doctors WHERE id='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>
<?php

if(isset($_POST['update'])){

    $fullname = $_POST['fullname'];
    $specialist = $_POST['specialist'];
    $qualification = $_POST['qualification'];
    $experience = $_POST['experience'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // पुरानो फोटो
    $photo = $row['profile_picture'];

    // नयाँ फोटो upload भयो भने
    if($_FILES['photo']['name'] != ""){

        // पुरानो फोटो delete
        if(file_exists("../uploads/".$photo)){
            unlink("../uploads/".$photo);
        }

        // नयाँ फोटो upload
        $photo = $_FILES['photo']['name'];
        $temp = $_FILES['photo']['tmp_name'];

        move_uploaded_file($temp,"../uploads/".$photo);
    }

    $sql = "UPDATE doctors SET

    fullname='$fullname',
    profile_picture='$photo',
    specialist='$specialist',
    qualification='$qualification',
    experience='$experience',
    email='$email',
    phone='$phone'

    WHERE id='$id'";

    if(mysqli_query($conn,$sql)){

        echo "<script>
        alert('Doctor Updated Successfully');
        window.location='manage-doctors.php';
        </script>";

    }else{

        echo "<script>alert('Update Failed');</script>";

    }

}

?>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
<label>Current Photo</label><br>

<img src="../uploads/<?php echo $row['profile_picture']; ?>" width="120" style="border-radius:10px;"><br><br>

<label>Change Photo</label>
<input type="file" name="photo">
</div>
<input type="text"
name="fullname"
value="<?php echo $row['fullname']; ?>"
required>
<select name="specialist" required>

<option value="Cardiologist"
<?php if($row['specialist']=="Cardiologist") echo "selected"; ?>>
Cardiologist
</option>

<option value="Neurologist"
<?php if($row['specialist']=="Neurologist") echo "selected"; ?>>
Neurologist
</option>

<option value="Orthopedic"
<?php if($row['specialist']=="Orthopedic") echo "selected"; ?>>
Orthopedic
</option>

<option value="Dermatologist"
<?php if($row['specialist']=="Dermatologist") echo "selected"; ?>>
Dermatologist
</option>

<option value="Pediatrician"
<?php if($row['specialist']=="Pediatrician") echo "selected"; ?>>
Pediatrician
</option>

</select>
<input
type="text"
name="qualification"
value="<?php echo $row['qualification']; ?>"
required>
<input
type="number"
name="experience"
value="<?php echo $row['experience']; ?>"
required>
<input
type="email"
name="email"
value="<?php echo $row['email']; ?>"
required>
<input
type="text"
name="phone"
value="<?php echo $row['phone']; ?>"
required>
<button type="submit" name="update" class="save">
<i class="fa-solid fa-floppy-disk"></i>
Update Doctor
</button>
