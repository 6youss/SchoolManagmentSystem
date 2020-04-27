<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Events {
	private $events = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getEvents($role){
		$query = "SELECT * FROM events where eventFor = 'all' or eventFor='".$role."'";
		$dbcontroller = new DBController();
		$this->events = $dbcontroller->executeSelectQuery($query);
		return $this->events;
	}

	/*public function getAllEvents(){
		$query = "SELECT * FROM events where eventFor = 'all' ";
		$dbcontroller = new DBController();
		$this->events = $dbcontroller->executeSelectQuery($query);
		return $this->events;
	}	
	
	public function getTeachersEvents(){
		$query = "SELECT * FROM events where eventFor = 'teacher' ";
		$dbcontroller = new DBController();
		$this->events = $dbcontroller->executeSelectQuery($query);
		return $this->events;
    }
    
    public function getStudentsEvents(){
		$query = "SELECT * FROM events where eventFor = 'student' ";
		$dbcontroller = new DBController();
		$this->events = $dbcontroller->executeSelectQuery($query);
		return $this->events;
    }
    
    public function getParentsEvents(){
		$query = "SELECT * FROM events where eventFor = 'parent' ";
		$dbcontroller = new DBController();
		$this->events = $dbcontroller->executeSelectQuery($query);
		return $this->events;
	}
    */
}
?>