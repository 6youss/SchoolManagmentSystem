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

	public function getSubjectsAttendance($classId,$date,$studentId){
		$query = "SELECT a.date,a.status,cl.className,su.subjectTitle,st.fullName,st.studentRollId,st.photo 
		FROM attendance a,classes cl,subject su,users st
		where a.classId=".$classId." and cl.id=".$classId." and su.id=a.subjectId and a.studentId=".$studentId." and st.id=".$studentId
		." and a.date='".$date."'";
		$dbcontroller = new DBController();
		$this->attendance = $dbcontroller->executeSelectQuery($query);
		return $this->attendance;
	}	
	
	public function getStudentsAttendance($classId,$date,$subjectId){
		$query = "SELECT a.id,a.studentId,a.date,a.status,cl.className,su.subjectTitle,st.fullName,st.studentRollId,st.photo 
		FROM attendance a,classes cl,subject su,users st
		where a.classId=".$classId." and cl.id=".$classId." and a.subjectId=".$subjectId." and su.id=".$subjectId
		." and a.studentId=st.id and a.date='".$date."'";
		$dbcontroller = new DBController();
		$this->attendance = $dbcontroller->executeSelectQuery($query);
		return $this->attendance;
	}
	
	public function getFilteredAttendance($classId,$subjectId,$studentId,$date){
		$query = "SELECT a.date,a.status,cl.className,su.subjectTitle,st.fullName,st.studentRollId,st.photo 
		FROM attendance a,classes cl,subject su,users st
		where a.classId=".$classId." and cl.id=".$classId." and a.subjectId=".$subjectId." and su.id=".$subjectId
		." and a.studentId=".$studentId." and st.id=".$studentId." and a.date='".$date."'";
		$dbcontroller = new DBController();
		$this->attendance = $dbcontroller->executeSelectQuery($query);
		return $this->attendance;
	}
	
	public function insertAttendance($classId,$subjectId,$studentId,$date,$status){
		$query = "INSERT INTO `attendance`( `classId`, `subjectId`, `date`, `studentId`, `status`) 
		VALUES (".$classId.",".$subjectId.",'".$date."',".$studentId.",".$status.")";
		$dbcontroller = new DBController();
		$this->attendance = $dbcontroller->executeInsertQuery($query);
		return $this->attendance;
	}
	
	public function updateAttendance($id,$status){
		$query="UPDATE `attendance` SET `status`=".$status." where id=".$id;
		$dbcontroller = new DBController();
		$this->attendance = $dbcontroller->executeUpdateQuery($query);
		return $this->attendance;
    }
    
}
?>