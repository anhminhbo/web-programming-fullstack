<?php
require_once('../util/db.php');
require_once('../util/timeHandler.php');

$accRepoPath = '../../accounts.db';

$accounts = readInfo($accRepoPath, 'r');

// sort by most recent registered account
usort($accounts,'created_time_cmp');

$_SESSION['accounts'] = $accounts;

$numberOfPages = ceil(count($_SESSION['accounts'])) / $numberOfItemsPerPage;

if ($accounts) {
    $totalLoopPerPage = 0;
    if (count($accounts) > $page*$numberOfItemsPerPage){
        $totalLoopPerPage = $page*$numberOfItemsPerPage;
      } else {
        $totalLoopPerPage = count($accounts);
      }

    for ($i = $thisPageFirstResult; $i<$totalLoopPerPage; $i++) {
        echo '<tr>';
        
        echo '<td>' .'<a href="displayAcc/display-account.php?email='.$accounts[$i][0].'"'.'>'.$accounts[$i][0].'</a></td>';
        
        echo '<td>' . $accounts[$i][1] .'</td>';
    
        echo '<td>' . $accounts[$i][2] .'</td>';
    
        echo '<td>' . $accounts[$i][3] .'</td>';
    
        echo '<td>' . $accounts[$i][4] .'</td>';
    
        echo '</tr>';
    }
} else {
    echo '<h3> No accounts available to display </h3>';
}



?>
