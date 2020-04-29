<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class ClassesSchedule {
	private $classSchedule = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getClassSchedule($id){
		$query = "SELECT c.dayOfWeek,c.startTime,c.endTime,c.subjectId,s.subjectTitle FROM classschedule c,subject s 
		where classId=".$id." and s.id=c.subjectId";
		$dbcontroller = new DBController();
		$this->classSchedule = $dbcontroller->executeSelectQuery($query);
		return $this->classSchedule;
	}	
	
	
    
}
?>