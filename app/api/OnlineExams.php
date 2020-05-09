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
		$query = "SELECT * FROM onlineexams 
         order by id desc";
        $dbcontroller = new DBController();
        $exams=array();
        $exams=$dbcontroller->executeSelectQuery($query);
        $finalExams=array();
        for($i=0;$i<sizeof($exams);$i++){
            /*$day=explode("/", );
            $day = mktime(0,0,0,$day['0'],$day['1'],$day['2']);*/
            if((int) $exams[$i]['ExamEndDate'] <= (int) $day){
                array_push($finalExams,$exams[$i]);
            }
        }
		//$this->onlineExams = $dbcontroller->executeSelectQuery($query);
        //return $this->onlineExams;
        return $finalExams;
	}	
	
	
    
}
/*
where id not in (select examId from onlineexamsgrades where studentId=".$studentId.")
 */
?>
