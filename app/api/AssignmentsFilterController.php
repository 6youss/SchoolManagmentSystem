<?php
require_once("AssignmentsRestHandler.php");
require_once("Assignments.php");		


{///////view
	$view = "";$id="";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}
{///////view
	$id="";
if(isset($_GET["id"])){
	$id = $_GET["id"];
    }}
    switch($view){

       

            case "classid":
                // to handle REST Url /mobile/list/
                $assignmentsRestHandler = new AssignmentsRestHandler();
                $assignmentsRestHandler->getClassAssignments($id);
                break;

                case "subjectid":
                    // to handle REST Url /mobile/list/
                    $assignmentsRestHandler = new AssignmentsRestHandler();
                    $assignmentsRestHandler->getSubjectAssignments($id);
                    break;

                    case "teacherid":
                        // to handle REST Url /mobile/list/
                        $assignmentsRestHandler = new AssignmentsRestHandler();
                        $assignmentsRestHandler->getTeacherAssignments($id);
                        break;


        }
        ?>