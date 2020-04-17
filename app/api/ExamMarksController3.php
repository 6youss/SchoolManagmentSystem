<?php
require_once("ExamMarksRestHandler.php");
require_once("ExamMarks.php");		


{///////view
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
        }}

    switch($view){

            case "class-subject-student":
                // to handle REST Url /mobile/list/
                $exammarksRestHandler = new ExamMarksRestHandler();
                $exammarksRestHandler->getClassSubjectStudentExamMarks($classId,$subjectId,$studentId);

        }
        ?>