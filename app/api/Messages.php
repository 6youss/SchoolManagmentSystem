<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Messages {
	private $messages = array();
	//private $req="";
	/*
		you should hookup the DAO here
    */
    
    public function getAllMessages($id){
		//$query = "SELECT * FROM messages where fromId=".$id." or toId=".$id;
		$query = "SELECT * FROM messages where userId=".$id;
		$dbcontroller = new DBController();
		$this->terms = $dbcontroller->executeSelectQuery($query);
		return $this->terms;
    }

	public function getSentMessages($id){
		$query = "SELECT * FROM messages where userId=".$id." and fromId=".$id;
		$dbcontroller = new DBController();
		$this->terms = $dbcontroller->executeSelectQuery($query);
		return $this->terms;
    }	
    
    public function getReceivedMessages($id){
		$query = "SELECT * FROM messages where userId=".$id." and toId=".$id;
		$dbcontroller = new DBController();
		$this->terms = $dbcontroller->executeSelectQuery($query);
		return $this->terms;
	}
	
	
    
}
?>