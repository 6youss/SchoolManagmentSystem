<?php
require_once("PollsRestHandler.php");
require_once("Polls.php");		

/*
{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}*/

    $json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$view = $obj['view'];
    $role=$obj['role'];
    switch($view){
        case "get":
            // to handle REST Url /mobile/list/
            $pollsRestHandler = new PollsRestHandler();
            $pollsRestHandler->getPolls($role);
            break;
        /*case "all":
            // to handle REST Url /mobile/list/
            $pollsRestHandler = new PollsRestHandler();
            $pollsRestHandler->getAllPolls();
            break;

            case "student":
                // to handle REST Url /mobile/list/
                $pollsRestHandler = new PollsRestHandler();
                $pollsRestHandler->getStudentsPolls();
                break;

                case "teacher":
                    // to handle REST Url /mobile/list/
                    $pollsRestHandler = new PollsRestHandler();
                    $pollsRestHandler->getTeachersPolls();
                    break;

                    case "parent":
                        // to handle REST Url /mobile/list/
                        $pollsRestHandler = new PollsRestHandler();
                        $pollsRestHandler->getParentsPolls();
                        break;*/


        }
        ?>