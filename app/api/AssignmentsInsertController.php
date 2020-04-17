<?php
require_once("AssignmentsRestHandler.php");
require_once("Assignments.php");		

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$view = $obj['view'];
    $classId=$obj['classId'];
     $subjectId=$obj['subjectId'];
     $teacherId=$obj['teacherId'];
     $assignmentTitle=$obj['assignmentTitle'];
     $assignmentDescription=$obj['assignmentDescription'];
     $assignmentDeadLine=$obj['assignmentDeadLine'];
     $asignmentFile=$obj['asignmentFile'];
/*{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}
    
    /// insert assignment
     $classId="";
     $subjectId="";
     $teacherId="";
     $assignmentTitle="";
     $assignmentDescription="";
     $assignmentDeadLine="";
     $asignmentFile="";
     if(isset($_GET["classId"]) && isset($_GET["subjectId"]) && isset($_GET["teacherId"]) &&
     isset($_GET["assignmentTitle"]) && isset($_GET["assignmentDescription"]) && isset($_GET["asignmentFile"])  && isset($_GET["assignmentDeadLine"]) )
        $classId=$_GET["classId"];$classId=$_GET["classId"];
        $subjectId=$_GET["subjectId"];
        $teacherId=$_GET["teacherId"];
        $assignmentTitle=$_GET["assignmentTitle"];
        $assignmentDescription=$_GET["assignmentDescription"];
        $asignmentFile=$_GET["asignmentFile"];
        $assignmentDeadLine=$_GET["assignmentDeadLine"];*/
        
     
    
    

    switch($view){

        

            case "insert":
                // to handle REST Url /mobile/list/
                $assignmentsRestHandler = new AssignmentsRestHandler();
                $assignmentsRestHandler->InsertAssignment($classId,$subjectId,$teacherId,$assignmentTitle,$assignmentDescription,$asignmentFile,$assignmentDeadLine);
                break;

        }
        ?>