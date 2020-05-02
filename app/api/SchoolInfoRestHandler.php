<?php
require_once("SimpleRest.php");
require_once("SchoolInfo.php");
		
class SchoolInfoRestHandler extends SimpleRest {

	function getAllSchoolInfo() {	

		$schoolinfo = new SchoolInfo();
		$rawData = $schoolinfo->getAllSchoolInfo();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No school info found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["school info"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function getSchoolPaymentInfo() {	

		$schoolinfo = new SchoolInfo();
		$rawData = $schoolinfo->getSchoolPaymentInfo();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No school payment info found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["school payment info"] = $rawData;
				
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