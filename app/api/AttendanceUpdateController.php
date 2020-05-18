<?php
require_once("AttendanceRestHandler.php");
require_once("Attendance.php");		

/*
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
        {///////student id
	$date = "";
    if(isset($_GET["date"]) ){
        $date = $_GET["date"];
        }}

       { $status = "";
    if(isset($_GET["status"]) ){
        $status = $_GET["status"];
        }}*/
        /*$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];
    $id=$obj['id'];
    $status=$obj['status'];*/

    

    $view = $_PUT["view"];
    $id = $_PUT["id"];
    $status = $_PUT["status"];

    switch($view){

                case "update":
                    // to handle REST Url /mobile/list/
                    $attendanceRestHandler = new AttendanceRestHandler();
                    $attendanceRestHandler->updateAttendance($id,$status);
                    break;

        }
        ?>