<?php
require_once("UserRestHandler.php");
require_once("User.php");		
$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];
    $pun=$obj['userName'];
$peml=$obj['email'];
$ppw=$obj['password'];
$pfn=$obj['fullName'];
$pbd=$obj['birthDay'];
$pp=$obj['profession'];
$pg=$obj['gender'];
$padr=$obj['adress'];
$ppn=$obj['phoneNumber'];
$pmn=$obj['mobileNumber'];
$pof=$obj['parentOf'];

switch($view){

		case "register_parent":
				$userRestHandler = new UserRestHandler();
				$userRestHandler->register_parent($pun,$peml,$ppw,$pfn,$pbd,$pp,$pg,$padr,$ppn,$pmn,$pof);
				break;
}


?>