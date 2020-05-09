<?php
require_once("SimpleRest.php");
require_once("OnlineExamMark.php");
		
class ExamsRestHandler extends SimpleRest {

	function getOnlineExamMark($examId,$studentId) {	

        $examMark = new OnlineExamMark();
        $day = explode("/", $date);
	    $day = mktime(0,0,0,$day['0'],$day['1'],$day['2']);		
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
	
	
    
    public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
    }
    
}
?>