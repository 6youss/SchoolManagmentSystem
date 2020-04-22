<?php
require_once("MessagesRestHandler.php");
require_once("Messages.php");		

    $json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];
    $user= $obj['user'];
    
    
    switch($view){

        case "reciever":
            // to handle REST Url /mobile/list/
            $messagesRestHandler = new MessagesRestHandler();
            $messagesRestHandler->getMessageReciever($user);
            break;
        }
        ?>