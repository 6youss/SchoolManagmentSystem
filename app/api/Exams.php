<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Exams {
	private $exams = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getAllExams(){
		$query = "SELECT * FROM examslist order by id desc";
		$dbcontroller = new DBController();
		$this->exams = $dbcontroller->executeSelectQuery($query);
		return $this->exams;
	}	
	
	
    
}
?>