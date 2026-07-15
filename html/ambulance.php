<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../css/ambulence.css">
</head>
<body>
    <header class="nav">
       <div class="navbar">
        <div class="nav-logo">
            <div class="logo"> </div>

        </div>
        <div class="nav-address"> </div>
        <h1 class="title"> HEALTH CONSULTATION </h1>

       </div>

       <div class="menubar">
       <a href="index.php"><input type="button"  class="border" value="home"></a>
       <a href="online-consult-page.php"><input type="button"  class="border" value="Consult Doctor"></a>
       <input type="button"  class="border" value="Buy Medicine">
      <a href="book-appointment.php"> <input type="button"  class="border" value="Book Appointment"></a>
       <a href="ambulance.php"><input type="button"  class="border" value="Ambulance"></a>
      
       <div class="search-menu">
        <select class="search-select">
          <option>All</option>
        </select>
        <input placeholder="MY HEALTH CONSULT" class="search-input">
        <button><div class="search-icon">
        <i class="fa-solid fa-magnifying-glass"></i></div></button>
       </div>

      <div class="auth-btns">
        <?php if(isset($_SESSION['user_name'])): ?>
                    <span style="color: white; font-weight: bold; margin-right: 10px;">
                        Welcome, <?php echo $_SESSION['user_name']; ?> 👋
                    </span>
                    <a href="logout.php" class="btn signup-btn" style="background-color: #dc3545; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px;"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                <?php else: ?>
                    <a href="login.php" class="btn login-btn" style="color: white; text-decoration: none; margin-right: 10px;"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
                    <a href="signup.php" class="btn signup-btn" style="color: white; text-decoration: none;"><i class="fa-solid fa-user-plus"></i> Sign Up</a>
                <?php endif; ?>
       </div>
       
        
    </header><br><br><br><br><br><br>

    
    <div class="header">
        <h1 class="header-text"> Ambulance Services</h1>
    </div><br><br>

        <div class="doctor-img-container">

            <div class="doctor-name">   
        <div class="doctor1">
 </div> 
 <dl class="doctor-id">
   <dt> <h3>Ambulance </h3></dt>
  <dd>Phone No: </dd>
 </dl>
      
     <input type="button" class="call" value="Call Now">
        </div>

        <div class="doctor-name">   
        <div class="doctor2">
</div>

 <dl class="doctor-id">
   <dt> <h3>Ambulance </h3></dt>
  <dd>Phone No: </dd>
 </dl>
 
     <input type="button" class="call" value="Call Now">
        </div>
          <div class="doctor-name">   
        <div class="doctor3">
</div>

 <dl class="doctor-id">
   <dt> <h3>Ambulance </h3></dt>
  <dd>Phone No: </dd>
 </dl>
 
     <input type="button" class="call" value="Call Now">
        </div>
          <div class="doctor-name">   
        <div class="doctor4">
</div>

 <dl class="doctor-id">
  <dt> <h3>Ambulance </h3></dt>
  <dd>Phone No: </dd>
 </dl>
 
     <input type="button" class="call" value="Call Now">
        </div>
        </div>
        
        <footer class="footer">
    <div class="footer-section">
        <h3>About Us</h3>
        <p>Your trusted platform for health information and online doctor consultation.</p>
    </div>

    <div class="footer-section">
        <h3>Quick Links</h3>
        <a href="index.php">Home</a>
        <a href="online-consult-page.php">Doctors</a>
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

    

      
        </body>
  </html>