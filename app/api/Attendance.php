<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Attendance {
	private $attendance = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getAttendance($id){
		$query = "SELECT * FROM attendance where id=".$id;
		$dbcontroller = new DBController();
		$this->attendance = $dbcontroller->executeSelectQuery($query);
		return $this->attendance;
	}

	public function getClassAttendance($id,$date){
		$query = "SELECT * FROM attendance where classId=".$id." and date='".$date."'";
		$dbcontroller = new DBController();
		$this->attendance = $dbcontroller->executeSelectQuery($query);
		return $this->attendance;
	}
	
	public function getSubjectAttendance($id,$date){
		$query = "SELECT * FROM attendance where subjectId=".$id." and date='".$date."'";
		$dbcontroller = new DBController();
		$this->attendance = $dbcontroller->executeSelectQuery($query);
		return $this->attendance;
	}	
	
	public function getStudentAttendance($id,$date){
		$query = "SELECT * FROM attendance where studentId=".$id." and date='".$date."'";
		$dbcontroller = new DBController();
		$this->attendance = $dbcontroller->executeSelectQuery($query);
		return $this->attendance;
	}	
	
	public function getClassSubjectAttendance($id,$id2,$date){
		$query = "SELECT * FROM attendance where classId=".$id." and subjectId=".$id2." and date='".$date."'";
		$dbcontroller = new DBController();
		$this->attendance = $dbcontroller->executeSelectQuery($query);
		return $this->attendance;
	}	
	
	public function getClassStudentAttendance($id,$id2,$date){
		$query = "SELECT * FROM attendance where classId=".$id." and studentId=".$id2." and date='".$date."'";
		$dbcontroller = new DBController();
		$this->attendance = $dbcontroller->executeSelectQuery($query);
		return $this->attendance;
	}
	
	public function getSubjectStudentAttendance($id,$id2,$date){
		$query = "SELECT * FROM attendance where subjectId=".$id." and studentId=".$id2." and date='".$date."'";
		$dbcontroller = new DBController();
		$this->attendance = $dbcontroller->executeSelectQuery($query);
		return $this->attendance;
	}
	
	public function getFilteredAttendance($classId,$subjectId,$studentId,$date){
		$query = "SELECT * FROM attendance where classId=".$classId." and subjectId=".$subjectId." and studentId=".$studentId." and date='".$date."'";
		$dbcontroller = new DBController();
		$this->attendance = $dbcontroller->executeSelectQuery($query);
		return $this->attendance;
	}
	
	public function controlAttendance($classId,$subjectId,$studentId,$date,$status){
		$query = "INSERT INTO `attendance`( `classId`, `subjectId`, `date`, `studentId`, `status`) 
		VALUES (".$classId.",".$subjectId.",'".$date."',".$studentId.",".$status.")";
		$dbcontroller = new DBController();
		$this->attendance = $dbcontroller->executeInsertQuery($query);
		return $this->attendance;
    }
    
    /*public function getAttendanceByDate($id,$date){
		$query = "SELECT * FROM attendance where studentId=".$id." and date='".$date."'";
		$dbcontroller = new DBController();
		$this->attendance = $dbcontroller->executeSelectQuery($query);
		return $this->attendance;
	}*/
	
	
    
}
?>