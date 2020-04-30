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
		where c.classId=".$id." and s.id=c.subjectId";
		$dbcontroller = new DBController();
		$this->classSchedule = $dbcontroller->executeSelectQuery($query);
		for($i=0;$i<sizeof($this->classSchedule);$i++){
			$this->classSchedule[$i]['startTime']=$this->classSchedule[$i]['startTime'][0].$this->classSchedule[$i]['startTime'][1].":".
			$this->classSchedule[$i]['startTime'][2].$this->classSchedule[$i]['startTime'][3];

			$this->classSchedule[$i]['endTime']=$this->classSchedule[$i]['endTime'][0].$this->classSchedule[$i]['endTime'][1].":".
			$this->classSchedule[$i]['endTime'][2].$this->classSchedule[$i]['endTime'][3];
		}
		return $this->classSchedule;
	}	
	
	
    
}
?>