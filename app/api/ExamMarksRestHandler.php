<?php
require_once("SimpleRest.php");
require_once("ExamMarks.php");
		
class ExamMarksRestHandler extends SimpleRest {

	function getExamMarks($classId,$subjectId,$studentId,$examId) {	

		$exammarks = new ExamMarks();
		$rawData = $exammarks->getExamMarks($classId,$subjectId,$studentId,$examId);
        
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

	function getSubjectsExamMarks($classId,$studentId) {	

		$exammarks = new ExamMarks();
		$rawData = $exammarks->getSubjectsExamMarks($classId,$studentId);
        
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

	function getStudentsExamMarks($classId,$subjectId) {	

		$exammarks = new ExamMarks();
		$rawData = $exammarks->getStudentsExamMarks($classId,$subjectId);
        
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

	function getClassSubjectStudentExamMarks($classId,$subjectId,$studentId) {	

		$exammarks = new ExamMarks();
		$rawData = $exammarks->getClassSubjectStudentExamMarks($classId,$subjectId,$studentId);
        
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

	function getClassSubjectExamExamMarks($classId,$subjectId,$examId) {	

		$exammarks = new ExamMarks();
		$rawData = $exammarks->getClassSubjectExamExamMarks($classId,$subjectId,$examId);
        
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

	function insertExamMarks($examId,$classId,$subjectId,$studentId,$examMark,$attendanceMark,$markComments) {	

		$exammarks = new ExamMarks();
		$rawData = $exammarks->insertExamMarks($examId,$classId,$subjectId,$studentId,$examMark,$attendanceMark,$markComments);
        
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


	function updateExamMarks($id,$examMark,$attendanceMark,$markComments) {	

		$exammarks = new ExamMarks();
		$rawData = $exammarks->updateExamMarks($id,$examMark,$attendanceMark,$markComments);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'ERROR!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["update status"] = $rawData;
				
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