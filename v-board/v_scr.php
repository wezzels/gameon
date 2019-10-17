<?php
 header('Content-Type: text/event-stream');
 header('Cache-Control: no-cache');
 $v_score = fopen("v-score.txt", "r") or die("Unable to open file!");
 $score = "00";
 $score = fgets($v_score);
 echo "retry: 100\n";
 echo "data: ${score}\n\n";
 fclose($v_score);
 flush();
?>

