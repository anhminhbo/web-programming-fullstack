<?php
    // Login phase
    if (isset($_POST["loginAction"]) && $_POST["email"] == "admin@rmit.edu.vn" && $_POST["pass"] == "admin") {
        header('Location:../admin-index.php?page=1');
    }
?>
