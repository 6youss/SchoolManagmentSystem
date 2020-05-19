<?php
require_once("OnlineExamsRestHandler.php");
require_once("OnlineExams.php");	
$json = file_get_contents('php://input');
 
    // decoding the received JSON and store into $obj variable.
    $obj = json_decode($json,true);
    
    // name store into $name.
   $view = $obj['view'];
   switch($view){

    case "update":
        // to handle REST Url /mobile/list/
        $examsRestHandler = new ExamsRestHandler();
        $examsRestHandler->updateOnlineExam($obj['examId'],$obj['examTitle'],$obj['examDescription'],$obj['examClass'],$obj['examTeacher']
        ,$obj['examSubject'],$obj['examDate'],$obj['ExamEndDate'],$obj['examQuestion']);
            break;


        }
        ?>