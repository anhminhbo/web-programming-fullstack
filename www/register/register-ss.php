<?php
    session_start();

    //Initializing variables

    $fname = "";
    $lname = "";
    $email = "";
    $pass = "";
    $errors = array();
    
    //Connect to database

    $read_db = file("../../accounts.db");
    $write_db = fopen("../../accounts.db", "a");

    //Register user

    if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["pass"])) {
        
        // Attach data to variables
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = strtolower($_POST["email"]);
        $pass = $_POST["pass"];
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

        // Check if fname in database
        foreach ($read_db as $line) {
            $email_temp = strchr($line, "|", true);
            if ($email == $email_temp) {
                array_push($errors, "Username duplicated.");
                break;
            }
        }
        if (count($errors) == 0) {
            // Combine data into a line
            $result = $email . "|" . $hashed_pass . "|" . $fname . "|" . $lname . "\n";

            // Store data
            fwrite($write_db, $result);
            fclose($write_db);

            // Create SESSION
            $_SESSION["email"] = $email;
            $_SESSION["fname"] = $fname;
            $_SESSION["lname"] = $lname;

            // Redirect
            // header("location: login.php");
        }
    }
?>