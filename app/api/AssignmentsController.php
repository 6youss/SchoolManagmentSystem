<?php
require_once("AssignmentsRestHandler.php");
require_once("Assignments.php");		


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
            $assignmentsRestHandler = new AssignmentsRestHandler();
            $assignmentsRestHandler->getAllAssignments();
            break;
            case "clear":
                // to handle REST Url /mobile/list/
                $assignmentsRestHandler = new AssignmentsRestHandler();
                $assignmentsRestHandler->clearTable($obj['name']);
                break;
            

        }
        ?>