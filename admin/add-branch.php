<?php 
session_start();

include("../connection.php");

if (isset($_SESSION['id']) && isset($_SESSION['username']) && $_SESSION['role'] === 'administrator') {

    // Add Branches
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind the SQL statement with placeholders
        $insertQuery = "INSERT INTO branch (area, branch_name, location, mobile_no, tel_no, hr_assigned)
                        VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("isssss", $area, $branchName, $location, $mobileNo, $telNo, $hrAssigned);

        // Set the parameter values
        $area = $_POST['area'];
        $branchName = $_POST['branch_name'];
        $location = $_POST['location'];
        $mobileNo = $_POST['mobile_no'];
        $telNo = $_POST['tel_no'];
        $hrAssigned = $_POST['hr_assigned'];

        // Execute the statement
        if ($stmt->execute()) {
            $_SESSION['addBranchSuccess'] = true;
        } else {
            // Handle query execution error
            echo "Error adding branch: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
    
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
    <link href="admin.css/career-branches.css" rel="stylesheet">

<!-- Bootstrap Style -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Your custom scripts -->
<script src="admin.js/admin-dashboard.js"></script>

<!-- Font Awesome Icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <!-- Favicons -->
    <link href="admin.pic/logo.png" rel="icon">
    <link href="admin.pic/logo.png" rel="apple-touch-icon">

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
            </header>

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <h2>Add Branch to the List</h2>

            <ol>
                <li><a href="career-branch.php">Branch List</a></li>
                <li>Add Branch</li>
            </ol>
        </div>
    </section>
    
    <!-- End Breadcrumbs -->

<!-- Main body -->

<div class="container mt-5">
        <div class="row">
            <!-- Left Column - Forms on the Left -->
            <div class="col-md-6">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="mb-3">
                        <label for="areaLeft" class="form-label"><b>Area</b></label>
                        <select class="form-select" id="areaLeft" name="area">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="branchNameLeft" class="form-label"><b>Branch Name</b></label>
                        <input type="text" class="form-control" id="branchNameLeft" name="branch_name" placeholder="Branch Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="locationLeft" class="form-label"><b>Location</b></label>
                        <input type="text" class="form-control" id="locationLeft" name="location" placeholder="Location" required>
                    </div>

               
            </div>

            <!-- Right Column - Forms on the Right -->
            <div class="col-md-6">
            <div class="mb-3">
                        <label for="mobileNoLeft" class="form-label"><b>Mobile No</b> (Separate with ' ; ' if multiple)</label>
                        <input type="text" class="form-control" id="mobileNoLeft" name="mobile_no" placeholder="Mobile No" required>
                    </div>
                    <div class="mb-3">
                        <label for="telNoLeft" class="form-label"><b>Tel No</b> (Separate with ' ; ' if multiple) </label>
                        <input type="text" class="form-control" id="telNoLeft" name="tel_no" placeholder="Tel No" required>
                    </div>
                    <div class="mb-3">
                        <label for="hrAssignedLeft" class="form-label"><b>HR Assigned</b> (HR ID)</label>
                        <input type="text" class="form-control" id="hrAssignedLeft" name="hr_assigned" placeholder="HR Assigned" required>
                    </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Branch</button>
    </div>
    
    </form>
    <br>


<script>
    // Function to redirect after success and show SweetAlert with delay
    function redirectAfterSuccess() {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Adding branch successful!',
            timer: 2000, // Display message for 2 seconds
            showConfirmButton: false
        }).then(function () {
            window.location.href = 'career-branch.php';
        });
    }

    // Check if the addBranchSuccess session variable is set, then show the SweetAlert
    $(document).ready(function () {
        <?php
        if (isset($_SESSION['addBranchSuccess']) && $_SESSION['addBranchSuccess']) {
            echo "redirectAfterSuccess();";
            unset($_SESSION['addBranchSuccess']); // Clear the session variable
        }
        ?>
    });
</script>
    

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

    <?php 
    } else {
        header("Location: ../login.php");
        exit();
    }
    ?>
</html>
