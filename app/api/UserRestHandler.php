<?php
require_once("SimpleRest.php");
require_once("User.php");
		
class UserRestHandler extends SimpleRest {

	function getAllUsers() {	

		$user = new User();
		$rawData = $user->getAllUsers();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No fragrance found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["users"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	function getUserbyid($id) {	

		$user = new User();
		$rawData = $user->getUserbyid($id);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No fragrance found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["user"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
		
	}
	
	function login_verification($userName,$password){
		$user = new User();
		$rawData = $user->login($userName/*,$password*/);
		
		 
		 
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('status' => 'user doesn\'t exist');		
		} else {
			//while($row=mysql_fetch_array($rawData)){
		
				$row=$rawData[0];
		        $act=$row["activated"];
				$role=$row["role"];
				$password =$row["password"] ;
			
				if($act==1){
				
				if($role=="admin"){
				$statusCode = 404;
					//$rawData = array('status' => 'you are an admin');
					$rawData = array('status' => 'user doesn\'t exist');
				}else{
				if(password_verify($password,$password)==1 ){
						$statusCode = 200;
						$rawData = array('status' => 'login successfully');
					 }else{
						$statusCode = 404;
						$rawData = array('status' => 'wrong login informations'); 
					 }
				}
				}else{
					$statusCode = 404;
					$rawData = array('status' => 'under verification');
				}
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		//$result["login status"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response; 

			
		}

		
	
	}


	function getUserrole($userName){
		
		$user = new User();
	$rawData = $user->getUserrole($userName);
	
	if(empty($rawData)) {
		$statusCode = 404;
		$rawData = array('error' => 'No user found!');		
	} else {
		$statusCode = 200;
	}

	$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
	$this ->setHttpHeaders($requestContentType, $statusCode);
	
	$result["role"] = $rawData;
			
	if(strpos($requestContentType,'application/json') !== false){
		$response = $this->encodeJson($result);
		echo $response;
	}
	
	 }
		
		function register_teacher($teacherUserName,$teacherEmail,$teacherPassword,$teacherFullName,$teacherBirthDay,
		$teacherGender,$teacherAdress,$teacherPhoneNumber,$teacherMobileNumber){
		$user = new User();
		/*$birthday = explode("/", "03/25/1998");
			$birthday = mktime(0,0,0,$birthday['0'],$birthday['1'],$birthday['2']);
			echo $birthday;
			echo "////// " .date('m/d/Y',$birthday);*/
		$birthday = explode("/", $teacherBirthDay);
		$birthday = mktime(0,0,0,$birthday['0'],$birthday['1'],$birthday['2']);
		$rawData = $user->register_teacher($teacherUserName,$teacherEmail,$this->make($teacherPassword),$teacherFullName,$birthday,$teacherGender,$teacherAdress,$teacherPhoneNumber,$teacherMobileNumber);
        
		
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('status' => 'ERROR !');		
		} else {
			$statusCode = 200;
			
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["status"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
		}

		function register_student($studentUserName,$studentEmail,$studentPassword,$studentFullName,$studentBirthDay,$studentRollingId,
		$studentClassId,$studentGender,$studentAdress,$studentPhoneNumber,$studentMobileNumber){
			$user = new User();
			/*$birthday = explode("/", "03/25/1998");
				$birthday = mktime(0,0,0,$birthday['0'],$birthday['1'],$birthday['2']);
				echo $birthday;
				echo "////// " .date('m/d/Y',$birthday);*/
			$birthday = explode("/", $studentBirthDay);
			$birthday = mktime(0,0,0,$birthday['0'],$birthday['1'],$birthday['2']);
			$rawData = $user->register_student($studentUserName,$studentEmail,$this->make($studentPassword),$studentFullName,
			$birthday,$studentRollingId,$studentClassId,$studentGender,$studentAdress,$studentPhoneNumber,$studentMobileNumber);
			
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('status' => 'ERROR !');		
			} else {
				$statusCode = 200;
				
			}
	
			$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
			$this ->setHttpHeaders($requestContentType, $statusCode);
			
			$result["status"] = $rawData;
					
			if(strpos($requestContentType,'application/json') !== false){
				$response = $this->encodeJson($result);
				echo $response;
			}
			}

			function register_parent($parentUserName,$parentEmail,$parentPassword,$parentFullName,$parentBirthDay,$parentProfession,$parentGender,
			$parentAdress,$parentPhoneNumber,$parentMobileNumber,$parentOf){
				$user = new User();
				/*$birthday = explode("/", "03/25/1998");
					$birthday = mktime(0,0,0,$birthday['0'],$birthday['1'],$birthday['2']);
					echo $birthday;
					echo "////// " .date('m/d/Y',$birthday);*/
				$birthday = explode("/", $parentBirthDay);
				$birthday = mktime(0,0,0,$birthday['0'],$birthday['1'],$birthday['2']);
				$rawData = $user->register_parent($parentUserName,$parentEmail,$this->make($parentPassword),$parentFullName,$birthday,
				$parentProfession,$parentGender,$parentAdress,$parentPhoneNumber,$parentMobileNumber,$parentOf);
				
				
				if(empty($rawData)) {
					$statusCode = 404;
					$rawData = array('error' => 'ERROR !');		
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

				function fetchLinkStudent($userName) {	

					$user = new User();
					$rawData = $user->fetchLinkStudent($userName);
					
					if(empty($rawData)) {
						$statusCode = 404;
						$rawData = array('error' => 'No user found!');		
					} else {
						$statusCode = 200;
					}
			
					$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
					$this ->setHttpHeaders($requestContentType, $statusCode);
					
					$result["user"] = $rawData;
							
					if(strpos($requestContentType,'application/json') !== false){
						$response = $this->encodeJson($result);
						echo $response;
					}
					
				}
	
	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}

	public function make($value, array $options = array())
	{
		$cost = isset($options['rounds']) ? $options['rounds'] : 10;

		$hash = password_hash($value, PASSWORD_BCRYPT, array('cost' => $cost));

		if ($hash === false)
		{
			throw new \RuntimeException("Bcrypt hashing not supported.");
		}

		return $hash;
	}
}
?>