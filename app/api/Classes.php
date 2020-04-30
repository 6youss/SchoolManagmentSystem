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
	
	public function getClassStudents($id){
		$query = "SELECT id,username,fullName,birthday,gender,email,photo,address FROM users where studentClass=".$id;
		$dbcontroller = new DBController();
		$this->classes = $dbcontroller->executeSelectQuery($query);
		for($i=0;$i<sizeof($this->classes);$i++){
			$this->classes[$i]['birthday']=date('m/d/Y',$this->classes[$i]['birthday']);
		}
		return $this->classes;
    }	
    
    public function getTeacherClasses($id){

		$dbcontroller = new DBController();
        $query = "SELECT id FROM classes ";
		$ids=$dbcontroller->executeSelectQuery($query);
		$query = "SELECT classTeacher FROM classes ";
		$teacherids=$dbcontroller->executeSelectQuery($query);
        $fids=array();
		for($i=0;$i<sizeof($ids);$i++){
        $str=substr($teacherids[$i]["classTeacher"],1,-1);
		$tida=explode(",",$str);
        for($j=0;$j<sizeof($tida);$j++){
        if(substr($tida[$j],1,-1)==$id){
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

	public function getClassTeacher($teacherId){
		$str=substr($teacherId,1,-1);
		$ids=explode(",",$str);
		for($i=0;$i<sizeof($ids);$i++){
		$ids[$i]=substr($ids[$i],1,-1);
		}
		$query = "SELECT username,fullName,email,photo,phoneNo,mobileNo FROM users where id=";
		for($i=0;$i<sizeof($ids);$i++){
			if($i==0){$query=$query.$ids[$i];}else{$query=$query." or id=".$ids[$i];}
	    }
		$dbcontroller = new DBController();
		$this->classes = $dbcontroller->executeSelectQuery($query);
		return $this->classes;
    }
	
}

/*
$id=3;
        $query = "SELECT id FROM classes ";
        echo $query;
		$ids=array(5,6);
		$query = "SELECT classTeacher FROM classes ";
		echo $query;
		$teacherids=array("[\"1\",\"3\"]","[\"3\",\"4\"]");
        $fids=array();
		for($i=0;$i<sizeof($ids);$i++){
        $str=substr($teacherids[$i],1,-1);
		$tida=explode(",",$str);
        for($j=0;$j<sizeof($tida);$j++){
        if(substr($tida[$j],1,-1)==$id){
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