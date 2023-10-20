<?php
session_start(); // Start the session

// Clear all session data
$_SESSION = array();
session_destroy();

// Redirect to the login page or any other page after sign out
header('location:login.php');
exit;
?>