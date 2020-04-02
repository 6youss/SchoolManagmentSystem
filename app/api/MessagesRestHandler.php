<?php
require_once("SimpleRest.php");
require_once("Messages.php");
		
class MessagesRestHandler extends SimpleRest {

    function getAllMessages($id) {	

		$messages = new Messages();
		$rawData = $messages->getAllMessages($id);
        
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
	
	
    
    public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
    }
    
}
?>