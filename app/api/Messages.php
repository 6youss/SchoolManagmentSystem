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
	
	public function getConversations($id){
		//$query = "SELECT * FROM messages where fromId=".$id." or toId=".$id;
		$query = "SELECT ml.id,ml.userId,ml.toId,ml.lastMessage, ml.lastMessageDate, ml.messageStatus, u.username, u.photo FROM
		 messageslist ml, users u WHERE ml.userId=".$id." and ml.toId=u.id order by ml.id desc";
		$dbcontroller = new DBController();
		$this->messages = $dbcontroller->executeSelectQuery($query);
		return $this->messages;
    }
    
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
		$query="SELECT * FROM `messageslist` WHERE userId=".$fromId." and toId=".$toId;
		$dbcontroller = new DBController();
		$senderConversation = $dbcontroller->executeSelectQuery($query);
		if(sizeof($senderConversation)==0){
			$query="INSERT INTO `messageslist`( `userId`, `toId`, `lastMessage`, `lastMessageDate`, `messageStatus`) 
			VALUES (".$fromId.",".$toId.",'".$messageText."','".$dateSent."',0)";
            $senderConversation=$dbcontroller->executeInsertQuery($query);
		}else{
			$query="UPDATE `messageslist` SET `lastMessage`='".$messageText."',
			`lastMessageDate`='".$dateSent."',`messageStatus`= 0 WHERE userId=".$userId." and toId=".$toId;
            $senderConversation=$dbcontroller->executeUpdateQuery($query);
		}

		$query="SELECT * FROM `messageslist` WHERE userId=".$toId." and toId=".$userId;
		$revieverConversation = $dbcontroller->executeSelectQuery($query);
		if(sizeof($revieverConversation)==0){
			$query="INSERT INTO `messageslist`( `userId`, `toId`, `lastMessage`, `lastMessageDate`, `messageStatus`) 
			VALUES (".$toId.",".$fromId.",'".$messageText."','".$dateSent."',1)";
            $revieverConversation=$dbcontroller->executeInsertQuery($query);
		}else{
			$query="UPDATE `messageslist` SET `lastMessage`='".$messageText."',
			`lastMessageDate`='".$dateSent."',`messageStatus`= 1 WHERE userId=".$toId." and toId=".$fromId;
            $revieverConversation=$dbcontroller->executeUpdateQuery($query);
		}
		$query = "INSERT INTO `messages`( `messageId`, `userId`, `fromId`, `toId`, `messageText`, `dateSent`) 
		VALUES (1,".$fromId.",".$fromId.",".$toId.",'".$messageText."','".$dateSent."')";
		$this->messages = $dbcontroller->executeInsertQuery($query);
		$query = "INSERT INTO `messages`( `messageId`, `userId`, `fromId`, `toId`, `messageText`, `dateSent`) 
		VALUES (2,".$toId.",".$fromId.",".$toId.",'".$messageText."','".$dateSent."')";
		$this->messages = $dbcontroller->executeInsertQuery($query);
		return $this->messages;
	}
    
}
?>