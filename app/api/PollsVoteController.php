<?php
require_once("PollsRestHandler.php");
require_once("Polls.php");
$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];
    $id = $obj['id'];
    $options = $obj['options'];
    $users = $obj['users'];
    switch($view){
        case "vote":
            // to handle REST Url /mobile/list/
            $pollsRestHandler = new PollsRestHandler();
            $pollsRestHandler->votePoll($id,$options,$users);
            break;
        }
        ?>