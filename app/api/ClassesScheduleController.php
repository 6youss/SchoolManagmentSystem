<?php
require_once("ClassesScheduleRestHandler.php");
require_once("ClassesSchedule.php");		

/*$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];
    $classId=$obj['classId'];*/

{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}
    
{///////class id
	$id = "";
if(isset($_GET["id"]) ){
	$id = $_GET["id"];
    }}

    switch($view){

        case "get":
            // to handle REST Url /mobile/list/
            $classesscheduleRestHandler = new ClassesScheduleRestHandler();
        $classesscheduleRestHandler->getClassSchedule(/*$classId*/$id);
            break;


        }
        ?>