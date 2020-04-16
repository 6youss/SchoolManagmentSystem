<?php
require_once("SimpleRest.php");
require_once("ClassesSchedule.php");
		
class ClassesScheduleRestHandler extends SimpleRest {

	function getClassSchedule($id) {	

		$classShedule = new ClassesSchedule();
		$rawData = $classShedule->getClassSchedule($id);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No class schedule found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["class schedule"] = $rawData;
				
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