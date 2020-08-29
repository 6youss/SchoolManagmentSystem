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
	public function getNews($role){
		$query = "SELECT * FROM newsboard where newsFor = 'all' or newsFor='".$role."'";
		$dbcontroller = new DBController();
		$this->news = $dbcontroller->executeSelectQuery($query);
		for($i=0;$i<sizeof($this->news);$i++){
			$date=date('m/d/Y',intval($this->news[$i]['newsDate']));
			$this->news[$i]['newsDate']=$date;
		}
		return $this->news;
	}	

	/*public function getAllNews(){
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
	}*/
    
}
?>