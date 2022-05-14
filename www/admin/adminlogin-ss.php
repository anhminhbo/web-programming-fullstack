<?php
    // Import utilities
    require_once('../util/imageHandler.php');
    require_once('../util/db.php');

    //Initializing variables
    
    $email = "";
    $pass = "";
    $isExistedEmail = 0;
    $hashed_pass = "";
    $fname = "";
    $lname = "";
    $errors = array();

    // Login phase
    if (isset($_POST["loginAction"]) && isset($_POST["email"]) && isset($_POST["pass"])) {

        // Attach data to variables
        $email = strtolower($_POST["email"]);
        $pass = $_POST["pass"];

        // Find email in database
        $read_db = readInfo("../../accounts.db", "r");
        foreach ($read_db as $line) {
            $email_temp = $line[0];
            if ($email == $email_temp) {
                $isExistedEmail = 1;
                $hashed_pass = $line[1];
                $fname = $line[2];
                $lname = $line[3];
                break;
            }
        }

        // Get picture
        $readImg_db = readInfo("../profileImgRepo/profilePicture.db", "r");
        foreach ($readImg_db as $line) {
            $email_temp = $line[0];
            if ($email == $email_temp) {
                $imgFileName = $line[1];
                break;
            }
        }

        // If email in database
        if ($isExistedEmail == 1) {
            if (password_verify($pass, $hashed_pass)) {
                // REDIRECT TO INDEX PAGE IN LOGGED IN STATUS
                echo "<p>Successfully logged in.</p>";
                $_SESSION["loggedIn"] = true;
                $_SESSION["email"] = $email;
                $_SESSION["fname"] = $fname;
                $_SESSION["lname"] = $lname;
                $_SESSION["imgFileName"] = $imgFileName;

                print_r($_SESSION);
                header("Location: ../index.php");
            }
            else {
                array_push($errors, "Password is not matched. Please try again.");
            }
        }
        else {
            array_push($errors, "Email is not existed. Please try again.");
        }
    }
