<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class ExamMarks {
	private $exammarks = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getExamMarks($id){
		$query = "SELECT * FROM exammarks where id=".$id;
		$dbcontroller = new DBController();
		$this->exammarks = $dbcontroller->executeSelectQuery($query);
		return $this->exammarks;
	}	
	
	public function getSubjectStudentExamMarks($subjectId,$studentId){
		$query = "SELECT * FROM exammarks where subjectId=".$subjectId." and studentId=".$studentId;
		$dbcontroller = new DBController();
		$this->exammarks = $dbcontroller->executeSelectQuery($query);
		return $this->exammarks;
	}	

	public function getClassSubjectExamMarks($classId,$subjectId){
		$query = "SELECT * FROM exammarks where classId=".$classId." and subjectId=".$studentId;
		$dbcontroller = new DBController();
		$this->exammarks = $dbcontroller->executeSelectQuery($query);
		return $this->exammarks;
	}	
	
	public function getClassSubjectStudentExamMarks($classId,$subjectId,$studentId){
		$query = "SELECT * FROM exammarks where classId=".$classId." and subjectId=".$subjectId." and studentId=".$studentId;
		$dbcontroller = new DBController();
		$this->exammarks = $dbcontroller->executeSelectQuery($query);
		return $this->exammarks;
	}	

	public function insertExamMarks($examId,$classId,$subjectId,$studentId,$examMark,$attendanceMark,$markComments){
		$query = "INSERT INTO `exammarks`(`examId`, `classId`, `subjectId`, `studentId`, `examMark`, `attendanceMark`, `markComments`) 
		VALUES (".$examId.",".$classId.",".$subjectId.",".$studentId.",'".$examMark."','".$attendanceMark."','".$markComments."')";
		$dbcontroller = new DBController();
		$this->exammarks = $dbcontroller->executeInsertQuery($query);
		return $this->exammarks;
	}	


    
}
?>