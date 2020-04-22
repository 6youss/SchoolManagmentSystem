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

	public function getMessageReciever($user){
		$query = "SELECT id FROM users where username='".$user."' or email='".$user."'";
		$dbcontroller = new DBController();
		$this->messages = $dbcontroller->executeSelectQuery($query);
		return $this->messages;
	}

	public function sendMessage($fromId,$toId,$messageText,$dateSent){
		$query = "INSERT INTO `messages`( `messageId`, `userId`, `fromId`, `toId`, `messageText`, `dateSent`) 
		VALUES (1,".$fromId.",".$fromId.",".$toId.",'".$messageText."','".$dateSent."')";
		$dbcontroller = new DBController();
		$this->messages = $dbcontroller->executeInsertQuery($query);
		$query = "INSERT INTO `messages`( `messageId`, `userId`, `fromId`, `toId`, `messageText`, `dateSent`) 
		VALUES (2,".$toId.",".$fromId.",".$toId.",'".$messageText."','".$dateSent."')";
		$this->messages = $dbcontroller->executeInsertQuery($query);
		return $this->messages;
	}
    
}
?>