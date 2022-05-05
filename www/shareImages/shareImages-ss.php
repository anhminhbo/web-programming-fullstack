<?php
  session_start();
  $errors = array();
  
  if (isset($_POST['shareImgSubmit']) && isset($_POST['description']) 
  && isset($_POST['sharingLevel']) && isset($_FILES['imgUpload'])) {
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


     if ($imgSize == 0) {
       array_push($errors,'Image size exceeds 2MB.');
     } else {
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

//      // read from db
//      $records = [];
//      $fp = fopen($dbRepo, "r");
// flock($fp, LOCK_SH);
// $headings = fgetcsv($fp);
// echo ($headings[1]);
// while ($aLineOfCells = fgetcsv($fp)) {
//    echo $aLineOfCells;
//   $records[] = $aLineOfCells;
// }
// flock($fp, LOCK_UN);
// fclose($fp);
  }
?>