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


    switch($view){

        case "get":
            // to handle REST Url /mobile/list/
            $attendanceRestHandler = new AttendanceRestHandler();
            $attendanceRestHandler->getAttendance($id);
            break;

        }
        ?>