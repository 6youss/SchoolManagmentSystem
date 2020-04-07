<?php
require_once("UserRestHandler.php");
require_once("User.php");		
$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$view = $obj['view'];

	$teacherUserName=$obj['userName'];
	$teacherEmail=$obj['email'];
	$teacherPassword=$obj['password'];
	$teacherFullName=$obj['fullName'];
	$teacherBirthDay=$obj['birthDay'];
	$teacherGender=$obj['gender'];
	$teacherAdress=$obj['adress'];
	$teacherPhoneNumber=$obj['phoneNumber'];
	$teacherMobileNumber=$obj['mobileNumber'];


switch($view){

	
        
		case "register_teacher":
		$userRestHandler = new UserRestHandler();
		$userRestHandler->register_teacher($teacherUserName,$teacherEmail,$teacherPassword,$teacherFullName,
		$teacherBirthDay,$teacherGender,$teacherAdress,$teacherPhoneNumber,$teacherMobileNumber);
		break;

}


?>