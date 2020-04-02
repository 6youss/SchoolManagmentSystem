<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class News {
	private $news = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getAllNews(){
		$query = "SELECT * FROM newsboard where newsFor = 'all' ";
		$dbcontroller = new DBController();
		$this->news = $dbcontroller->executeSelectQuery($query);
		return $this->news;
	}	
	
	public function getTeachersNews(){
		$query = "SELECT * FROM newsboard where newsFor = 'teacher' ";
		$dbcontroller = new DBController();
		$this->news = $dbcontroller->executeSelectQuery($query);
		return $this->news;
    }
    
    public function getStudentsNews(){
		$query = "SELECT * FROM newsboard where newsFor = 'student' ";
		$dbcontroller = new DBController();
		$this->news = $dbcontroller->executeSelectQuery($query);
		return $this->news;
    }
    
    public function getParentsNews(){
		$query = "SELECT * FROM newsboard where newsFor = 'parent' ";
		$dbcontroller = new DBController();
		$this->news = $dbcontroller->executeSelectQuery($query);
		return $this->news;
	}
    
}
?>