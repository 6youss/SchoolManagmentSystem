<?php
require_once("SimpleRest.php");
require_once("News.php");
		
class EventsRestHandler extends SimpleRest {

	function getEvents() {	

		$events = new Events();
		$rawData = $events->getEvents($role);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No events found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["events"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

	/*function getAllEvents() {	

		$events = new Events();
		$rawData = $events->getAllEvents();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No events found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["all events"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }


    function getStudentsEvents() {	

		$events = new Events();
		$rawData = $events->getStudentsEvents();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No students events found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["student events"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

    function getTeachersEvents() {	

		$events = new Events();
		$rawData = $events->getTeachersEvents();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No teachers events found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["teacher events"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

    function getParentsEvents() {	

		$events = new Events();
		$rawData = $events->getParentsEvents();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No parents events found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["parent events"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }
    */
    
    public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
    }
    
}
?>