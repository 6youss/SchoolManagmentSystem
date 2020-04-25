<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Subjects {
	private $subject = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getSubject($id){
		$query = "SELECT * FROM subject where id=".$id;
		$dbcontroller = new DBController();
		$this->subject = $dbcontroller->executeSelectQuery($query);
		return $this->subject;
    }	
    
    public function getClassSubjects($id){
		$query = "SELECT * FROM subject where classId=".$id;
		$dbcontroller = new DBController();
		$this->subject = $dbcontroller->executeSelectQuery($query);
		return $this->subject;
	}	

	public function getTeacherSubjects($id){
		$query = "SELECT * FROM subject where teacherId=".$id;
		$dbcontroller = new DBController();
		$this->subject = $dbcontroller->executeSelectQuery($query);
		return $this->subject;
	}

	public function getTeacherClassSubjects($teacherId,$classId){
		$query = "SELECT * FROM subject where teacherId=".$teacherId." and classId=".$classId;
		$dbcontroller = new DBController();
		$this->subject = $dbcontroller->executeSelectQuery($query);
		return $this->subject;
	}
	
	public function getSubjectTeacher($id){
		$query = "SELECT username,fullName,email,photo FROM users where id=".$id;
		$dbcontroller = new DBController();
		$this->subject = $dbcontroller->executeSelectQuery($query);
		return $this->subject;
	}
    
}
?>