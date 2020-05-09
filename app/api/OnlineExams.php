<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class OnlineExams {
	private $onlineExams = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getOnlineExams($classId,$studentId){
		$query = "SELECT * FROM examslist 
         order by id desc";
		$dbcontroller = new DBController();
		$this->onlineExams = $dbcontroller->executeSelectQuery($query);
		return $this->onlineExams;
	}	
	
	
    
}
/*
where id not in (select examId from onlineexamsgrades where studentId=".$studentId.")
 */
?>
