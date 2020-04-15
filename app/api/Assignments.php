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
		$query = "SELECT id FROM assignments ";
		$dbcontroller = new DBController();
		$ids = $dbcontroller->executeSelectQuery($query);
				$query = "SELECT classId FROM assignments ";
		$classids = $dbcontroller->executeSelectQuery($query);
		$str=substr($classids[0]["classId"],1,-1);
		$classids=explode(",",$str);
		$fids=array();
		for($i=0;$i<sizeof($classids);$i++){
			$classids[$i]=substr($classids[$i],1,-1);
		}
		for($i=0;$i<sizeof($ids);$i++){
				for($j=0;$j<sizeof($classids);$j++){
				if((int)$classids[$j]==$id){
				array_push($fids,$ids[$i]["id"]);
			}
			}
			
			$query = "SELECT * FROM assignments where id=";
			for($k=0;$k<sizeof($fids);$k++){
			if($k==(sizeof($fids)-1)){
				$query=$query.$fids[$k];
			}else{
				$query=$query.$fids[$k]." or id=";
			}
			}
			}
		$this->assignments = $dbcontroller->executeSelectQuery($query);
		return $this->assignments;
	}	

	public function getSubjectAssignments($id){
		$query = "SELECT * FROM assignments where subjectId= '".$id."'";
		$dbcontroller = new DBController();
		$this->assignments = $dbcontroller->executeSelectQuery($query);
		return $this->assignments;
	}

	public function getTeacherAssignments($id){
		$query = "SELECT * FROM assignments where teacherId= '".$id."'";
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
        /*
        $id=3;
        $query = "SELECT id FROM assignments ";
        echo $query;
		$ids=array(5,6);
		$query = "SELECT classId FROM assignments ";
		echo $query;
		$classids=array("1,3","3,4");
        $fids=array();
		$cida=array();
		for($i=0;$i<sizeof($ids);$i++){
        
		$cid=$classids[$i];
		$cida=explode(",",$cid);
        for($j=0;$j<sizeof($cida);$j++){
        if($cida[$j]==$id){
			array_push($fids,$ids[$i]);
		}
		}
		
		$query = "SELECT * FROM assignments where id=";
		for($k=0;$k<sizeof($fids);$k++){
		if($k==(sizeof($fids)-1)){
			$query=$query.$fids[$k];
		}else{
			$query=$query.$fids[$k]." or id=";
		}
        }
		}
		echo $query;*/

?>

