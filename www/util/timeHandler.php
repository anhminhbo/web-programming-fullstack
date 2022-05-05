<?php
 // Created_time comparison function: descending order
 function created_time_cmp($p1, $p2) {
   // Convert date/time string to Unix timestamp
   return strtotime($p2[4]) - strtotime($p1[4]);
 }

?>