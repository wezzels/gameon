<?php
 header('Content-Type: text/event-stream');
 header('Cache-Control: no-cache');
 $h_set = fopen("../board/h-set.txt", "r") or die("Unable to open file!");
 $set = "0";
 $set = fgets($h_set);
 echo "data: ${set}\n\n";
 fclose($h_set);
 flush();
?>

