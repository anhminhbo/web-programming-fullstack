<?php
    session_start();

    // Import utilities
    require_once('../util/imageHandler.php');
    require_once('../util/db.php');

    // Initializing variables

    $fname = "";
    $lname = "";
    $email = "";
    $pass = "";
    $re_pass = "";
    $errors = array();
    $target_dir = "../profileImgRepo/";
    $target_file = "";
    $imageFileType = "";
    $nameregex = "/^[A-Za-z]{2,20}$/";
    $passregex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/";

    // Register user

    if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["re_pass"])) {
        
        // Attach data to variables
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = strtolower($_POST["email"]);
        $pass = $_POST["pass"];
        $re_pass = $_POST["re_pass"];
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

        // Check if fname in database
        $read_db = readInfo("../../accounts.db", "r");
        foreach ($read_db as $line) {
            $email_temp = $line[0];
            if ($email == $email_temp) {
                array_push($errors, "Email duplicated.");
                break;
            }
        }

        // Check the condition of profile picture
        if (isset($_FILES["profileImg"]) && $_FILES["profileImg"]["name"] != "") {
            $target_file = $target_dir . basename($_FILES["profileImg"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                array_push($errors, "File type is wrong. Please upload a picture.");
            }
            if (file_exists($target_file)) {
                array_push($errors, "Sorry, file already exists.");
            }
            if ($_FILES["profileImg"]["size"] == 0) {
                array_push($errors, "Image size exceeds 2MB.");
            }
        }
        else {
            $target_file = $target_dir . "default.png";
        }

        // Check if the email is invalid
        if ($email == "") {
            array_push($errors, "Email is invalid.");
        }

        // Check if the pass and the retype pass are matched
        if (preg_match($passregex, $pass)) {
            if ($pass != $re_pass) {
            array_push($errors, "Password is not matched.");
            }
        }
        else {
            // Check if the password is invalid
            array_push($errors, "Password is invalid.");
        }

        // Check if the name fields match the regex
        if (!preg_match($nameregex, $fname)) {
            array_push($errors, "First name is invalid");
        }
        if (!preg_match($nameregex, $lname)) {
            array_push($errors, "Last name is invalid");
        }

        // STORING
        if (count($errors) == 0) {
            // Get created date
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $createdDate = date("H:i:s d-m-Y", time());
        
            // Combine data into a line
            $result = [$email, $hashed_pass, $fname, $lname, $createdDate];
            // Store profile picture
            if ($target_file != $target_dir . "default.png") {
                $new_img_name =  renameImg($imageFileType, $target_dir);
                $uploadPath = $target_dir . $new_img_name;

                move_uploaded_file($_FILES["profileImg"]["tmp_name"], $uploadPath);

                // Link profile image to an email
                $img_result = [$email, $new_img_name];
            }
            else {
                // Link profile image to an email
                $img_result = [$email, "default.png"];
            }
            
            // Store img info
            $profileDbRepoPath = "../profileImgRepo/profilePicture.db";
            storeInfo($profileDbRepoPath, $img_result, "a");

            // Store user info
            $accDbRepoPath =  "../../accounts.db";
            storeInfo($accDbRepoPath, $result, "a");
    
            
            // Create SESSION
            $_SESSION["email"] = $email;
            $_SESSION["pass"] = $pass;

            // Redirect
            header("location: ../login/login.php");
        }
    }
?>