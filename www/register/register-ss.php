<?php
    session_start();

    //Initializing variables

    $fname = "";
    $lname = "";
    $email = "";
    $pass = "";
    $errors = array();
    $target_dir = "../profileImgRepo/";
    $target_file = "";
    $imageFileType = "";
    
    //Connect to database

    $read_db = file("../../accounts.db");
    $write_db = fopen("../../accounts.db", "a");
    $writeImg_db = fopen($target_dir . "profilePicture.db", "a");

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

        // Check the condition of profile picture
        if (isset($_FILES["profileImg"]) && $_FILES["profileImg"]["name"] != "") {
            $target_file = $target_dir . basename($_FILES["profileImg"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                array_push($errors, "File type is wrong. Please upload a picture.");
            }
            if (file_exists($target_file)) {
                array_push($errors,"Sorry, file already exists.");
            }
        }
        else {
            $target_file = $target_dir . "default.png";
        }

        // STORING
        if (count($errors) == 0) {
            // Get created date
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $createdDate = date("h:i:s") . "|" . date("d/m/Y");
        
            // Combine data into a line
            $result = $email . "|" . $hashed_pass . "|" . $fname . "|" . $lname . "|" . $createdDate . "\n";

            // Store profile picture
            if ($target_file != $target_dir . "default.png") {
                $filecount = 0;
                $files = glob($target_dir . "*.{jpg,png,gif,jpeg}",GLOB_BRACE);
                if ($files){
                    $filecount = count($files);
                }
                $new_img_name = "IMG" . strval($filecount) . "." . $imageFileType;
                $uploadPath = $target_dir . $new_img_name;
                move_uploaded_file($_FILES["profileImg"]["tmp_name"], $uploadPath);

                // Link profile image to an email
                $img_result = $email . "|" . $new_img_name . "\n";
            }
            else {
                // Link profile image to an email
                $img_result = $email . "|" . "default.png" . "\n";
            }
            
            // Store data
            fwrite($write_db, $result);
            fclose($write_db);
            fwrite($writeImg_db, $img_result);
            fclose($writeImg_db);
            
            // Create SESSION
            $_SESSION["email"] = $email;
            $_SESSION["pass"] = $pass;

            // Redirect
            header("location: ../login/login.php");
        }
    }
    //Khuong.916037
?>