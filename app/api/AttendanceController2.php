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
	$date = "";
if(isset($_GET["date"]) ){
	$date = $_GET["date"];
    }}

    switch($view){

        case "class":
            // to handle REST Url /mobile/list/
            $attendanceRestHandler = new AttendanceRestHandler();
            $attendanceRestHandler->getClassAttendance($id,$date);
            break;

            case "subject":
                // to handle REST Url /mobile/list/
                $attendanceRestHandler = new AttendanceRestHandler();
                $attendanceRestHandler->getSubjectAttendance($id,$date);
                break;

                case "student":
                    // to handle REST Url /mobile/list/
                    $attendanceRestHandler = new AttendanceRestHandler();
                    $attendanceRestHandler->getStudentAttendance($id,$date);
                    break;

           


        }
        ?>