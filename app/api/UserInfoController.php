<?php
require_once("UserInfoRestHandler.php");
require_once("UserInfo.php");		


///////view
	/*$view = "";
if(isset($_GET["view"]) ){
	$get = $_GET["view"];
    }

    $id="";
    if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$view = "";
if(isset($_GET["view"]) ){
	$get = $_GET["view"];
    }
    $userName="";$password="";
    if(isset($_GET["userName"]) ){
    $userName = $_GET["userName"];
    }*/

    
$json = file_get_contents('php://input');
 
// decoding the received JSON and store into $obj variable.
$obj = json_decode($json,true);

// name store into $name.
$view = $obj['view'];
$userName=$obj['userName'];
    switch($view){

        /*case "all":
        $userinfoRestHandler = new UserInfoRestHandler();
        $userinfoRestHandler->getAllUsers();
        break;
        

        case "byid":
            $userinfoRestHandler = new UserInfoRestHandler();
            $userinfoRestHandler->getUserbyid($id);*/
            case "byinfo":
                $userinfoRestHandler = new UserInfoRestHandler();
                $userinfoRestHandler->getUserbyinfo($userName);
            
}
    
    ?>
    