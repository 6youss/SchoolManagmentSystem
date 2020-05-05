<?php
require_once("AttendanceRestHandler.php");
require_once("Attendance.php");	

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];
    $classId = $obj['classId'];
    $date = $obj['date'];
    $value = $obj['value'];
  


/*{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}

    {///////student id
	$value = "";
    if(isset($_GET["value"]) ){
        $value = $_GET["value"];
        }}

    {///////student id
	$classId = "";
    if(isset($_GET["classId"]) ){
        $classId = $_GET["classId"];
        }}

{///////student id
	$date = "";
if(isset($_GET["date"]) ){
	$date = $_GET["date"];
    }}*/

    switch($view){

        case "subjects":
            // to handle REST Url /mobile/list/
            $attendanceRestHandler = new AttendanceRestHandler();
            $attendanceRestHandler->getSubjectsAttendance($classId,$date,$value);
            break;

           

                case "students":
                    // to handle REST Url /mobile/list/
                    $attendanceRestHandler = new AttendanceRestHandler();
                    $attendanceRestHandler->getStudentsAttendance($classId,$date,$value);
                    break;

           


        }
        ?>