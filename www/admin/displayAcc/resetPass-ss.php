<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/www/util/db.php');
    $email = $_GET["email"];
    $read_db = readInfo($_SERVER['DOCUMENT_ROOT'].'/accounts.db','r');
    foreach ($read_db as $line) {
        $email_temp = $line[0];
        if ($email == $email_temp) {
            $fname = $line[2];
            $lname = $line[3];
            $createAt = $line[4];
            break;
        }
    }
    if (isset($_POST["pass"])){
        $repass = $_POST["pass"];
        $hashed_pass = password_hash($repass, PASSWORD_DEFAULT);
        for ($i = 0; $i<count($read_db); $i++){
            if ($read_db[$i][0] == $email){
                $read_db[$i][1] = $hashed_pass;
                break;
            }
        }
        $account_db = "../../../accounts.db";
        deleteContent($account_db);
        for ($i = 0; $i<count($read_db); $i++){
            $line = [$read_db[$i][0], $read_db[$i][1], $read_db[$i][2], $read_db[$i][3], $read_db[$i][4]];
            storeInfo($account_db, $line, "a");
        }
    }
?>