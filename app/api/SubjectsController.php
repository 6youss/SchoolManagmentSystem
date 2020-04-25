<?php
require_once("SubjectsRestHandler.php");
require_once("Subjects.php");		

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];
    $id=$obj['id'];

/*{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}
    
{///////class id
	$id = "";
if(isset($_GET["id"]) ){
	$id = $_GET["id"];
    }}*/

    switch($view){

        case "get":
            // to handle REST Url /mobile/list/
            $subjectsRestHandler = new SubjectsRestHandler();
            $subjectsRestHandler->getSubject($id);
            break;

            case "class":
                $subjectsRestHandler = new SubjectsRestHandler();
                $subjectsRestHandler->getClassSubjects($id);
            break;

            case "teacher":
                $subjectsRestHandler = new SubjectsRestHandler();
                $subjectsRestHandler->getTeacherSubjects($id);
            break;

            case "subjectTeacher":
                $subjectsRestHandler = new SubjectsRestHandler();
                $subjectsRestHandler->getSubjectTeacher($id);
            break;

        }
        ?>