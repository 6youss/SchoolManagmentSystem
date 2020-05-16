<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class OnlineExamMark {
	private $examMark = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getOnlineExamMark($examId,$studentId){
        
		$query = "SELECT examGrade,examQuestionsAnswers FROM onlineexamsgrades where examId=".$examId." and studentId=".$studentId;
        $dbcontroller = new DBController();
        $this->examMark=$dbcontroller->executeSelectQuery($query);
		return $this->examMark;
	}	
	
	public function getOnlineExamMarks($examId){
        
		$query = "SELECT em.examGrade,em.examQuestionsAnswers,u.fullName,u.photo 
		FROM onlineexamsgrades em,users u 
		where examId=".$examId." and em.studentId=u.id";
        $dbcontroller = new DBController();
        $this->examMark=$dbcontroller->executeSelectQuery($query);
		return $this->examMark;
	}
    
}