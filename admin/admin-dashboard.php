<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html>
  <head>
     <meta charset="utf-8">
  <meta content="Author" name="MSU-IIT Coop">
  <meta content="Keywords" name="MSU-IIT Coop, ,msuiit coop, msuiit cooperative, MSU-IIT Multi-purpose Cooperative, Cooperative in the Philippines, mindanao cooperative, philippine cooperative, coop natcco, coop" />
  <meta name="Description" content="MSU-IIT Coop, a leading, world-class cooperative serving the nation." />
  <title>MSU-IIT National Multi-Purpose Cooperative &raquo; Home</title>

  <!-- Style/CSS -->
  <link href="admin-dashboard.css" rel="stylesheet">

  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- JS functions -->
  <script src="admin-dashboard.js"></script>

   <!-- Favicons -->
   <link href="../img/logo.png" rel="icon">
  <link href="../img/logo.png" rel="apple-touch-icon">

  </head>
  <body>
<!--Hamburger menu start-->
        <input type="checkbox" id="navcheck">
        <div class="nav-btn">
            <label htmlfor="navcheck">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>
        <!--Hamburger menu end-->
        <!--Header start-->
        <header class="header">
            <nav class="navbar">
                <!--Logo-->
                <div class="logo">
                <a href="admin-dashboard.php"><img src="../img/header-logox.png" alt="" class="img-fluid"></a>
                </div>
                <!--Logo-->
                <!--Navigation-->
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="admin-dashboard.php" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="admin-dashboard.php" class="nav-link">Products & Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="admin-dashboard.php" class="nav-link">Allied Businesses</a>
                    </li>
                    <li class="nav-item">
                        <a href="admin-dashboard.php" class="nav-link">Membership</a>
                    </li>
                    <li class="nav-item">
                        <a href="admin-dashboard.php" class="nav-link">Branches</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Careers</a>
                    </li>
                    <li class="nav-item">
                        <a href="admin-dashboard.php" class="nav-link">FAQs</a>
                    </li>
                    </ul>
                    <!-- dropdown for logout -->
                      <div class="dropdown">
                      <b><a onclick="myFunction()" class="dropbtn"><?php echo $_SESSION['name']; ?>▼</a></b>
                      <div id="myDropdown" class="dropdown-content">
                      <a href="../logout.php">Logout</a>
  
                      </div>
                    </div>
                <!--Navigation-->
            </nav>
            <hr>
        </header>
     
  </body>
</html>

<?php 
} else {
     header("Location: ../index.php");
     exit();
}
?>
