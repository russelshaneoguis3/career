<?php
session_start();
include "connection.php";

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    // Redirect to the admin dashboard or any other appropriate page based on the user's role
    if ($_SESSION['role'] === 'administrator') {
        header("Location: admin/admin-dashboard.php");
    } 
    if ($_SESSION['role'] === 'HR') {
        // Redirect to hr's page
        header("Location: hr/hr-dashboard.php");
    }
    exit();
}

if (isset($_POST['uname']) && isset($_POST['password'])) {
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($uname)) {
        $_SESSION['fill'] = "Please fill in the username!";
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } else if (empty($pass)) {
        $_SESSION['fillpass'] = "Please fill in the password!";
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE username='$uname' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];

                // Set session cookie to be accessible across all tabs
                session_set_cookie_params(0, '/');
                session_regenerate_id(true);

                // Prevent caching
                header("Cache-Control: no-cache, no-store, must-revalidate");
                header("Pragma: no-cache");
                header("Expires: 0");

                // Redirect based on the user's role
                if ($_SESSION['role'] === 'administrator') {
                    header("Location: admin/admin-dashboard.php");
                } 
                if ($_SESSION['role'] === 'HR') {
                    // Redirect to another page for hr users if needed
                    header("Location: hr/hr-dashboard.php");
                }
                exit();
            }
        }

        $_SESSION['wrongC'] = "Wrong user credentials!";
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
} elseif (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>MSU-IIT National Multi-Purpose Cooperative</title>

    <!-- Tab logo -->
    <link href="img/logo.png" rel="icon">
    <link href="img/logo.png" rel="apple-touch-icon">
    
    <link rel="stylesheet" type="text/css" href="landingpage.css/login-style.css">

    <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

</head>
<body>
    <img src="img/login-pic.jpg" alt="logo" />
    
    <form method="post">
    <br>
    <img src="img/login-pic2.png" alt="logo" /><br>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>


        <div class="input-container">
            <i class="fa fa-user"></i>
            <input type="text" name="uname"  placeholder="Username">
        </div>

        <div class="input-container">
            <i class="fa fa-lock"></i>
            <input type="password" name="password" placeholder="Password">
        </div>

        <button type="submit">Log In</button>
        <br><br><br>
        <center>
       <a>Do you have an account? <a href="login.php"><span> Sign Up</span></a>
       <br><br>
       <a><b>Forgot Password | </b>  Cancel</a>
        </center>
    </form>
</body>
<?php include ("alert.php"); ?>
</html>
