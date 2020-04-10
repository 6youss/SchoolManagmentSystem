<?php
require_once("NewsRestHandler.php");
require_once("News.php");		


$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$view = $obj['view'];
    
    switch($view){

        case "all":
            // to handle REST Url /mobile/list/
            $newsRestHandler = new NewsRestHandler();
            $newsRestHandler->getAllNews();
            break;

            case "student":
                // to handle REST Url /mobile/list/
                $newsRestHandler = new NewsRestHandler();
                $newsRestHandler->getStudentsNews();
                break;

                case "teacher":
                    // to handle REST Url /mobile/list/
                    $newsRestHandler = new NewsRestHandler();
                    $newsRestHandler->getTeachersNews();
                    break;

                    case "parent":
                        // to handle REST Url /mobile/list/
                        $newsRestHandler = new NewsRestHandler();
                        $newsRestHandler->getParentsNews();
                        break;


        }
        ?>