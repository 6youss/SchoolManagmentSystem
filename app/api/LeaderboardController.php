<?php
require_once("LeaderboardRestHandler.php");
require_once("Leaderboard.php");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];

switch($view){

    case "get":
        // to handle REST Url /mobile/list/
        $LeaderboardRestHandler = new LeaderboardRestHandler();
        $LeaderboardRestHandler->getLeaderboard();
        break;


    }
    ?>