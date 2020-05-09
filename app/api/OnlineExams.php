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
	public function getOnlineExams($classId,$studentId,$date){
		$query = "SELECT * FROM onlineexams where id not in (select examId from onlineexamsgrades where studentId=".$studentId.")
         order by id desc";
        $dbcontroller = new DBController();
        $exams=array();
        $exams=$dbcontroller->executeSelectQuery($query);
        for($i=0;$i<sizeof($exams);$i++){
            if(intval($exams[$i]['ExamEndDate']) <= intval($date) == 1){
                $exams[$i]['ExamEndDate']=date('m/d/Y',$exams[$i]['ExamEndDate']);
                $exams[$i]['examDate']=date('m/d/Y',$exams[$i]['examDate']);
                $exams[$i]['available']=0;
                array_push($this->onlineExams,$exams[$i]);
            }else{
                $exams[$i]['ExamEndDate']=date('m/d/Y',$exams[$i]['ExamEndDate']);
                $exams[$i]['examDate']=date('m/d/Y',$exams[$i]['examDate']);
                $exams[$i]['available']=1;
                array_push($this->onlineExams,$exams[$i]);  
            }
        }
		//$this->onlineExams = $dbcontroller->executeSelectQuery($query);
		return $this->onlineExams;
	}	
	
	
    
}
?>
