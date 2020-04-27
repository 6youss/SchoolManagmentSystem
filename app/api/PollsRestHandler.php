<?php
require_once("SimpleRest.php");
require_once("Polls.php");
		
class PollsRestHandler extends SimpleRest {

	function getPolls($role) {	

		$polls = new Polls();
		$rawData = $polls->getPolls($role);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No polls found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["polls"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

	function getAllPolls() {	

		$polls = new Polls();
		$rawData = $polls->getAllPolls();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No polls found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["all polls"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }


    function getStudentsPolls() {	

		$polls = new Polls();
		$rawData = $polls->getStudentsPolls();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No student polls found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["student polls"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

    function getTeachersPolls() {	

		$polls = new Polls();
		$rawData = $polls->getTeachersPolls();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No teacher polls found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["teacher polls"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

    function getParentsPolls() {	

		$polls = new Polls();
		$rawData = $polls->getParentsPolls();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No parent polls found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["parent polls"] = $rawData;
				
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