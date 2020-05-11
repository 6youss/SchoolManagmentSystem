<?php
require_once("OnlineExamsRestHandler.php");
require_once("OnlineExams.php");		


/*{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}*/
    
    $json = file_get_contents('php://input');
 
    // decoding the received JSON and store into $obj variable.
    $obj = json_decode($json,true);
    
    // name store into $name.
   $view = $obj['view'];
   $examId = $obj['examId'];
   $studentId = $obj['studentId'];
   $examQuestionsAnswers = $obj['examQuestionsAnswers'];
   $examGrade = $obj['examGrade'];
   $examDate = $obj['examDate'];

    switch($view){

        case "insert":
            // to handle REST Url /mobile/list/
            $examsRestHandler = new ExamsRestHandler();
            $examsRestHandler->takeOnlineExams($examId,$studentId,$examQuestionsAnswers,$examGrade,$examDate);
            break;


        }
        ?>