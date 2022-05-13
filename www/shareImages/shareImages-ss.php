<?php
  session_start();
  $errors = array();
  
  if (isset($_POST['shareImgSubmit']) && isset($_POST['description']) && isset($_POST['sharingLevel']) && isset($_FILES['imgUpload'])) {
   require_once('../util/imageHandler.php');
   require_once('../util/db.php');

     $imgDesc = $_POST['description'];
     $imgSharingLevel = $_POST['sharingLevel'];
    // print_r($_SESSION);

     $userEmail = $_SESSION["email"];
     $userFName = $_SESSION['fname'];
     $userLName = $_SESSION['lname'];


     $imgUploadRepo = '../uploadImgRepo/';
     $imgName = $imgUploadRepo . basename($_FILES["imgUpload"]["name"]);
     $imgFileType = strtolower(pathinfo($imgName,PATHINFO_EXTENSION));
     $imgSize = $_FILES["imgUpload"]["size"];

     if (isset($_FILES["imgUpload"])){
       if ($_FILES["imgUpload"]["name"] == ""){
         array_push($errors, "You need to upload an image.");
       }
       else {
          if ($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg" && $imgFileType != "gif"){
            array_push($errors, "Your upload is not an image.");
          }
          if ($imgSize == 0) {
            array_push($errors, 'Image size exceeds 2MB.');
          } 
       }

     }

     if (isset($_POST["description"])){
       if ($_POST["description"] == ""){
         array_push($errors, "Your description must not be empty.");
       }
     }

     if (isset($_POST["sharingLevel"])){
      if ($_POST["sharingLevel"] == 0){
        array_push($errors, "You must choose a sharing level.");
      }
    }

    if (count($errors) == 0){
      // rename img
      $newImgName = renameImg($imgFileType,$imgUploadRepo);

      // move to upload img repo
      $uploadPath = $imgUploadRepo . $newImgName;
      move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $uploadPath);

      //time when create img
      date_default_timezone_set("Asia/Ho_Chi_Minh");
      $timeNow = date("H:i:s d-m-Y",time());

      // img text to insert in db
      $imgArrayText = [$userEmail, $newImgName,$imgDesc,$imgSharingLevel,$timeNow,$userFName,$userLName];

      //write to db
      $uploadImgDbRepo = '../uploadImgRepo/uploadImgRepo.db';
      storeInfo($uploadImgDbRepo,$imgArrayText,"a");
      header('location: ../viewImages/viewImages.php');
     }
  }
?>