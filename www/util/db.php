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
    $appendDb = fopen($dbRepoPath, $mode);
    flock($appendDb, LOCK_EX);
    fputcsv($appendDb, $arrayText);
    flock($appendDb, LOCK_UN);
    fclose($appendDb);
   }
?>