<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Classes {
	private $classes = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/

	public function CountClasses(){
		$query = "SELECT count(*) FROM classes";
		$dbcontroller = new DBController();
		$this->classes = $dbcontroller->executeSelectQuery($query);
		return $this->classes;
    }

    public function getAllClasses(){
		$query = "SELECT * FROM classes";
		$dbcontroller = new DBController();
		$this->classes = $dbcontroller->executeSelectQuery($query);
		return $this->classes;
    }	

	public function getClass($id){
		$query = "SELECT * FROM classes where id=".$id;
		$dbcontroller = new DBController();
		$this->classes = $dbcontroller->executeSelectQuery($query);
		return $this->classes;
    }	
    
    public function getTeacherClasses($id){
		/*$query = "SELECT * FROM classes where classTeacher='".$id."'";
		$dbcontroller = new DBController();
		$this->classes = $dbcontroller->executeSelectQuery($query);
		return $this->classes;*/
        $query = "SELECT id FROM classes ";
		$ids=$dbcontroller->executeSelectQuery($query);
		$query = "SELECT classTeacher FROM classes ";
		$teacherids=$dbcontroller->executeSelectQuery($query);
		$str=substr($teacherids[0]["classId"],1,-1);
		$teacherids=explode(",",$str);
        $fids=array();
		$tida=array();
		for($i=0;$i<sizeof($ids);$i++){
		$tid=$teacherids[$i];
		$tida=explode(",",$tid);
        for($j=0;$j<sizeof($tida);$j++){
        if($tida[$j]==$id){
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
	}	
	
	
    
}

/*
$id=2;
        $query = "SELECT id FROM classes ";
        echo $query;
		$ids=array(5,6);
		$query = "SELECT classTeacher FROM classes ";
		echo $query;
		$teacherids=array("1,3","3,4");
        $fids=array();
		$tida=array();
		for($i=0;$i<sizeof($ids);$i++){
        
		$tid=$teacherids[$i];
		$tida=explode(",",$tid);
        for($j=0;$j<sizeof($tida);$j++){
        if($tida[$j]==$id){
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
		echo $query;
*/
?>