<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username']) && $_SESSION['role'] === 'administrator') {
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
  <link href="admin.css/admin-dashboard.css" rel="stylesheet">
  <link href="admin.css/navbar.css" rel="stylesheet">
  <link href="admin.css/footer.css" rel="stylesheet">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap">

  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- JS functions -->
  <script src="admin.js/admin-dashboard.js"></script>

   <!-- Favicons -->
   <link href="admin.pic/nmpc-logo.png" rel="icon">
  <link href="admin.pic/nmpc-logo.png" rel="apple-touch-icon">

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
                <a href="admin-dashboard.php"><img src="admin.pic/header-logo.png" alt="" class="img-fluid"></a>
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
                        <a href="career-branch.php" class="nav-link">Careers</a>
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

<!-- Main body -->

<center>
<div class="dashboard-card card bg-dark text-white">
  <img class="card-img" src="admin.pic/logo.png" alt="Card image">
  <div class="card-img-overlay">
    <h1 class="card-title">Sample Admin Dashboard</h1>
    <br><hr><br>
    <p class="card-text">This is sample admin dashboard and we will enhance this after we finish developing the subsytem that is assigned to us. Upon the successful completion of the assigned subsystem, we will try to enhance the user experience and functionality of the dashboard, incorporating advanced features and an aesthetically refined design. Thank you mga ulol</p>
    
  </div>
</div>
</center>

<!-- ======= Footer ======= -->
<footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-12 col-md-12 footer-links">
        <h4>MSU-IIT NATIONAL MULTI-PURPOSE COOPERATIVE</h4>
        <ul>
        <p><span>Head Office:</span>  Gregorio T. Lluch Sr. Ave., Pala-o Iligan City, 9200, Philippines</p>
        <p><span>Phone:</span> (063) 223-5874</p>
        <p><span>Email:</span> <a href="mailto:msuiitnmpc@msuiitcoop.org?subject=Contact%20from%20MSU-IIT%20Coop%20website">msuiitnmpc@msuiitcoop.org</a></p>
        <p><a href="https://hpqs-vnzw.accessdomain.com/webmail/" target="_blank">Webmail</a>, <a href="http://119.93.53.245/hrmax">HR Max</a>, <a target="_blank" href="https://docs.google.com/forms/d/1ZuszRLiLPY_-UroOgkmjZXs0sNpIVZPGJDuhxBmekwk/viewform">IT support desk</a>, <a href="https://sites.google.com/view/msuiitnmpcesurvey/home">e-Survey</a></p>
        </ul>
      </div>

    </div>
  </div>
</div>

<div class="container">
  </div>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/ -->
    Designed by <a  href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a>
  </div>
</div>
</footer>

<!-- End Footer -->
     
  </body>
</html>

<?php 
} else {
     header("Location: ../login.php");
     exit();
}
?>
