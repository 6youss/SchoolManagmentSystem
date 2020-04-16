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
		$dbcontroller = new DBController();
		$ids = array();
		$ids = $dbcontroller->executeSelectQuery($query);
		$query = "SELECT classTeacher FROM classes ";
		$teacherids = array();
		$teacherids = $dbcontroller->executeSelectQuery($query);
		$str=substr($teacherids[0]["classTeacher"],1,-1);
		$teacherids=explode(",",$str);
		$fids=array();
		for($i=0;$i<sizeof($teacherids);$i++){
			$teacherids[$i]=substr($teacherids[$i],1,-1);
		}
		for($i=0;$i<sizeof($ids);$i++){
				for($j=0;$j<sizeof($teacherids);$j++){
				if((int)$teacherids[$j]==$id){
				array_push($fids,$ids[$i]["id"]);
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
			$this->classes = $dbcontroller->executeSelectQuery($query);
		return $this->classes;
	}	
	
	
    
}
?>