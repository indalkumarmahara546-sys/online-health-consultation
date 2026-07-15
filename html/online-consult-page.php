<?php
if (session_status()=== PHP_SESSION_NONE){
session_start();
} 
?>
<?php
include("../db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online-consult-page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="../css/online-consult-page.css">
</head>
<body>
    <header class="nav">
      <div class="navbar">

    <div class="nav-logo">
        <div class="logo"></div>
    </div>

    <h1 class="title">HEALTH CONSULTATION</h1>

    <div class="menu-toggle" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </div>

</div>
       <div class="menubar">
       <a href="index.php"><input type="button" class="border" value="home"></a>
       <a href="online-consult-page.php"><input type="button" class="border" value="Consult Doctor"></a>
       <input type="button" class="border" value="Buy Medicine">
       
       <a href="<?php echo isset($_SESSION['user_id']) ? 'book-appointment.php' : 'login.php?action=book'; ?>" <?php if(!isset($_SESSION['user_id'])) { echo "onclick=\"alert('Please login first!');\""; } ?>>
            <input type="button" class="border" value="Book Appointment">
       </a>
       <a href="ambulance.php"><input type="button" class="border" value="Ambulance"></a>
      
       <div class="search-menu">
        <select class="search-select">
          <option>All</option>
        </select>
        <input placeholder="MY HEALTH CONSULT" class="search-input">
       <button> <div class="search-icon">
        <i class="fa-solid fa-magnifying-glass"></i></div></button>
       </div>
      
    <div class="auth-btns">
        <?php if(isset($_SESSION['user_id'])): ?>
            <span style="color: white; font-weight: bold; margin-right: 10px;">
                Welcome, <?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'User'; ?> 👋
            </span>
            <a href="logout.php" class="btn signup-btn" style="background-color: #dc3545;"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        <?php else: ?>
            <a href="login.php" class="btn login-btn"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
            <a href="signup.php" class="btn signup-btn"> <i class="fa-solid fa-user-plus"></i> Sign Up</a>
        <?php endif; ?>
       </div>
    </header>
    <div class="page-content">

    <div class="header">
        <h1 class="header-text"> Online onsultation</h1>
    </div><br><br>
<div class="doctor-img-container">

<?php

$sql = "SELECT * FROM doctors ORDER BY id DESC";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result))
{
?>

<div class="doctor-name">

    <img src="../uploads/<?php echo $row['profile_picture']; ?>" class="doctor-photo">

    <dl class="doctor-id">

        <dt>
            <h3><?php echo $row['fullname']; ?></h3>
        </dt>

        <dd>
            <b>Specialist :</b>
            <?php echo $row['specialist']; ?>
        </dd>

        <dd>
            <b>Qualification :</b>
            <?php echo $row['qualification']; ?>
        </dd>

        <dd>
            <b>Experience :</b>
            <?php echo $row['experience']; ?> Years
        </dd>

    </dl>

    <a href="<?php echo isset($_SESSION['user_id']) ? 'direct-consult.php' : 'login.php?action=consult'; ?>">

        <input type="button" class="call" value="Consult Now">

    </a>

    <br>

    <a href="<?php echo isset($_SESSION['user_id']) ? 'book-appointment.php' : 'login.php?action=book'; ?>">

        <input type="button" class="called" value="Book Appointment">

    </a>

</div>

<?php
}
?>

</div>
    </div>

    <footer class="footer">
        <div class="footer-section">
            <h3>About Us</h3>
            <p>Your trusted platform for health information and online doctor consultation.</p>
        </div>
        <div class="footer-section">
            <h3>Quick Links</h3>
            <a href="#">Home</a>
            <a href="#">Doctors</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
        </div>
        <div class="footer-section">
            <h3>Contact</h3>
            <p>Email: info@example.com</p>
            <p>Phone: +977-9800000000</p>
        </div>
    </footer>

    <div class="footer-bottom">
        © 2025 All Rights Reserved.
    </div>

<script>
function checkAuth(actionName) {
    var isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;

    if (!isLoggedIn) {
        alert("Please login first to use '" + actionName + "' service.");
        return false;
    }

    return true;
}

function toggleMenu() {
    document.querySelector(".menubar").classList.toggle("active");
}
</script>
</body>
</html>