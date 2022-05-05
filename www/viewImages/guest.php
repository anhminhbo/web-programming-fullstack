<?php


require_once('../util/db.php');
require_once('../util/imageHandler.php');
require_once('../util/timeHandler.php');
//Get img from db

$uploadImages = readInfo('../uploadImgRepo/uploadImgRepo.db','r');
$profileImages = readInfo('../profileImgRepo/profilePicture.db','r');

$uploadImages = getImageByGuest($uploadImages);


usort($uploadImages,'created_time_cmp');


  
?>