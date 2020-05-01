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

	public function clearAssignments(){
		$query = "DELETE FROM `assignments`";
		$dbcontroller = new DBController();
		$this->assignments = $dbcontroller->executeDeleteQuery($query);
		return $this->assignments;
	}	

	public function getClassAssignments($id){
		$query = "SELECT id FROM assignments ";
		$dbcontroller = new DBController();
		$ids = $dbcontroller->executeSelectQuery($query);
		$query = "SELECT classId FROM assignments ";
		$classids = $dbcontroller->executeSelectQuery($query);
        $fids=array();
		for($i=0;$i<sizeof($ids);$i++){
        $str=substr($classids[$i]["classId"],1,-1);
		$cida=explode(",",$str);
        for($j=0;$j<sizeof($cida);$j++){
        if(substr($cida[$j],1,-1)==$id){
			array_push($fids,$ids[$i]["id"]);
		}
		}
		$query = "SELECT a.AssignTitle,a.AssignDescription,a.AssignFile,a.AssignDeadLine,s.subjectTitle 
		FROM assignments a,subject s where a.subjectId=s.id and (a.id=";
		for($k=0;$k<sizeof($fids);$k++){
		if($k==(sizeof($fids)-1)){
			$query=$query.$fids[$k].")";
		}else{
			$query=$query.$fids[$k]." or a.id=";
		}
        }
		}
		$this->assignments = $dbcontroller->executeSelectQuery($query);
		return $this->assignments;
	}	

	/*public function getClassSubjectAssignments($id,$subjectId){
		$query = "SELECT a.AssignTitle,a.AssignDescription,a.AssignFile,a.AssignDeadLine,s.subjectTitle 
		FROM assignments a,subject s where a.classId='".$id."' and a.subjectId= '".$subjectId."' and s.id=".$subjectId;
		$dbcontroller = new DBController();
		$this->assignments = $dbcontroller->executeSelectQuery($query);
		return $this->assignments;
	}*/
	public function getClassSubjectAssignments($id,$subjectId){
		$query = "SELECT id FROM assignments where subjectId=".$subjectId;
		$dbcontroller = new DBController();
		$ids = $dbcontroller->executeSelectQuery($query);
		$query = "SELECT classId FROM assignments where subjectId=".$subjectId;
		$classids = $dbcontroller->executeSelectQuery($query);
        $fids=array();
		for($i=0;$i<sizeof($ids);$i++){
        $str=substr($classids[$i]["classId"],1,-1);
		$cida=explode(",",$str);
        for($j=0;$j<sizeof($cida);$j++){
        if(substr($cida[$j],1,-1)==$id){
			array_push($fids,$ids[$i]["id"]);
		}
		}
		$query = "SELECT a.AssignTitle,a.AssignDescription,a.AssignFile,a.AssignDeadLine,s.subjectTitle 
		FROM assignments a,subject s where a.subjectId=s.id and (a.id=";
		for($k=0;$k<sizeof($fids);$k++){
		if($k==(sizeof($fids)-1)){
			$query=$query.$fids[$k].")";
		}else{
			$query=$query.$fids[$k]." or a.id=";
		}
        }
		}
		$this->assignments = $dbcontroller->executeSelectQuery($query);
		return $this->assignments;
	}

	public function getTeacherClassAssignments($uid,$id){
		$query = "SELECT id FROM assignments where teacherId=".$uid;
		$dbcontroller = new DBController();
		$ids = $dbcontroller->executeSelectQuery($query);
		$query = "SELECT classId FROM assignments where teacherId=".$uid;
		$classids = $dbcontroller->executeSelectQuery($query);
        $fids=array();
		for($i=0;$i<sizeof($ids);$i++){
        $str=substr($classids[$i]["classId"],1,-1);
		$cida=explode(",",$str);
        for($j=0;$j<sizeof($cida);$j++){
        if(substr($cida[$j],1,-1)==$id){
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

	public function getTeacherSubjectAssignments($uid,$id){
		$query = "SELECT * FROM assignments where subjectId= '".$id."' and teacherId='".$uid."'";
		$dbcontroller = new DBController();
		$this->assignments = $dbcontroller->executeSelectQuery($query);
		return $this->assignments;
	}

	public function getTeacherAssignments($id){
		$query = "SELECT a.AssignTitle,a.AssignDescription,a.AssignFile,a.AssignDeadLine,s.subjectTitle 
		FROM assignments a,subject s where a.teacherId= ".$id;
		$dbcontroller = new DBController();
		$this->assignments = $dbcontroller->executeSelectQuery($query);
		return $this->assignments;
	}
    
    public function InsertAssignment($classId,$subjectId,$teacherId,$assignmentTitle,$assignmentDescription,$assignmentFile,$assignmentDeadLine){
		$query = "INSERT INTO `assignments`(`classId`, `subjectId`, `teacherId`, `AssignTitle`, `AssignDescription`, `AssignFile`, `AssignDeadLine`) 
        VALUES (".$classId.",".$subjectId.",".$teacherId.",'".$assignmentTitle."','".$assignmentDescription."','".$assignmentFile."','".$assignmentDeadLine."')";
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
		$classesids=array("[\"1\",\"3\"]","[\"3\",\"4\"]");
        $fids=array();
		for($i=0;$i<sizeof($ids);$i++){
        $str=substr($classesids[$i],1,-1);
		$cida=explode(",",$str);
        for($j=0;$j<sizeof($cida);$j++){
        if(substr($cida[$j],1,-1)==$id){
			array_push($fids,$ids[$i]);
		}
		}
		
		$query = "SELECT * FROM classes where id=";
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

