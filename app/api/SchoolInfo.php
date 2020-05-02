<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class SchoolInfo {
	private $schoolinfo = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getAllSchoolInfo(){
		$query = "SELECT fieldName, fieldValue FROM settings WHERE id=1 or id=6 or id=7 or id=9 
        or id=14 or id=21 or id=22 or id=23 ";
		$dbcontroller = new DBController();
		$this->schoolinfo = $dbcontroller->executeSelectQuery($query);
		return $this->schoolinfo;
	}	
	
	public function getSchoolPaymentInfo(){
		$query = "SELECT fieldName, fieldValue FROM settings WHERE id=1 or id=6 or id=7
        or id=22 or id=23 ";
		$dbcontroller = new DBController();
		$this->schoolinfo = $dbcontroller->executeSelectQuery($query);
		return $this->schoolinfo;
	}	
	
    
}
?>