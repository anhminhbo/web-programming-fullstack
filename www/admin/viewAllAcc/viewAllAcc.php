<?php
require_once('../util/db.php');
require_once('../util/timeHandler.php');

$accRepoPath = '../../accounts.db';

$accounts = readInfo($accRepoPath, 'r');

// sort by most recent registered account
usort($accounts,'created_time_cmp');

$_SESSION['accounts'] = $accounts;

if ($accounts) {
    foreach ($accounts as $acc) {
        echo '<tr>';
    
        echo '<td><a href="display-account.php?email='.$acc[0].'"'.'>'.$acc[0].'</a></td>';
    
        echo '<td>' . $acc[1] .'</td>';
    
        echo '<td>' . $acc[2] .'</td>';
    
        echo '<td>' . $acc[3] .'</td>';
    
        echo '<td>' . $acc[4] .'</td>';
    
    
        echo '</tr>';
    }
} else {
    echo '<h3> No accounts available to display </h3>';
}



?>
