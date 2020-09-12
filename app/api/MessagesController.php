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
    
    switch($view){

        case "conversations":
            // to handle REST Url /mobile/list/
            $messagesRestHandler = new MessagesRestHandler();
            $messagesRestHandler->getConversations($userId);
            break;

        case "all":
            // to handle REST Url /mobile/list/
            $messagesRestHandler = new MessagesRestHandler();
            $messagesRestHandler->getAllMessages($userId);
            break;

        case "sent":
            // to handle REST Url /mobile/list/
            $messagesRestHandler = new MessagesRestHandler();
            $messagesRestHandler->getSentMessages($userId);
            break;
        case "recieved":
            $messagesRestHandler = new MessagesRestHandler();
            $messagesRestHandler->getReceivedMessages($userId);
        break;

        case "sender":
            $messagesRestHandler = new MessagesRestHandler();
            $messagesRestHandler->getMessageSender($userId);
        break;

        }
        ?>