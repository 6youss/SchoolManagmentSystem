<?php
require_once("SimpleRest.php");
require_once("Attendance.php");
		
class AttendanceRestHandler extends SimpleRest {

	function getAttendance($id) {	

		$attendance = new Attendance();
		$rawData = $attendance->getAttendance($id);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No attendance found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["attendance"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

	
	
	function getSubjectsAttendance($classId,$date,$value) {	

		$attendance = new Attendance();
		$rawData = $attendance->getSubjectsAttendance($classId,$date,$value);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No attendance found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["attendance"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	function getStudentsAttendance($classId,$date,$value) {	

		$attendance = new Attendance();
		$rawData = $attendance->getStudentsAttendance($classId,$date,$value);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No attendance found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["attendance"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	function getFilteredAttendance($classId,$subjectId,$studentId,$date) {	

		$attendance = new Attendance();
		$rawData = $attendance->getFilteredAttendance($classId,$subjectId,$studentId,$date);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No attendance found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["attendance"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	function controlAttendance($classId,$subjectId,$studentId,$date,$status) {	

		$attendance = new Attendance();
		$rawData = $attendance->controlAttendance($classId,$subjectId,$studentId,$date,$status);
        
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
    
}
?>