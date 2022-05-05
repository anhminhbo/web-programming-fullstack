<?php
function renameImg($imageFileType, $path) {
    $filecount = 0;
    $files = glob($path . "*.{jpg,png,gif,jpeg}",GLOB_BRACE);
    if ($files){
        $filecount = count($files);
    }
    $new_img_name = "img" . strval($filecount) . "." . $imageFileType;
    return $new_img_name;
}
// --For uploadImg --
// $attr = 0 -> email
// $attr = 1 -> imgName
// $attr = 2 -> imgDesc
// $attr = 3 -> imgSharingLevel
// $attr = 4 -> Img create time

// --For profileImg --
// $attr = 0 -> email
// $attr = 1 -> imgName
// $attr = 2 -> imgDesc

function getImageByGuest($images) {
    $result = [];
// by sharing Level, Public = 1
    foreach ($images as $image) {
        if ($image[3] == '1') {
        array_push($result,$image);
        }
        }

   return $result;
}

function getImageByLoggedInUser($images, $email) {
    $result = [];

    foreach ($images as $image) {
        if ($image[3] == '1' || $image[3] == '2' || $image[0] == $email) {
        array_push($result,$image);
        }
        }

   return $result;
}


function getProfileImgByEmail($images, $email) {
    $result = [];

    foreach ($images as $image) {
        if ($image[0] == $email) {
        array_push($result,$image);
        }
        }

   return $result[count($result)-1];
}



?>