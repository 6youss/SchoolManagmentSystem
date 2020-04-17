<?php
require_once("ExamMarksRestHandler.php");
require_once("ExamMarks.php");		


{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}
    
{///////student id
	$id = "";
if(isset($_GET["id"]) ){
	$id = $_GET["id"];
    }}

    switch($view){

        case "get":
            // to handle REST Url /mobile/list/
            $exammarksRestHandler = new ExamMarksRestHandler();
            $exammarksRestHandler->getExamMarks($id);
            break;
        }
        ?>