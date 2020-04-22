<?php
require_once("MessagesRestHandler.php");
require_once("Messages.php");		

    $json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];
    $fromId= $obj['fromId'];
    $toId= $obj['toId'];
    $messageText= $obj['messageText'];
    $dateSent= $obj['dateSent'];
    
    
    switch($view){

        case "send":
            // to handle REST Url /mobile/list/
            $messagesRestHandler = new MessagesRestHandler();
            $messagesRestHandler->sendMessage($fromId,$toId,$messageText,$dateSent);
            break;
        }
        ?>