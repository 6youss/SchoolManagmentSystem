<?php
require_once("NewsRestHandler.php");
require_once("News.php");		


{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}
    
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