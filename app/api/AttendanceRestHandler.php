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

	function getClassAttendance($id,$date) {	

		$attendance = new Attendance();
		$rawData = $attendance->getClassAttendance($id,$date);
        
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
	
	function getSubjectAttendance($id,$date) {	

		$attendance = new Attendance();
		$rawData = $attendance->getSubjectAttendance($id,$date);
        
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
	
	function getStudentAttendance($id,$date) {	

		$attendance = new Attendance();
		$rawData = $attendance->getStudentAttendance($id,$date);
        
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
	
	function getClassSubjectAttendance($id,$id2,$date) {	

		$attendance = new Attendance();
		$rawData = $attendance->getClassSubjectAttendance($id,$id2,$date);
        
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
	
	function getClassStudentAttendance($id,$id2,$date) {	

		$attendance = new Attendance();
		$rawData = $attendance->getClassStudentAttendance($id,$id2,$date);
        
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
	
	function getSubjectStudentAttendance($id,$id2,$date) {	

		$attendance = new Attendance();
		$rawData = $attendance->getSubjectStudentAttendance($id,$id2,$date);
        
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

    /*function getAttendanceByDate($id,$date) {	

		$attendance = new Attendance();
		$rawData = $attendance->getAttendanceByDate($id,$date);
        
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
	}*/
	
	
    
    public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
    }
    
}
?>