<?php
require_once("MessagesRestHandler.php");
require_once("Messages.php");		


/*{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}

   { $id = "";
if(isset($_GET["userId"]) ){
	$userId = $_GET["userId"];
    }}*/

    $json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];
    $userId= $obj['userId'];
    $user2Id= $obj['user2Id'];
    
    switch($view){

        case "conversation":
            // to handle REST Url /mobile/list/
            $messagesRestHandler = new MessagesRestHandler();
            $messagesRestHandler->getConversation($userId,$user2Id);
            break;


        }
        ?>