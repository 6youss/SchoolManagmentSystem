<?php
require_once("UserInfoRestHandler.php");
require_once("UserInfo.php");		 
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$view = $obj['view'];
$studentId=$obj['studentId'];
    switch($view){
            case "class":
                $userinfoRestHandler = new UserInfoRestHandler();
                $userinfoRestHandler->getStudentClass($studentId);
            break;
                case "parents":
                    $userinfoRestHandler = new UserInfoRestHandler();
                    $userinfoRestHandler->getStudentParents($studentId);
                break;
}
    ?>