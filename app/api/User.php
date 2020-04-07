<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class User {
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
	
	public function login($un/*,$pw*/){
	    //$rp=$this->pwtostr($rp);
	    //echo password_verify($pw,$rp);
		//$s="abc";$s.='d';$s.="\\";echo $s;
		$query = "SELECT password,activated,role FROM users where username='".$un."' or email='".$un."'";
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
	
	public function register_teacher($tun,$teml,$tpw,$tfn,$tbd,$tg,$tadr,$tpn,$tmn){
		$query="INSERT INTO `users`(`username`, `email`, `password`, `fullName`, `role`,
		  `gender`, `address`, `phoneNo`, `mobileNo`, `activated`, `birthday`
		) VALUES ('".$tun."','".$teml."','".$tpw."','".$tfn."','teacher','".$tg."','".$tadr."','".$tpn."','".$tmn."',0,".$tbd.")";
		//echo $query;
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeInsertQuery($query);
		return $this->user;
	}

	public function register_student($tun,$teml,$tpw,$tfn,$tbd,$sri,$sci,$tg,$tadr,$tpn,$tmn){
		$query="INSERT INTO `users`(`username`, `email`, `password`, `fullName`, `role`,
		  `gender`, `address`, `phoneNo`, `mobileNo`,  `studentRollId`,`studentClass`,`activated`, `birthday`
		) VALUES ('".$tun."','".$teml."','".$tpw."','".$tfn."','student',
		'".$tg."','".$tadr."','".$tpn."','".$tmn."',".$sri.",".$sci.",0,".$tbd.")";
		//echo $query;
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeInsertQuery($query);
		return $this->user;
	}

	public function register_parent($tun,$teml,$tpw,$tfn,$tbd,$pp,$tg,$tadr,$tpn,$tmn,$pof){
		$query="INSERT INTO `users`(`username`, `email`, `password`, `fullName`, `role`,
		  `gender`, `address`, `phoneNo`, `mobileNo`,`activated`, `birthday`,`parentProfession`, `parentOf`
		) VALUES ('".$tun."','".$teml."','".$tpw."','".$tfn."','parent','".$tg."','".$tadr."','".$tpn."','".$tmn
		."',0,".$tbd.",'".$pp."','".$pof."')";
		//echo $query;
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeInsertQuery($query);
		return $this->user;
	}
	
	public function fetchLinkStudent($userName){
		$query = "SELECT id,fullName FROM users where username ='".$userName."' and role='student'";
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeSelectQuery($query);
		return $this->user;
	}
	
}
?>