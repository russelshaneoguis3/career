<?php 
session_start();

include("../connection.php");

if (isset($_SESSION['id']) && isset($_SESSION['username']) && $_SESSION['role'] === 'administrator') {

    if (isset($_GET['deleteBranch'])) {
        $deleteB = $_GET['deleteBranch'];
    
        // Check if $deleteB is a valid integer
        if (filter_var($deleteB, FILTER_VALIDATE_INT)) {
            $deleteB_que = "DELETE FROM branch WHERE branch_id = $deleteB";
            $deleteB_que_result = mysqli_query($conn, $deleteB_que);
    
            if ($deleteB_que_result) {
                // Redirect to career-branch.php after deletion
                header("Location: career-branch.php");
                exit;
            } else {
                // Handle query execution error
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            // Handle invalid branch_id (not an integer)
            echo "Invalid branch ID";
        }
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- JS functions -->
    <script src="admin.js/admin-dashboard.js"></script>

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
            </header>

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <h2>Branch List</h2>

            <ol>
                <li><a href="admin-dashboard.php">Home</a></li>
                <li>Branches</li>
            </ol>
        </div>
    </section><!-- End Breadcrumbs -->

    <?php
        // Fetch data from the 'branch' table
        $query1 = "SELECT branch_id, CONCAT('<b>',branch_name,'</b>', '<br>', location) as branch, 
                CONCAT('<b>','Tel no:  ','</b>', tel_no,'<br>','<b>','Mobile no:  ' , '</b>', mobile_no) as contact, name, 
                COUNT(job_id) AS job_count FROM user, branch LEFT JOIN job ON branch_loc = branch_id WHERE area = 1 AND id = hr_assigned GROUP BY branch_id";

        $result1 = mysqli_query($conn, $query1);

        ?>

        <div class="card" style="max-width: 80rem;">
            <div class="card-header" style="background-color: #4775d1; color: #fff;">
                <h5> Area 1 </h5>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="col-md-4">Branches</th>
                                <th scope="col" class="col-md-3">Contact No.</th>
                                <th scope="col" class="col-md-2">HR Assigned</th>
                                <th scope="col" class="col-md-2">Available Jobs</th>
                                <th scope="col" class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Loop through the data and display each row in the table
                        while ($row = mysqli_fetch_assoc($result1)) {
                            echo '<tr>';
                            echo '<td>' . $row['branch'] . '</td>';
                            echo '<td>' . $row['contact'] . '</td>';
                            echo '<td>' . $row['name'] . '</td>'; 
                            echo '<td>' .'<b>',$row['job_count'],'</b>', "  Available" . '</td>'; 
                            echo '<td>';
                            // Add an Edit button with a Bootstrap class
                            echo '<a href="#" class="btn btn-success" onclick="editRow(' . $row['branch_id'] . ')"><i class="fa-solid fa-pen-to-square"></i></a>';
                            // Add a Delete button with a Bootstrap class
                            echo ' <a href="#" class="btn btn-danger" onclick="deleteBranch(' . $row['branch_id'] . ')"><i class="fa-solid fa-trash-can"></i></a>';

                            echo '</td>';    
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </blockquote>
            </div>
        </div>

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

    <script>
    function deleteBranch(branchId) {
        // Trigger SweetAlert confirmation
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this branch!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, redirect to deleteBranch URL
                window.location.href = "career-branch.php?deleteBranch=" + branchId;
            }
        });
    }
</script>

        
    </body>
    </html>

    <?php 
    } else {
        header("Location: ../login.php");
        exit();
    }
    ?>
