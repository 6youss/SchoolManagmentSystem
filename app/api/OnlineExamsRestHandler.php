<?php
require_once("SimpleRest.php");
require_once("OnlineExams.php");
		
class ExamsRestHandler extends SimpleRest {

	function getOnlineExams($classId,$studentId) {	

		$onlineExams = new OnlineExams();
		$rawData = $onlineExams->getOnlineExams($classId,$studentId);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No online exams found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["online exams"] = $rawData;
				
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