<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Leaderboard {
	private $leaderboard = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function geLeaderboard(){
		$query = "SELECT `id`, `username`, `email`,  `fullName`, `role`,  `studentRollId`,`birthday`, `gender`, `address`,
         `phoneNo`, `mobileNo`, `studentClass`, `parentProfession`,  `photo`, `isLeaderBoard`,  `transport` 
          FROM `users` WHERE isLeaderBoard != ''"; //
		$dbcontroller = new DBController();
		$this->leaderboard = $dbcontroller->executeSelectQuery($query);
		return $this->leaderboard;
    }	

    	
    
}
?>