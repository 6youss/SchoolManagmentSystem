<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Polls {
	private $polls = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/

	public function getPolls($role){
		$query = "SELECT * FROM polls where pollTarget = 'all' or pollTarget = '".$role."s'";
		$dbcontroller = new DBController();
		$this->polls = $dbcontroller->executeSelectQuery($query);
		return $this->polls;
	}	

	/*public function getAllPolls(){
		$query = "SELECT * FROM polls where pollTarget = 'all' ";
		$dbcontroller = new DBController();
		$this->polls = $dbcontroller->executeSelectQuery($query);
		return $this->polls;
	}	
	
	public function getTeachersPolls(){
		$query = "SELECT * FROM polls where pollTarget = 'teachers' ";
		$dbcontroller = new DBController();
		$this->polls = $dbcontroller->executeSelectQuery($query);
		return $this->polls;
    }
    
    public function getStudentsPolls(){
		$query = "SELECT * FROM polls where pollTarget = 'students' ";
		$dbcontroller = new DBController();
		$this->polls = $dbcontroller->executeSelectQuery($query);
		return $this->polls;
    }
    
    public function getParentsPolls(){
		$query = "SELECT * FROM polls where pollTarget = 'parents' ";
		$dbcontroller = new DBController();
		$this->polls = $dbcontroller->executeSelectQuery($query);
		return $this->polls;
	}*/
    
}
?>