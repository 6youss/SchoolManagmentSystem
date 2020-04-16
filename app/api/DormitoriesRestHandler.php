<?php
require_once("SimpleRest.php");
require_once("Dormitories.php");
		
class DormitoriesRestHandler extends SimpleRest {

	function getDormitorie($id) {	

		$dormitory = new Dormitories();
		$rawData = $dormitory->getDormitorie($id);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No dormitory found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["dormitory"] = $rawData;
				
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