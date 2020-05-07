<?php
require_once("ExamMarksRestHandler.php");
require_once("ExamMarks.php");		


/*{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}

    {///////student id
	$examId = "";
    if(isset($_GET["examId"]) ){
        $examId = $_GET["examId"];
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
        }}

{///////student id
	$examMark = "";
if(isset($_GET["examMark"]) ){
	$examMark = $_GET["examMark"];
    }}

    {///////student id
	$attendanceMark = "";
    if(isset($_GET["attendanceMark"]) ){
        $attendanceMark = $_GET["attendanceMark"];
        }}

        {///////student id
	$markComments = "";
    if(isset($_GET["markComments"]) ){
        $markComments = $_GET["markComments"];
        }}*/

        $json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];
    $id=$obj['id'];
    $examMark = $obj['examMark'];
    $attendanceMark=$obj['attendanceMark'];
    $markComments=$obj['markComments'];

    switch($view){

            case "insert":
                // to handle REST Url /mobile/list/
                $exammarksRestHandler = new ExamMarksRestHandler();
                $exammarksRestHandler->updateExamMarks($id,$examMark,$attendanceMark,$markComments);

        }
        ?>