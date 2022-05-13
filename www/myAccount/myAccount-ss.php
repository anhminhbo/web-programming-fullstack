<?php
    // Import utilities
    require_once('../util/imageHandler.php');
    require_once('../util/db.php');

    //  Initializing variables
    $fname = $_SESSION["fname"];
    $lname = $_SESSION["lname"];
    $email = $_SESSION["email"];
    $imgName = $_SESSION["imgFileName"];
    $newImgName = "";
    $pass = "";
    $re_pass = "";
    $errors = array();
    $target_dir = "../profileImgRepo/";
    $target_file = "";
    $imageFileType = "";

    // Get uploaded img
    if (isset($_FILES["changeprofileImg"])){
        if ($_FILES["changeprofileImg"]["name"] != "") {
            $target_file = $target_dir . basename($_FILES["changeprofileImg"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                array_push($errors, "File type is wrong. Please upload a picture.");
            }
            if ($_FILES["changeprofileImg"]["size"] == 0) {
                array_push($errors, "Image size exceeds 2MB.");
            }
        }
        else {
            array_push($errors, "Input empty. Please choose a picture.");
        }
    }
    

    // If profileImg is default one
    if ($imgName == "default.png"){
        $newImgName =  renameImg($imageFileType, $target_dir);
        $read_db = readInfo("../profileImgRepo/profilePicture.db", "r");
        for ($i = 0; $i<count($read_db); $i++){
            if ($read_db[$i][0] == $email){
                $read_db[$i][1] = $newImgName;
                break;
            }
        }
    }
    else{
        $newImgName = $imgName;
    }

    // STORING PHASE
    if (isset($_FILES["changeprofileImg"]) && count($errors)==0){
        $uploadPath = $target_dir . $newImgName;
        if ($imgName == "default.png"){
            move_uploaded_file($_FILES["changeprofileImg"]["tmp_name"], $uploadPath);
            $profileDbRepoPath = "../profileImgRepo/profilePicture.db";
            deleteContent($profileDbRepoPath);
            for ($i = 0; $i<count($read_db); $i++){
                $line = [$read_db[$i][0], $read_db[$i][1]];
                storeInfo($profileDbRepoPath, $line, "a");
            }
            $_SESSION["imgFileName"] = $newImgName;
        }
        else{
            unlink($uploadPath);
            move_uploaded_file($_FILES["changeprofileImg"]["tmp_name"], $uploadPath);
        }
        header("Location: ../index.php");
    }
?>