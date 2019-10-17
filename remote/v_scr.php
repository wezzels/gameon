<?php
 header('Content-Type: text/event-stream');
 header('Cache-Control: no-cache');
 $v_score = fopen("../board/v-score.txt", "r") or die("Unable to open file!");
 $score = "00";
 /*while(!feof($v_score)) {
   $score = fgets($v_score);
 }
  */
 $score = fgets($v_score);
 echo "data: ${score}\n\n";
 fclose($v_score);
 flush();
?>

