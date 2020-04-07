<?php
require_once("UserRestHandler.php");
require_once("User.php");		
$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$view = $obj['view'];
	$userName=$obj['userName'];
 
switch($view){
		
		case "fetchStudent":
		$userRestHandler = new UserRestHandler();
		$userRestHandler->fetchLinkStudent($userName);
		break;
		
}


?>