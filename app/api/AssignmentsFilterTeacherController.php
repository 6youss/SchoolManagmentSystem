<?php
require_once("AssignmentsRestHandler.php");
require_once("Assignments.php");		

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];
    $id= $obj['id'];
    $uid=$obj['uid'];
    
/*{///////view
	$view = "";$id="";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}
{///////view
	$id="";
if(isset($_GET["id"])){
	$id = $_GET["id"];
    }}

    {///////view
	$uid="";
    if(isset($_GET["uid"])){
        $uid = $_GET["uid"];
        }}*/
    switch($view){

       

            case "classid":
                // to handle REST Url /mobile/list/
                $assignmentsRestHandler = new AssignmentsRestHandler();
                $assignmentsRestHandler->getTeacherClassAssignments($uid,$id);
                break;

                case "subjectid":
                    // to handle REST Url /mobile/list/
                    $assignmentsRestHandler = new AssignmentsRestHandler();
                    $assignmentsRestHandler->getTeacherSubjectAssignments($uid,$id);
                    break;

                    


        }
        ?>