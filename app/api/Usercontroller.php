<?php
require_once("UserRestHandler.php");
require_once("User.php");		
$json = file_get_contents('php://input');
	 $obj = json_decode($json,true);
	$view = $obj['view'];
	$userName=$obj['userName'];
	$password=$obj['password'];

switch($view){
		
		case "login":
		$userRestHandler = new UserRestHandler();
		$userRestHandler->login_verification($userName,$password);
		break;
		
}
?>
