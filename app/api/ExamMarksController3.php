<?php
require_once("ExamMarksRestHandler.php");
require_once("ExamMarks.php");		

$json = file_get_contents('php://input');
 
// decoding the received JSON and store into $obj variable.
$obj = json_decode($json,true);

// name store into $name.
$view = $obj['view'];
$classId = $obj['classId'];
$subjectId = $obj['subjectId'];
$value = $obj['value'];


/*{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}
    
{///////student id
	$classId = "";
if(isset($_GET["classId"]) ){
	$classId = $_GET["classId"];
    }}

    {///////student id
	$subjectId = "";
    if(isset($_GET["subjectId"]) ){
        $subjectId = $_GET["subjectId"];
        }}

        {///////student id
	$studentId = "";
    if(isset($_GET["studentId"]) ){
        $studentId = $_GET["studentId"];
        }}*/

    switch($view){

            case "student":
                // to handle REST Url /mobile/list/
                $exammarksRestHandler = new ExamMarksRestHandler();
                $exammarksRestHandler->getClassSubjectStudentExamMarks($classId,$subjectId,$value);
            break;

            case "exam":
                // to handle REST Url /mobile/list/
                $exammarksRestHandler = new ExamMarksRestHandler();
                $exammarksRestHandler->getClassSubjectExamExamMarks($classId,$subjectId,$value);
            break;

        }
        ?>