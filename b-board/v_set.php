<?php
 header('Content-Type: text/event-stream');
 header('Cache-Control: no-cache');
 $v_set = fopen("../board/v-set.txt", "r") or die("Unable to open file!");
 $set = "&#x21D0;";
 $set = fgets($v_set);
 echo "retry: 100\n";
 echo "data: ${set}\n\n";
 fclose($v_set);
 flush();
?>

