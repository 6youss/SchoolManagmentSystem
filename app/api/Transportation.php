<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Transportation {
	private $transportation = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getAllTransportations(){
		$query = "SELECT * FROM transportation";
		$dbcontroller = new DBController();
		$this->transportation = $dbcontroller->executeSelectQuery($query);
		return $this->transportation;
	}	
	
	public function getTransportation($id){
		$query = "SELECT * FROM transportation where id=".$id;
		$dbcontroller = new DBController();
		$this->transportation = $dbcontroller->executeSelectQuery($query);
		return $this->transportation;
	}
    
}
?>