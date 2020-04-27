<?php
require_once("SimpleRest.php");
require_once("UserInfo.php");
		
class UserInfoRestHandler extends SimpleRest {

	function getAllUsers() {	

		$user = new UserInfo();
		$rawData = $user->getAllUsers();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No user info found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["users info"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	function getUserbyid($id) {	

		$user = new UserInfo();
		$rawData = $user->getUserbyid($id);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No user info found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["user info"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
		
	}
	
	function getUserbyinfo($userName) {	

		$user = new UserInfo();
		$rawData = $user->getUserbyinfo($userName);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No user info found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["user info"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
		
	}
	
	function getStudentClass($studentId) {	

		$user = new UserInfo();
		$rawData = $user->getStudentClass($studentId);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No user info found!');		
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
	
	function getStudentParents($studentId) {	

		$user = new UserInfo();
		$rawData = $user->getStudentParents($studentId);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No parents info found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["parents"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
		
    }
	
	function getTeacher($teacherId) {	

		$user = new UserInfo();
		$rawData = $user->getTeacher($teacherId);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No teacher info found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["teacher"] = $rawData;
				
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