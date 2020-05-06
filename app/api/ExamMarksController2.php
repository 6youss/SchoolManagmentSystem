<?php
require_once("ExamMarksRestHandler.php");
require_once("ExamMarks.php");		


/*{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}
    
{///////student id
	$subjectId = "";
if(isset($_GET["id"]) ){
	$subjectId = $_GET["id"];
    }}

    {///////student id
	$studentId = "";
    if(isset($_GET["id2"]) ){
        $id2 = $_GET["id2"];
        }}*/

        $json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];
    $classId = $obj['classId'];
    $value = $obj['value'];

    switch($view){

                

                    case "subjects":
                        // to handle REST Url /mobile/list/
                        $exammarksRestHandler = new ExamMarksRestHandler();
                        $exammarksRestHandler->getSubjectsExamMarks($classId,$value);
                        break;

                        case "students":
                            // to handle REST Url /mobile/list/
                            $exammarksRestHandler = new ExamMarksRestHandler();
                            $exammarksRestHandler->getStudentsExamMarks($classId,$value);
                            break;


        }
        ?>