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

?>