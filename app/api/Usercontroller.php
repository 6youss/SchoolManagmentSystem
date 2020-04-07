<?php
require_once("UserRestHandler.php");
require_once("User.php");		
$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$view = $obj['view'];
	$userName=$obj['userName'];
	$password=$obj['password'];

switch($view){
		
		case "login":
		$userRestHandler = new UserRestHandler();
		$userRestHandler->login_verification($userName,$password);
		break;

		/*case "getrole":
			$userRestHandler = new UserRestHandler();
			$userRestHandler->getUserrole($userName);
		break;*/
		
	    case "" :
		//404 - not found;
		break;
		
}


?>
