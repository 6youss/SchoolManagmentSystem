<?php
require_once("SimpleRest.php");
require_once("Messages.php");
		
class MessagesRestHandler extends SimpleRest {

	function getConversations($id) {	

		$messages = new Messages();
		$rawData = $messages->getConversations($id);
		for($i=0;$i<sizeof($rawData);$i++){
			$rawData[$i]['lastMessageDate']=date('m/d/Y H:i',$rawData[$i]['lastMessageDate']);
		}
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No conversations found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["conversations"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	function getConversation($id,$id2) {	

		$messages = new Messages();
		$rawData = $messages->getConversation($id,$id2);
		for($i=0;$i<sizeof($rawData);$i++){
			$rawData[$i]['dateSent']=date('m/d/Y H:i',$rawData[$i]['dateSent']);
		}
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No conversation found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["conversation"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function deleteConversation($conversation) {	

		$messages = new Messages();
		$rawData = $messages->deleteConversation($conversation);
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'ERROR!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["delete status"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }
	
	function updateStatus($conversation,$status) {	

		$messages = new Messages();
		$rawData = $messages->updateStatus($conversation,$status);
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'ERROR!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["update status"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

    function getAllMessages($id) {	

		$messages = new Messages();
		$rawData = $messages->getAllMessages($id);
		for($i=0;$i<sizeof($rawData);$i++){
			$rawData[$i]['dateSent']=date('m/d/Y',$rawData[$i]['dateSent']);
		}
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No messages found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["all messages"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

	function getSentMessages($id) {	

		$messages = new Messages();
		$rawData = $messages->getSentMessages($id);
        for($i=0;$i<sizeof($rawData);$i++){
			$rawData[$i]['dateSent']=date('m/d/Y',$rawData[$i]['dateSent']);
		}
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No sent messages found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["sent messages"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }
    
    function getReceivedMessages($id) {	

		$messages = new Messages();
		$rawData = $messages->getReceivedMessages($id);
        for($i=0;$i<sizeof($rawData);$i++){
			$rawData[$i]['dateSent']=date('m/d/Y',$rawData[$i]['dateSent']);
		}
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No recieved messages found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["recieved messages"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	function getMessageSender($id) {	

		$messages = new Messages();
		$rawData = $messages->getMessageSender($id);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No user found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["user"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function getMessageReciever($user) {	

		$messages = new Messages();
		$rawData = $messages->getMessageReciever($user);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No user found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["user"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function sendMessage($fromId,$toId,$messageText,$dateSent) {	

		$messages = new Messages();
		$date = explode("/", $dateSent);
	    $date = mktime($date['3'],$date['4'],$date['5'],$date['0'],$date['1'],$date['2']);
		$rawData = $messages->sendMessage($fromId,$toId,$messageText,$date);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'ERROR!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["insert status"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
    
    public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
    }
    
}
?>