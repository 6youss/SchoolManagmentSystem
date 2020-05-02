<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Payments {
	private $payments = array();
	//private $req="";
	/*
		you should hookup the DAO here
    */
    
    public function getAllPayments($studentId){
		$query = "SELECT SELECT p.paymentTitle, p.paymentDescription, p.paymentStudent, p.paymentAmount, p.paymentStatus, p.paymentDate,
		u.fullName,u.phoneNo,u.email,u.address FROM payments p,users u where u.id=p.paymentStudent and p.paymentStudent=".$studentId;
		$dbcontroller = new DBController();
		$this->payments = $dbcontroller->executeSelectQuery($query);
		return $this->payments;
    }

	public function getUnpaidPayments($studentId){
		$query = "SELECT * FROM payments where paymentStudent=".$studentId." and paymentStatus=0";
		$dbcontroller = new DBController();
		$this->payments = $dbcontroller->executeSelectQuery($query);
		return $this->payments;
    }	
    
    public function getPaidPayments($studentId){
		$query = "SELECT * FROM payments where paymentStudent=".$studentId." and paymentStatus=1";
		$dbcontroller = new DBController();
		$this->payments = $dbcontroller->executeSelectQuery($query);
		return $this->payments;
	}
	
	
    
}
?>