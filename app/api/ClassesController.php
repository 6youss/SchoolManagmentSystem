<?php
require_once("ClassesRestHandler.php");
require_once("Classes.php");		


$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];

    /*$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }*/
    

    switch($view){

        case "count":
            // to handle REST Url /mobile/list/
            $classesRestHandler = new ClassesRestHandler();
            $classesRestHandler->CountClasses();
            break;

        case "all":
            // to handle REST Url /mobile/list/
            $classesRestHandler = new ClassesRestHandler();
            $classesRestHandler->getAllClasses();
            break;
            
        }
        ?>