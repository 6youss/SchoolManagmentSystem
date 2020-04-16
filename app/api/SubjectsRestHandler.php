<?php
require_once("SimpleRest.php");
require_once("Subjects.php");
		
class SubjectsRestHandler extends SimpleRest {

	function getSubject($id) {	

		$subject = new Subjects();
		$rawData = $subject->getSubject($id);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No subject found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["subject"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }
    
    function getClassSubjects($id) {	

		$subjects = new Subjects();
		$rawData = $subjects->getClassSubjects($id);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No subjects found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["subjects"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function getTeacherClassSubjects($teacherId,$classId) {	

		$subjects = new Subjects();
		$rawData = $subjects->getTeacherClassSubjects($teacherId,$classId);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No subjects found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["subjects"] = $rawData;
				
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