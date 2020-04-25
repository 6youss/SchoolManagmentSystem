<?php
require_once("SimpleRest.php");
require_once("Classes.php");
		
class ClassesRestHandler extends SimpleRest {

	function CountClasses() {	

		$classes = new Classes();
		$rawData = $classes->CountClasses();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('classes count' => 'No class found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["classes count"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

	function getAllClasses() {	

		$classes = new Classes();
		$rawData = $classes->getAllClasses();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('classes' => 'No class found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["classes"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

	function getClass($id) {	

		$class = new Classes();
		$rawData = $class->getClass($id);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No class found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["class"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function getClassStudents($id) {	

		$class = new Classes();
		$rawData = $class->getClassStudents($id);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No students found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["students"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	function getClassTeacher($teacherId) {	

		$class = new Classes();
		$rawData = $class->getClassTeacher($teacherId);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No teacher found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["teachers"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }
    
    function getTeacherClasses($id) {	

		$classes = new Classes();
		$rawData = $classes->getTeacherClasses($id);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No classes found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["classes"] = $rawData;
				
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