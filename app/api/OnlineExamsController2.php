<?php
require_once("OnlineExamsRestHandler.php");
require_once("OnlineExams.php");	

$view = $_POST["view"];
/*
$view = "";
if(isset($_POST["view"]))
    {$view = $_POST["view"];}
    
    $classId = "";
if(isset($_POST["classId"]))
    {$classId = $_POST["classId"];}

    $subjectId = "";
    if(isset($_POST["subjectId"]))
        {$subjectId = $_POST["subjectId"];}
    
    $studentId = "";
if(isset($_POST["studentId"]))
    {$studentId = $_POST["studentId"];}
    
    $date = "";
if(isset($_POST["date"]))
    {$date = $_POST["date"];}*/

	/*$view = "";
if(isset($_POST["view"]) ){
	$view = $_POST["view"];
    }*/
    
   /* $json = file_get_contents('php://input');
 
    // decoding the received JSON and store into $obj variable.
    $obj = json_decode($json,true);
    
    // name store into $name.
   $view = $obj['view'];
   $classId = $obj['classId'];
   $studentId = $obj['studentId'];
   $subjectId = $obj['subjectId'];
   $date = $obj['date'];*/

    switch($view){

        case "POSt":
            // to handle REST Url /mobile/list/
            $examsRestHandler = new ExamsRestHandler();
           // $examsRestHandler->getSubjectOnlineExams($classId,$studentId,$subjectId,$date);
           $examsRestHandler->getSubjectOnlineExams($_POST["classId"],$_POST["studentId"],$_POST["subjectId"],$_POST["date"]);
           //$examsRestHandler->getSubjectOnlineExams($obj['classId'],$obj['studentId'],$obj['subjectId'],$obj['date']);
            break;


        }
        ?>