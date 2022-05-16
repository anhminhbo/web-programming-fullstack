<?php
function readInfo($dbRepoPath, $mode) {
    $readDb = fopen($dbRepoPath, $mode);
    flock($readDb, LOCK_SH);
    $records = array();
    while ($line = fgetcsv($readDb)) {
        $records[] = $line;
    }
    fclose($readDb);
    return $records;
}

function storeInfo($dbRepoPath, $arrayText, $mode) {
    // Store data to database
    $writeDb = fopen($dbRepoPath, $mode);
    flock($writeDb, LOCK_EX);
    fputcsv($writeDb, $arrayText);
    flock($writeDb, LOCK_UN);
    fclose($writeDb);
   }

function deleteContent($dbRepoPath){
    $temp = fopen($dbRepoPath, 'w');
    fclose($temp);
}
?>
