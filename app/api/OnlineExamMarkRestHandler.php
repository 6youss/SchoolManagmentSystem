<?php
require_once("SimpleRest.php");
require_once("OnlineExamMark.php");
		
class ExamsRestHandler extends SimpleRest {

	function getOnlineExamMark($examId,$studentId) {	

        $examMark = new OnlineExamMark();	
		$rawData = $examMark->getOnlineExamMark($examId,$studentId);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No exam mark found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["exam mark"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function getOnlineExamMarks($examId) {	

        $examMark = new OnlineExamMark();	
		$rawData = $examMark->getOnlineExamMarks($examId);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No exam marks found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["exam marks"] = $rawData;
				
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