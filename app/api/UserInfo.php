<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class UserInfo {
	private $user = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getAllUsers(){
		$query = "SELECT * FROM users";
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeSelectQuery($query);
		return $this->user;
	}	
	
	public function getUserbyid($id){
		$query = "SELECT * FROM users where id =".$id;
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeSelectQuery($query);
		return $this->user;
	}

	public function getUserbyinfo($userName){
		$query = "SELECT * FROM users where username ='".$userName."'";
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeSelectQuery($query);
		return $this->user;
	}
	
	

	public function getUserrole($id){
		$query = "SELECT role FROM users where username = '".$id."'";
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeSelectQuery($query);
		return $this->user;
	}
	
}
?>