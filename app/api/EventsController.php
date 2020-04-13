<?php
require_once("EventsRestHandler.php");
require_once("Events.php");		


/*{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}*/

    $json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$view = $obj['view'];
    
    switch($view){

        case "all":
            // to handle REST Url /mobile/list/
            $NewsRestHandler = new EventsRestHandler();
            $NewsRestHandler->getAllEvents();
            break;

            case "student":
                // to handle REST Url /mobile/list/
                $NewsRestHandler = new EventsRestHandler();
                $NewsRestHandler->getStudentsEvents();
                break;

                case "teacher":
                    // to handle REST Url /mobile/list/
                    $NewsRestHandler = new EventsRestHandler();
                    $NewsRestHandler->getTeachersEvents();
                    break;

                    case "parent":
                        // to handle REST Url /mobile/list/
                        $NewsRestHandler = new EventsRestHandler();
                        $NewsRestHandler->getParentsEvents();
                        break;


        }
        ?>