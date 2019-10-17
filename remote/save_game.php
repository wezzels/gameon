
<?php
$date  = date('Y-m-d');
$time  = date('H:i:s');
$action = $_POST['action'];
$game = 'volleyball';
$log = "Start log , " . $_POST["action"];

function load_score($team) {
  $v_score = fopen("../board/${team}-score.txt", "r") or die("Unable to open file!");
  $score = "00";
  $score = fgets($v_score);
  fclose($v_score);
  flush();
  return (${score});
  }

function load_set($team) {
  $v_set = fopen("../board/${team}-set.txt", "r") or die("Unable to open file!");
  $set = "00";
  $set = fgets($v_set);
  fclose($v_set);
  flush();
  return (${set});
  }

function save_game_log($date, $time, $action, $set, $score, $team, $game) {
  $myfile = fopen("${game}_${date}.txt", "w") or die("Unable to open file!");
  $txt = "${team} : ${set} : ${score} : ${time}\n";
  fwrite($myfile, $txt);
  fclose($myfile); 
  }

function save_score($score, $team) {
  $myfile = fopen("../board/${team}-score.txt", "w") or die("Unable to open file!");
  $txt = "${score}\n";
  fwrite($myfile, $txt);
  $log = $log + "in save_score: team = $team, score = $score \n\n";
  fclose($myfile);
  }

function save_set($score, $team) {
  $myfile = fopen("../board/${team}-set.txt", "w") or die("Unable to open file!");
  $txt = "${score}\n";
  fwrite($myfile, $txt);
  fclose($myfile);
  }
switch ($action) {
  case "Home+":
          $t_score = load_score('h');
          save_score($t_score + 1, 'h');
          $set = 0;
          $team = 'v';
          $score = $t_score + 1;
          break;
  case "Away+":
          $t_score = load_score('v');
          save_score( $t_score + 1, 'v');
          $set = 0;
          $team = 'v';
          $score = $t_score + 1;
          break;
  case "Set H":
	  $t_set = load_set('h');
	  if ($t_set < 3) {
		  save_set( $t_set + 1, 'h');
	  } else {  
		  save_set( 0 , 'h');
	  }	  
	  $set = $t_set;
          $team = 'v';
          $score = 0;
          break;
  case "Set V":
          $t_set = load_set('v');
          if ($t_set < 3) {
                  save_set( $t_set + 1, 'v');
          } else {
                  save_set( 0 , 'v');
          }
          $set = $t_set;
          $team = 'v';
          $score = 0;
          break;
  case "Home-":
          $t_score = load_score('h');
	  save_score( $t_score - 1, 'h');
          $set = 0;
          $team = 'v';
          $score = $t_score - 1;
          break;
  case "Away-":
          $t_score = load_score('v');
          save_score( $t_score - 1, 'v');
	  $set = 0;
	  $team = 'v';
	  $score = $t_score - 1;
          break;
  default:
          $set = 0;
          $team = 'error';
          $score = 0;

}
save_game_log($date, $time, $action, $set, $score, $team, $game);
echo "data: log is $log $date, $time, $action," . $_POST['action'] . ", $set, $score, $team, $game \n\n";
?>

