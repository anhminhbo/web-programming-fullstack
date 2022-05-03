<?php
    //Initializing variables
    
    $email = "";
    $pass = "";
    $isExistedEmail = 0;
    $hashed_pass = "";
    $errors = array();

    //Connect to database

    $read_db = file("../../accounts.db");

    // Login phase
    if (isset($_POST["email"]) && isset($_POST["pass"])) {

        // Attach data to variables
        $email = strtolower($_POST["email"]);
        $pass = $_POST["pass"];

        // Find email in database
        foreach ($read_db as $line) {
            $email_temp = strchr($line, "|", true);
            if ($email == $email_temp) {
                $isExistedEmail = 1;
                $hashed_pass = strchr(substr(strchr($line, "|", false),1), "|", true);
                break;
            }
        }

        // If email in database
        if ($isExistedEmail == 1) {
            if (password_verify($pass, $hashed_pass)) {
                // REDIRECT TO INDEX PAGE IN LOGGED IN STATUS
            }
            else {
                array_push($errors, "Password is not matched. Please try again.");
            }
        }
        else {
            array_push($errors, "Email is not existed. Please try again.");
        }
    }

?>