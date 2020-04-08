<?php
require_once("UserRestHandler.php");
require_once("User.php");		
$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];
    $pun=$obj['un'];
$peml=$obj['eml'];
$ppw=$obj['pw'];
$pfn=$obj['fn'];
$pbd=$obj['bd'];
$pp=$obj['profession'];
$pg=$obj['g'];
$padr=$obj['adr'];
$ppn=$obj['pn'];
$pmn=$obj['mn'];
$pof=$obj['ParentOf'];

switch($view){

		case "register_parent":
				$userRestHandler = new UserRestHandler();
				$userRestHandler->register_parent($pun,$peml,$ppw,$pfn,$pbd,$pp,$pg,$padr,$ppn,$pmn,$pof);
				break;
}


?>