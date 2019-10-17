<?php
 header('Content-Type: text/event-stream');
 header('Cache-Control: no-cache');
 $h_score = fopen("h-score.txt", "r") or die("Unable to open file!");
 $score = "00";
 $score = fgets($h_score);
 echo "retry:100\n";
 echo "data: ${score}\n\n";
 fclose($h_score);
 flush();
?>

