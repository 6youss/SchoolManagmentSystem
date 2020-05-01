<?php
require_once("AssignmentsRestHandler.php");
require_once("Assignments.php");		

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];
    $id=$obj['id'];
    $subjectId=$obj['subjectId'];
    
/*{///////view
	$view = "";$id="";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}
{///////view
	$id="";
if(isset($_GET["id"])){
	$id = $_GET["id"];
    }}*/
    
    switch($view){

       

            

                case "subjectid":
                    // to handle REST Url /mobile/list/
                    $assignmentsRestHandler = new AssignmentsRestHandler();
                    $assignmentsRestHandler->getClassSubjectAssignments($id,$subjectId);
                    break;

                   /* case "teacherid":
                        // to handle REST Url /mobile/list/
                        $assignmentsRestHandler = new AssignmentsRestHandler();
                        $assignmentsRestHandler->getClassTeacherAssignments($id,$subjectId);
                        break;*/


        }
        ?>