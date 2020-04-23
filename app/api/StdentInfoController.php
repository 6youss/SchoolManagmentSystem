<?php
require_once("UserInfoRestHandler.php");
require_once("UserInfo.php");		



    
$json = file_get_contents('php://input');
 
// decoding the received JSON and store into $obj variable.
$obj = json_decode($json,true);

// name store into $name.
$view = $obj['view'];
$studentId=$obj['studentId'];
    switch($view){

  
            case "class":
                $userinfoRestHandler = new UserInfoRestHandler();
                $userinfoRestHandler->getStudentClass($studentId);
            
}
    
    ?>