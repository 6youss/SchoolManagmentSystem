<?php
require_once("SimpleRest.php");
require_once("OnlineExams.php");
		
class ExamsRestHandler extends SimpleRest {

	function getOnlineExams($classId,$studentId,$date) {	

        $onlineExams = new OnlineExams();
        $day = explode("/", $date);
	    $day = mktime(0,0,0,$day['0'],$day['1'],$day['2']);		
		$rawData = $onlineExams->getOnlineExams($classId,$studentId,$day);
        
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

	function getSubjectOnlineExams($classId,$studentId,$subjectId,$date) {	

        $onlineExams = new OnlineExams();
        $day = explode("/", $date);
	    $day = mktime(0,0,0,$day['0'],$day['1'],$day['2']);		
		$rawData = $onlineExams->getSubjectOnlineExams($classId,$studentId,$subjectId,$day);
        
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

	function getTeacherOnlineExams($classId,$date) {	

        $onlineExams = new OnlineExams();
        $day = explode("/", $date);
	    $day = mktime(0,0,0,$day['0'],$day['1'],$day['2']);		
		$rawData = $onlineExams->getTeacherOnlineExams($classId,$day);
        
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

	function getTeacherSubjectOnlineExams($classId,$subjectId,$date) {	

        $onlineExams = new OnlineExams();
        $day = explode("/", $date);
	    $day = mktime(0,0,0,$day['0'],$day['1'],$day['2']);		
		$rawData = $onlineExams->getTeacherSubjectOnlineExams($classId,$subjectId,$day);
        
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