<?php
 header('Content-Type: text/event-stream');
 header('Cache-Control: no-cache');
 $h_score = fopen("../board/h-score.txt", "r") or die("Unable to open file!");
 $score = "00";
 /*while(!feof($v_score)) {
   $score = fgets($v_score);
 }
  */
 $score = fgets($h_score);
 echo "data: ${score}\n\n";
 fclose($h_score);
 flush();
?>

