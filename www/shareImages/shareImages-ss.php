<?php
  session_start();
  
  if (isset($_POST['shareImgSubmit']) && isset($_POST['description']) 
  && isset($_POST['sharingLevel']) && isset($_FILES['imgUpload'])) {
     $errors = array();

     $imgDesc = $_POST['description'];
     $imgSharingLevel = $_POST['sharingLevel'];

   //$user_email = $_SESSION["email"];
     $userEmail = "testEmail";
     
     $imgUploadRepo = '../uploadImgRepo/';
     $imgName = $imgUploadRepo . basename($_FILES["imgUpload"]["name"]);
     $imgFileType = strtolower(pathinfo($imgName,PATHINFO_EXTENSION));

   // rename img
     $filecount = 0;
     $files = glob($imgUploadRepo . "*.{jpg,png,gif,jpeg}",GLOB_BRACE);
     if ($files){
         $filecount = count($files);
     }
     $newImgName = "IMG" . strval($filecount) . "." . $imgFileType;

   // move to upload img repo
     $uploadPath = $imgUploadRepo . $newImgName;
     move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $uploadPath);

   //time when create img
     $timeNow = date("H:i:s d-m-Y",time() + 25200); // time in Vietnamese

     // img text to insert in db
     $imgArrayText = [$userEmail, $newImgName,$imgDesc,$imgSharingLevel,$timeNow];

     //write to db
     $dbRepo = '../uploadImgRepo/uploadImgRepo.db';

     $writeUploadDb = fopen($dbRepo, "a");

     flock($writeUploadDb, LOCK_EX);

     fputcsv($writeUploadDb, $imgArrayText);

     flock($writeUploadDb, LOCK_UN);
     fclose($writeUploadDb);

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