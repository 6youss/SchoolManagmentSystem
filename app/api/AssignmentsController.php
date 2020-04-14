<?php
require_once("AssignmentsRestHandler.php");
require_once("Assignments.php");		


{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}
    
    
        
     
    
    

    switch($view){

        case "all":
            // to handle REST Url /mobile/list/
            $assignmentsRestHandler = new AssignmentsRestHandler();
            $assignmentsRestHandler->getAllAssignments();
            break;

            

        }
        ?>