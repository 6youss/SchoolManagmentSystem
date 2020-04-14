<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Assignments {
	private $assignments = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getAllAssignments(){
		$query = "SELECT * FROM assignments";
		$dbcontroller = new DBController();
		$this->assignments = $dbcontroller->executeSelectQuery($query);
		return $this->assignments;
	}	

	public function getClassAssignments($id){
		$query = "SELECT * FROM assignments where classId= ".$id;
		$dbcontroller = new DBController();
		$this->assignments = $dbcontroller->executeSelectQuery($query);
		return $this->assignments;
	}	

	public function getSubjectAssignments($id){
		$query = "SELECT * FROM assignments where subjectId= ".$id;
		$dbcontroller = new DBController();
		$this->assignments = $dbcontroller->executeSelectQuery($query);
		return $this->assignments;
	}

	public function getTeacherAssignments($id){
		$query = "SELECT * FROM assignments where teacherId= ".$id;
		$dbcontroller = new DBController();
		$this->assignments = $dbcontroller->executeSelectQuery($query);
		return $this->assignments;
	}
    
    public function InsertAssignment($classId,$subjectId,$teacherId,$assignmentTitle,$assignmentDescription,$assignmentFile,$assignmentDeadLine){
		$query = "INSERT INTO `assignments`(`classId`, `subjectId`, `teacherId`, `AssignTitle`, `AssignDescription`, `AssignFile`, `AssignDeadLine`) 
        VALUES (".$classId.",".$subjectId.",".$teacherId.",'".$assignmentTitle."','".$assignmentDescription."','".$assignmentFile."','".$assignmentDeadLine."')";echo $query;
		$dbcontroller = new DBController();
		$this->assignments = $dbcontroller->executeInsertQuery($query);
		return $this->assignments;
	}
	
    
}
?>