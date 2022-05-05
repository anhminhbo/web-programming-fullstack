<?php

require_once('../util/db.php');
require_once('../util/imageHandler.php');
require_once('../util/timeHandler.php');
//Get img from db


$email = $_SESSION['email'];

$uploadImages = readInfo('../uploadImgRepo/uploadImgRepo.db','r');
$profileImages = readInfo('../profileImgRepo/profilePicture.db','r');

$uploadImages = getImageByLoggedInUser($uploadImages,$email);


usort($uploadImages,'created_time_cmp');


  
?>