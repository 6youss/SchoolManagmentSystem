<?php
require_once("AttendanceRestHandler.php");
require_once("Attendance.php");		


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

    {///////student id
	$id2 = "";
    if(isset($_GET["id2"]) ){
        $id2 = $_GET["id2"];
        }}

{///////student id
	$date = "";
if(isset($_GET["date"]) ){
	$date = $_GET["date"];
    }}

    switch($view){

        case "class-subject":
            // to handle REST Url /mobile/list/
            $attendanceRestHandler = new AttendanceRestHandler();
            $attendanceRestHandler->getClassSubjectAttendance($id,$id2,$date);
            break;

           

                case "subject-student":
                    // to handle REST Url /mobile/list/
                    $attendanceRestHandler = new AttendanceRestHandler();
                    $attendanceRestHandler->getSubjectStudentAttendance($id,$id2,$date);
                    break;

           


        }
        ?>