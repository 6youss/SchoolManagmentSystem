<?php
require_once("UserRestHandler.php");
require_once("User.php");		
$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];
    
    $studentUserName=$obj['userName'];
$studentEmail=$obj['email'];
$studentPassword=$obj['password'];
$studentFullName=$obj['fullName'];
$studentBirthDay=$obj['birthDay'];
$studentRollingId=$obj['rollingId'];
$studentClassId=$obj['classId'];
$studentGender=$obj['gender'];
$studentAdress=$obj['adress'];
$studentPhoneNumber=$obj['phoneNumber'];
$studentMobileNumber=$obj['mobileNumber'];

switch($view){



		case "register_student":
			$userRestHandler = new UserRestHandler();
			$userRestHandler->register_student($studentUserName,$studentEmail,$studentPassword,$studentFullName,$studentBirthDay,$studentRollingId,$studentClassId,$studentGender,$studentAdress,$studentPhoneNumber,$studentMobileNumber);
			break;

		
}


?>