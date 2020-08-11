<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class MediaItems {
	private $mediaitems = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getMediaItems(){
		$query = "SELECT * FROM mediaitems where albumId=0"; //
		$dbcontroller = new DBController();
		$items = $dbcontroller->executeSelectQuery($query);
		for($i=0;$i<sizeof($items);$i++){
			$date=date('m/d/Y',intval($items[$i]['mediaDate']));
				$items[$i]['mediaDate']=$date;
				array_push($this->mediaitems,$items[$i]);
		}
		return $this->mediaitems;
    }	
    
    public function getMediaItemsChildren($id){
		$query = "SELECT * FROM mediaitems where albumId=".$id;
		$dbcontroller = new DBController();
		$items = $dbcontroller->executeSelectQuery($query);
		for($i=0;$i<sizeof($items);$i++){
			$date=date('m/d/Y',intval($items[$i]['mediaDate']));
				$items[$i]['mediaDate']=$date;
				array_push($this->mediaitems,$items[$i]);
		}
		return $this->mediaitems;
	}	
	
	
    
}
?>