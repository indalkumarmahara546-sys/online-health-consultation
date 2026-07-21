 <?php
include("../db.php");

?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Doctors</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../css/manage-doctors.css">
</head>
<body>

<div class="container">

    <div class="header">
        <div class="page-header">
    <a href="admin-dashboard.php" class="back-btn">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <h2><i class="fa-solid fa-calendar-check"></i> Manange Doctors</h2></div>

        <div class="top-actions">

            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="searchInput" placeholder="Search Doctor..." onkeyup="searchDoctor()">
            </div>

<a href="Add-Doctor-form.php"><button class="add-btn">
                <i class="fa-solid fa-plus"></i> Add Doctor
            </button></a>

        </div>
    </div>

    <table id="doctorTable">

        <thead>

        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Specialist</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        </thead>

        <tbody>

       <?php

$sql = "SELECT * FROM doctors";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>
<img src="../uploads/<?php echo $row['profile_picture']; ?>" class="doctor-img">
</td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['specialist']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td>
<span class="active">Active</span>
</td>

<td>

<a href="edit-doctor.php?id=<?php echo $row['id']; ?>">
    <button class="edit-btn">
        <i class="fa-solid fa-pen"></i> Edit
    </button>
</a>

<a href="delete-doctor.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this doctor?')">
    <button class="delete-btn">
        <i class="fa-solid fa-trash"></i> Delete
    </button>
</a>

</td>

</tr>

<?php
}
?>

        </tbody>

    </table>

</div>

<script>// ===============================
// Search Doctor
// ===============================
function searchDoctor() {

    let input = document.getElementById("searchInput").value.toUpperCase();

    let table = document.getElementById("doctorTable");

    let tr = table.getElementsByTagName("tr");

    for (let i = 1; i < tr.length; i++) {

        let td = tr[i].getElementsByTagName("td")[2];

        if (td) {

            let txtValue = td.textContent || td.innerText;

            if (txtValue.toUpperCase().indexOf(input) > -1) {

                tr[i].style.display = "";

            } else {

                tr[i].style.display = "none";

            }

        }

    }

}

// ===============================
// Delete Doctor
// ===============================
let deleteButtons = document.querySelectorAll(".delete-btn");

deleteButtons.forEach(function(button){

    button.addEventListener("click", function(){

        let confirmDelete = confirm("Are you sure you want to delete this doctor?");

        if(confirmDelete){

            this.parentElement.parentElement.remove();

        }

    });

});

// ===============================
// Edit Doctor
// ===============================
let editButtons = document.querySelectorAll(".edit-btn");

editButtons.forEach(function(button){

    button.addEventListener("click", function(){

        alert("Edit Doctor Feature");

    });

});

// ===============================
// Add Doctor
// ===============================
document.querySelector(".add-btn").addEventListener("click", function(){

    alert("Open Add Doctor Form");

}); 
<a href="javascript:history.back()" class="back-btn">
    <i class="fa-solid fa-arrow-left"></i> Back
</a>
</script>

</body>
</html>