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

		//$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["online exams"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}else if(strpos($requestContentType,'text/html') !== false){
			$response = $this->encodeHtml($rawData);
			echo $response;
		} else if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
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
	
	function takeOnlineExams($examId,$studentId,$examQuestionsAnswers,$examGrade,$examDate) {	

        $onlineExams = new OnlineExams();
        $day = explode("/", $examDate);
	    $day = mktime(0,0,0,$day['0'],$day['1'],$day['2']);		
		$rawData = $onlineExams->takeOnlineExams($examId,$studentId,$examQuestionsAnswers,$examGrade,$day);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'ERROR!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["insert status"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
    
    public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}
	public function encodeHtml($responseData) {
	
		$htmlResponse = "<table border='1'>";
		foreach($responseData as $key=>$value) {
    			$htmlResponse .= "<tr><td>". $key. "</td><td>". $value. "</td></tr>";
		}
		$htmlResponse .= "</table>";
		return $htmlResponse;		
	}
	public function encodeXml($responseData) {
		// creating object of SimpleXMLElement
		$xml = new SimpleXMLElement('<?xml version="1.0"?><mobile></mobile>');
		foreach($responseData as $key=>$value) {
			$xml->addChild($key, $value);
		}
		return $xml->asXML();
	}
    
}
?>