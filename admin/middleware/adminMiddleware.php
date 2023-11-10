<?php
if(session_status() === PHP_SESSION_NONE) session_start();
if (isset($_SESSION['auth'])) {
    if ($_SESSION['role_as'] == 0) {
        $_SESSION['message'] = "You are not authorized to access this page";
        header('location: ../index.php');
        exit();
    }
    
}
else {
        $_SESSION['message'] = "Login to continue";
        header('location: ../login.php');
        exit();
    }