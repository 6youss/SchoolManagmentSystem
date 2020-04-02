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
    
    public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
    }
    
}
    ?>