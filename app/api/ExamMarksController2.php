<?php
require_once("ExamMarksRestHandler.php");
require_once("ExamMarks.php");		


{///////view
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
        }}

    switch($view){

                

                    case "subject-student":
                        // to handle REST Url /mobile/list/
                        $exammarksRestHandler = new ExamMarksRestHandler();
                        $exammarksRestHandler->getSubjectStudentExamMarks($id,$id2);
                        break;

                        case "class-subject":
                            // to handle REST Url /mobile/list/
                            $exammarksRestHandler = new ExamMarksRestHandler();
                            $exammarksRestHandler->getClassSubjectExamMarks($id,$id2);
                            break;


        }
        ?>