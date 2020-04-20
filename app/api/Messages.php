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
		$query = "SELECT * FROM messages where userId=".$id." order by id desc";
		$dbcontroller = new DBController();
		$this->messages = $dbcontroller->executeSelectQuery($query);
		return $this->messages;
    }

	public function getSentMessages($id){
		$query = "SELECT * FROM messages where userId=".$id." and fromId=".$id." order by id desc";
		$dbcontroller = new DBController();
		$this->messages = $dbcontroller->executeSelectQuery($query);
		return $this->messages;
    }	
    
    public function getReceivedMessages($id){
		$query = "SELECT * FROM messages where userId=".$id." and toId=".$id." order by id desc";
		$dbcontroller = new DBController();
		$this->messages = $dbcontroller->executeSelectQuery($query);
		return $this->messages;
	}
	
	public function getMessageSender($id){
		$query = "SELECT username,photo FROM users where id=".$id;
		$dbcontroller = new DBController();
		$this->messages = $dbcontroller->executeSelectQuery($query);
		return $this->messages;
	}
    
}
?>