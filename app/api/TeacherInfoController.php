<?php
require_once("UserInfoRestHandler.php");
require_once("UserInfo.php");		


/*{
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}
    {
        $studentId = "";
    if(isset($_GET["studentId"]) ){
        $studentId = $_GET["studentId"];
        }}*/
    
$json = file_get_contents('php://input');
 
// decoding the received JSON and store into $obj variable.
$obj = json_decode($json,true);

// name store into $name.
$view = $obj['view'];
$teacherId=$obj['teacherId'];
    switch($view){

  
            case "get":
                $userinfoRestHandler = new UserInfoRestHandler();
                $userinfoRestHandler->getTeacher($teacherId);
            break;
}
    
    ?>