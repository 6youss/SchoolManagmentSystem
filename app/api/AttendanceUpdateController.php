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
	$obj = json_decode($json,true);
    $view = $obj['view'];
    $id=$obj['id'];
    $status=$obj['status'];*/
    {$id = "";
    if(isset($_POST["id"]) ){
        $id = $_POST["id"];
        }}
    {$status = "";
    if(isset($_POST["status"]) ){
        $status = $_POST["status"];
        }}
    $attendanceRestHandler = new AttendanceRestHandler();
    $attendanceRestHandler->updateAttendance($id,$status);
    /*$view = $_POST["view"];
    $id = $_POST["id"];
    $status = $_POST["status"];
*/
    switch($view){

                case "update":
                    // to handle REST Url /mobile/list/
                    $attendanceRestHandler = new AttendanceRestHandler();
                    $attendanceRestHandler->updateAttendance($id,$status);
                    break;

        }
        ?>