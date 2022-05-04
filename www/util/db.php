<?php
function storeInfo($dbRepoPath,$arrayText, $mode){
    //write to db
    $appendDb = fopen($dbRepoPath, $mode);
    flock($appendDb, LOCK_EX);
    fputcsv($appendDb, $arrayText);
    flock($appendDb, LOCK_UN);
    fclose($appendDb);
   }
   
?>