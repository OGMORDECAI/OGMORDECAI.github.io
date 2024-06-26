<?php
// Sample admin authentication check
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}
include('db.php');
include('admin_header.php');
include('admin_dashboard.php');
include('footer.php');
?>
