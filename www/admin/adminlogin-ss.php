<?php
    // Import utilities
    require_once('../util/imageHandler.php');
    require_once('../util/db.php');

    //Initializing variables
    
    $email = "";
    $pass = "";
    $errors = array();

    // Login phase
    if (isset($_POST["loginAction"]) && $_POST["email"] == "admin@rmit.edu.vn" && $_POST["pass"] == "admin") {
        header('Location:admin-index.php');
    }
?>
