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

	public function getClassSubjectAttendance($id,$id2,$date){
		$query = "SELECT * FROM attendance where classId=".$id." and subjectId=".$id2." and date='".$date."'";
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
		$query = "SELECT a.date,a.status,cl.className,su.subjectTitle,st.fullName,st.studentRollId 
		FROM attendance a,classes c,subject su,users st
		where a.classId=".$classId." and c.id=".$classId." and a.subjectId=".$subjectId." and su.id=".$subjectId
		." and a.studentId=".$studentId." and st.id=".$studentId." and a.date='".$date."'";
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
    
}
?>